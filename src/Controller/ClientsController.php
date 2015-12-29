<?php

namespace App\Controller;

class ClientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('RequestHandler');
    }

  // List clients
  public function index()
  {
      $this->set('clients', $this->Clients->find('all'));
  }

  // Show details to specific client
  public function showDetails($id = null)
  {
      $this->loadModel('Projects');
      $this->loadModel('Contacts');

      $client = $this->Clients->find()->where(['id' => $id])->first();
      $projects = $this->Projects->find()->where(['client_id' => $id]);
      $contact_id = $client->contact_id;
      $contact = $this->Contacts->find()->where(['id' => $contact_id])->first();

      $data = [
            'client_name' => $client->client_name,
            'client_id' => $client->id,
            'street' => $client->street,
            'street_number' => $client->street_number,
            'postal_code' => $client->area_code,
            'city' => $client->city,
            'country' => $client->country,
            'projects' => $projects,
            'contact_firstname' => $contact->first_name,
            'contact_lastname' => $contact->last_name,
            'contact_phone' => $contact->phone,
            'contact_email' => $contact->email,
            'contact_fax' => $contact->fax,
          ];

      $this->set('data', $data);
  }

  // Edit client
  public function edit($id = null)
  {
      $this->loadModel('Contacts');

      // POST request
      if ($this->request->is('post')) {
          $data = $this->request->data;
          $client = $this->Clients->find()->where(['id' => $id])->first();
          $contact_id = $client->contact_id;

        // Get contact data from post form
        $contact_data = array(
        'first_name' => $data['firstname'],
        'last_name' => $data['lastname'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'fax' => $data['fax'],
      );

        // Get client data from post form
        $client_data = array(
    'client_name' => $data['client_name'],
    'street' => $data['street'],
    'street_number' => $data['street_number'],
    'area_code' => $data['area_code'],
    'city' => $data['city'],
    'country' => $data['country'],
    );
          $contact = $this->Contacts->get($contact_id);
          $contact = $this->Contacts->patchEntity($contact, $contact_data);

        // If contact validates, update client info with contact id and attempt to save
        if ($this->Contacts->save($contact)) {
            $client = $this->Clients->get($id);
            $client = $this->Clients->patchEntity($client, $client_data);
            $client->contact_id = $contact->id;

            if ($this->Clients->save($client)) {
                $this->Flash->success('The client has been edited successfully.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to edit company.'));
        }
          $errors = $contact->errors();

          $this->Flash->error('Unable to edit contact.');
      }

      // GET request

      $client = $this->Clients->find()->where(['id' => $id])->first();

      $contact_id = $client->contact_id;
      $contact = $this->Contacts->find()->where(['id' => $contact_id])->first();

      $data = array(
          'client_name' => $client->client_name,
          'client_id' => $client->id,
          'street' => $client->street,
          'street_number' => $client->street_number,
          'postal_code' => $client->area_code,
          'city' => $client->city,
          'country' => $client->country,
          'contact_firstname' => $contact->first_name,
          'contact_lastname' => $contact->last_name,
          'contact_phone' => $contact->phone,
          'contact_email' => $contact->email,
          'contact_fax' => $contact->fax,
        );
      $this->set('data', $data);
  }

  // Create new client
  public function create()
  {
      $this->loadModel('Contacts');

      // POST request
      if ($this->request->is('post')) {
          $contact = $this->Contacts->newEntity();
          $client = $this->Clients->newEntity([
            'associated' => ['Contacts'],
          ]);
          $data = $this->request->data;

          // Get contact data from post form
          $contact_data = array(
          'first_name' => $data['firstname'],
          'last_name' => $data['lastname'],
          'email' => $data['email'],
          'phone' => $data['phone'],
          'fax' => $data['fax'],
        );

          // Get client data from post form
          $client_data = array(
      'client_name' => $data['client_name'],
      'street' => $data['street'],
      'street_number' => $data['street_number'],
      'area_code' => $data['area_code'],
      'city' => $data['city'],
      'country' => $data['country'],
      );
          $contact = $this->Contacts->patchEntity($contact, $contact_data);

          // If contact validates, update client info with contact id and attempt to save
          if ($this->Contacts->save($contact)) {
              $client = $this->Clients->patchEntity($client, $client_data);
              $client->contact_id = $contact->id;

              if ($this->Clients->save($client)) {
                  $this->Flash->success('The client has been saved.');

                  return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('Unable to add company.'));

              // If company info doesn't validate, delete client's contact
              $this->Contacts->delete($contact);
          }
          $errors = $contact->errors();

          $this->Flash->error('Unable to add contact.');
      }
  }

  // Delete existing client
  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $this->loadModel('Contacts');

      $this->autoRender = false;

      $client = $this->Clients->get($id);
      $contact_id = $client->contact_id;
      $contact = $this->Contacts->get($contact_id);
      if ($this->Clients->delete($client)) {
        if ($this->Contacts->delete($contact)){
          $this->Flash->success('The customer has been deleted.');

          return $this->redirect(['action' => 'index']);
        }
      }
  }
}
