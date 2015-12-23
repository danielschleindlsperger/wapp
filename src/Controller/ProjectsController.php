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
  public function showDetails(){

  }

  // Edit project
  public function edit(){

  }

  // Create new project
  public function create(){

  }

  // Delete existing project
  public function delete(){

  }
}
