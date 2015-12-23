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
  public function showDetails(){

      $client_name = $this->request->pass;
      $query = $clients->find()->where(['company_name' => $client_name]);
      $client->company_name = 'Test Client';
      $this->set('client', $query);

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
