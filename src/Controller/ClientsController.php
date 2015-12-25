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

          $client = $this->Clients->find()->where(['id' => $id])->first();
          $projects = $this->Projects->find()->where(['client' => $id]);
          $contact_id = $client->contact;
          $contact = $this->Contacts->find()->where(['id' => $contact_id])->first();


          $data = [
            'client_name' => $client->client_name,
            'street' => $client->street,
            'street_number' => $client->street_number,
            'postal_code' => $client->area_code,
            'city' => $client->city,
            'country' => $client->country,
            'projects' => $projects,
            'contact_firstname' => $contact->firstname,
            'contact_lastname' => $contact->lastname,
            'contact_phone' => $contact->phone,
            'contact_email' => $contact->email,
            'contact_fax' => $contact->fax
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
