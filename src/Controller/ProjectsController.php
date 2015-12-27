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
      $client_id = $project->client_id;
      $client = $this->Clients->find()->where(['id' => $client_id])->first();
      $contact_id = $client->contact_id;
      $contact = $this->Contacts->find()->where(['id' => $contact_id])->first();

      $data = [
        'project_name' => $project->project_name,
        'project_id' => $project->project_id,
        'client_name' => $client->client_name,
        'contact_firstname' => $contact->first_name,
        'contact_lastname' => $contact->last_name,
        'contact_phone' => $contact->phone,
        'contact_email' => $contact->email,
        'contact_fax' => $contact->fax,
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
