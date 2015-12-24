<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class ProjectsController extends AppController {

  // List projects
  public function index() {

    $this->set('projects', $this->Projects->find('all'));

  }

  // Show details to specific project
  public function showDetails($id = null){

      $this->loadModel('Clients');
      $this->loadModel('Contacts');

      $project = $this->Projects->find()->where(['id' => $id])->first();
      $client_id = $project->client;
      $contact_id = $project->contact;
      $client = $this->Clients->find()->where(['id' => $client_id])->first();

      $contact = $this->Contacts->find()->where(['id' => $contact_id])->first();
      $data = [
        'project_name' => $project->project_name,
        'project_id' => $project->id,
        'client_name' => $client->client_name,
        'contact_firstname' => $contact->firstname,
        'contact_lastname' => $contact->lastname,
        'contact_phone' => $contact->phone,
        'contact_email' => $contact->email,
        'contract_amount' => $project->contract_amount,
        'internal_cost' => $project->internal_cost,
        'start_date' => $project->start_date,
        'end_date' => $project->end_date
      ];
      $this->set('data', $data);

  }

  // Edit project
  public function edit(){

  }

  // Create new project
  public function create(){

    $this->loadModel('Clients');
    $this->set('clients', $this->Clients->find('all'));

  }

  // Delete existing project
  public function delete(){

  }
}
