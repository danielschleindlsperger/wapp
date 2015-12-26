<?php

namespace App\Controller;

class ClientsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
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
            'contact_fax' => $contact->fax,
          ];
      $this->set('data', $data);
  }

  // Edit client
  public function edit()
  {
  }

  // Create new client
  public function create()
  {
      $this->loadModel('Contacts');
      $contact = $this->Contacts->newEntity();
      if ($this->request->is('post')) {
          $data = $this->request->data;
          $contact_data = array(
          'firstname' => $data['firstname'],
          'lastname' => $data['lastname'],
          'email' => $data['email'],
          'phone' => $data['phone'],
          'fax' => $data['fax'],
        );

          $contact = $this->Contacts->patchEntity($contact, $contact_data);
          if ($this->Contacts->save($contact)) {

            // $client_data = array(
            // 'client_name' => $data['client_name'],
            // 'street' => $data['street'],
            // 'street_number' => $data['street_number'],
            // 'area_code' => $data['area_code'],
            // 'city' => $data['city'],
            // 'country' => $data['country'],
            //);

              //$this->Flash->success(__('Contact has been saved.', ['id' => $contact->id]));
              $this->Flash->success('The contact has been saved', ['id' => $contact->id]);

              return $this->redirect(['action' => 'index']);
          }
          $this->Flash->error(__('Unable to add contact.'));
      }
  }

  // Delete existing client
  public function delete()
  {
  }
}
