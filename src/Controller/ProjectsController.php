<?php

namespace App\Controller;

use Cake\I18n\Time;

class ProjectsController extends AppController
{
    // List projects
  public function index()
  {
      $this->set('projects', $this->Projects->find('all'));
  }

  // Show details to specific project
  public function showDetails($id = null)
  {
      $this->loadModel('Clients');
      $this->loadModel('Contacts');

      $project = $this->Projects->get($id);
      $client_id = $project->client_id;
      $client = $this->Clients->get($client_id);
      $contact_id = $client->contact_id;
      $contact = $this->Contacts->get($contact_id);

      $data = [
        'project_name' => $project->project_name,
        'project_id' => $project->id,
        'status' => $project->status,
        'client_name' => $client->client_name,
        'contact_firstname' => $contact->first_name,
        'contact_lastname' => $contact->last_name,
        'contact_phone' => $contact->phone,
        'contact_email' => $contact->email,
        'contact_fax' => $contact->fax,
        'contract_amount' => $project->contract_amount,
        'internal_cost' => $project->internal_cost,
        'start_date' => $project->start_date,
        'end_date' => $project->end_date,
      ];
      $this->set('data', $data);
  }

  // Edit project
  public function edit($id = null)
  {
      $this->loadModel('Clients');

    // POST request
    if ($this->request->is('post')) {
        $data = $this->request->data;

        $client = $this->Clients->find()->where(['client_name' => $data['client_name']])->first();
        $client_id = $client->id;

        $project_data = array(
        'project_name' => $data['project_name'],
        'client_id' => $client_id,
        'status' => $data['status'],
        'start_date' => new Time($data['start_date']),
        'end_date' => new Time($data['end_date']),
        'contract_amount' => $data['contract_amount'],
        'internal_cost' => $data['internal_cost'],
        );
        $project = $this->Projects->get($id);
        $project = $this->Projects->patchEntity($project, $project_data);
        //$project->client_id = $client_id;

        if ($this->Projects->save($project)) {
            $this->Flash->success('The project has been edited successfully.');

            return $this->redirect(['action' => 'index']);
        }
        $errors = $project->errors();
        $this->Flash->error(__('Unable to edit project.'.debug($errors).debug($project_data['start_date'])));
    }

    // GET request
    $project = $this->Projects->get($id);
      $client_id = $project->client_id;
      $client = $this->Clients->get($client_id);
      $clients = $this->Clients->find('all');

      $data = array(
        'client_name' => $client->client_name,
        'client_id' => $client->id,
        'clients' => $clients,
        'project_id' => $project->id,
        'project_name' => $project->project_name,
        'status' => $project->status,
        'start_date' => $project->start_date,
        'end_date' => $project->end_date,
        'contract_amount' => $project->contract_amount,
        'internal_cost' => $project->internal_cost,
      );
      $this->set('data', $data);
  }

  // Create new project
  public function create()
  {
      $this->loadModel('Clients');
      if ($this->request->is('post')) {
          $project = $this->Projects->newEntity([
          'associated' => ['Projects'],
        ]);

          $data = $this->request->data;

          $client = $this->Clients->find()->where(['client_name' => $data['client_name']])->first();
          $client_id = $client->id;

          $project_data = array(
          'project_name' => $data['project_name'],
          'client_id' => $client_id,
          'status' => $data['status'],
          'start_date' => new Time($data['start_date']),
          'end_date' => new Time($data['end_date']),
          'contract_amount' => $data['contract_amount'],
          'internal_cost' => $data['internal_cost'],
          );
          $project = $this->Projects->patchEntity($project, $project_data);
          $project->client_id = $client_id;

          if ($this->Projects->save($project)) {
              $this->Flash->success('The project has been saved.');

              return $this->redirect(['action' => 'index']);
          }
          $errors = $project->errors();
          $this->Flash->error(__('Unable to add project.'.debug($errors).debug($project_data['start_date'])));
      }
      $this->set('clients', $this->Clients->find('all'));
  }

  // Delete existing project
  public function delete($id = null)
  {
      $this->request->allowMethod(['post', 'delete']);
      $this->loadModel('Clients');
      $this->loadModel('Contacts');

      $this->autoRender = false;

      $project = $this->Projects->get($id);

      if ($this->Projects->delete($project)) {
          $this->Flash->success('The project has been deleted.');

          return $this->redirect(['action' => 'index']);
      }
  }
}
