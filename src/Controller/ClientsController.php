<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class ClientsController extends AppController {

  // List clients
  public function index() {

    $this->set('clients', $this->Clients->find('all'));

  }

  // Show details to specific client
  public function showDetails($id=null){

          $this->loadModel('Projects');
          $this->loadModel('Contacts');

          $clients = $this->Clients->find()->where(['id' => $id])->first();
          $projects = $this->Projects->find()->where(['client' => $id]);

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

  // Edit client
  public function edit(){

  }

  // Create new client
  public function create(){

  }

  // Delete existing client
  public function delete(){

  }
}
