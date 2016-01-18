<?php

namespace App\Controller;

use Cake\Network\Exception\NotFoundException;

class ClientsController extends AppController
{
    public $paginate = [
        'order' => [
            'Clients.client_name' => 'asc',
        ],
    ];
    public function initialize()
    {
        parent::initialize();

        // Include components
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Paginator');
    }

  // List all clients
  public function index()
  {
      $this->loadModel('Projects');

      $clients = $this->Clients->find('all');

      foreach ($clients as $client) {
          $client->projects = $this->Projects->find()->where(['client_id' => $client->id]);
      }

      $this->set('clients', $clients);
  }

  // Show details to specific client
  public function showDetails($id = null)
  {
      $this->loadModel('Projects');

      $client = $this->Clients->find()->where(['id' => $id])->first();

      // 404 if client doesn't exist
      if (empty($client)) {
          throw new NotFoundException(__('Client not found'));
      }

      // Get projects for each client
      $projects = $this->Projects->find()->where(['client_id' => $id]);

      $client->projects = $projects;

      $this->set('client', $client);
  }

  // Edit client
  public function edit($id = null)
  {
      $this->loadModel('Contacts');

      // POST request
      if ($this->request->is('post')) {
          $data = $this->request->data;
          $client = $this->Clients->find()->where(['id' => $id])->first();
          $client = $this->Clients->patchEntity($client, $data);

          if ($this->Clients->save($client)) {
              $this->Flash->success('The client has been edited successfully.');

              return $this->redirect(['action' => 'index']);
          }

          $this->Flash->error('Unable to edit contact.');
      }


      // GET request

      $client = $this->Clients->find()->where(['id' => $id])->first();

      // 404 if client doesn't exist
      if (empty($client)) {
          throw new NotFoundException(__('Client not found'));
      }

      $this->set('client', $client);
  }

  // Create new client
  public function create()
  {

      // POST request
      if ($this->request->is('post')) {
          $client = $this->Clients->newEntity();
          $data = $this->request->data;

          $client = $this->Clients->patchEntity($client, $data);

          if ($this->Clients->save($client)) {
              $this->Flash->success('The client has been saved.');

              return $this->redirect(['action' => 'index']);
          }

          $this->Flash->error('Unable to add customer');
      }
  }

  // Delete existing client
  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $this->loadModel('Contacts');

      $this->autoRender = false;

      $client = $this->Clients->get($id);

      if ($this->Clients->delete($client)) {
          $this->Flash->success('The customer has been deleted.');

          return $this->redirect(['action' => 'index']);
      }
      
      $this->Flash->error('Unable to delete customer.');
  }
}
