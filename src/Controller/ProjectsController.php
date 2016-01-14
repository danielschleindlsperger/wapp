<?php

namespace App\Controller;

use Cake\I18n\Time;
use Cake\Network\Exception\NotFoundException;

class ProjectsController extends AppController
{
    // List projects
  public function index()
  {
    $this->loadModel('Clients');

    $projects = $this->Projects->find('all');

    foreach ($projects as $project){
      $client_id = $project->client_id;
      $project->client = $this->Clients->get($client_id);
    }
      $this->set('projects', $projects);
  }

  // Show details to specific project
  public function showDetails($id = null)
  {
      $this->loadModel('Clients');

      $project = $this->Projects->get($id);
      $client_id = $project->client_id;
      $client = $this->Clients->get($client_id);

      $this->set(['project' => $project, 'client' => $client]);

      // 404 if project doesn't exist
      if (empty($project)) {
          throw new NotFoundException(__('Project not found'));
      }
  }

  // Edit project
  public function edit($id = null)
  {

    $this->loadModel('Clients');

    // POST request
    if ($this->request->is('post')) {
        $data = $this->request->data;

        $project = $this->Projects->get($id);
        $project = $this->Projects->patchEntity($project, $data);

        if ($this->Projects->save($project)) {
            $this->Flash->success('The project has been edited successfully.');

            return $this->redirect(['action' => 'index']);
        }
        $errors = $project->errors();
        $this->Flash->error(__('Unable to edit project.'.debug($errors).debug($project_data['start_date'])));
    }

    // GET request
    $project = $this->Projects->get($id);

    // 404 if client doesn't exist
    if (empty($project)) {
        throw new NotFoundException(__('Project not found'));
    }
    $this->set(['clients' => $this->Clients->find('all'), 'project' => $project]);
  }

  // Create new project
  public function create()
  {
      $this->loadModel('Clients');

      // POST request
      if ($this->request->is('post')) {
          $project = $this->Projects->newEntity();

          $data = $this->request->data;

          $client = $this->Clients->find()->where(['client_name' => $data['client_name']])->first();

          $data['client_id'] = $client->id;

          $project = $this->Projects->patchEntity($project, $data);

          if ($this->Projects->save($project)) {
              $this->Flash->success('The project has been saved.');

              return $this->redirect(['action' => 'index']);
          }

          $this->Flash->error(__('Unable to add project.'));
      }

      // GET request
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
