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

      $this->set('client', $this->Clients->find()->where(['id' => $id])->first());

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
