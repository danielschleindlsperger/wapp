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
      $projects = $this->Projects->find()->where(['client_id' => $id]);
      $contact_id = $client->contact_id;
      $contact = $this->Contacts->find()->where(['id' => $contact_id])->first();

      $data = [
            'client_name' => $client->client_name,
            'street' => $client->street,
            'street_number' => $client->street_number,
            'postal_code' => $client->area_code,
            'city' => $client->city,
            'country' => $client->country,
            'projects' => $projects,
            'contact_firstname' => $contact->first_name,
            'contact_lastname' => $contact->last_name,
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
      // FIXME
      $this->loadModel('Contacts');
      if ($this->request->is('post')) {
          $contact = $this->Contacts->newEntity();
          $data = $this->request->data;
          $contact_data = array(
          'first_name' => $data['firstname'],
          'last_name' => $data['lastname'],
          'email' => $data['email'],
          'phone' => $data['phone'],
          'fax' => $data['fax'],
        );
          $contact = $this->Contacts->patchEntity($contact, $contact_data);
          if ($this->Contacts->save($contact)) {
                  $id = $contact->id;
                  $this->Flash->success('The contact has been saved. ID: '.$id, ['id' => $id]);

                  return $this->redirect(['action' => 'index']);


            //
            //   $client_data = array(
            // 'client_name' => $data['client_name'],
            // 'street' => $data['street'],
            // 'street_number' => $data['street_number'],
            // 'area_code' => $data['area_code'],
            // 'city' => $data['city'],
            // 'country' => $data['country'],
            // 'contact_id' => $contact,
            // );
            //
            //   $client = $this->Clients->newEntity($client_data, [
            //     'associated' => ['Contacts'],
            //   ]);
            //   if ($this->Clients->save($client)) {
            //       $this->Flash->success('The contact has been saved', ['id' => $id]);
            //
            //       return $this->redirect(['action' => 'index']);
            //   }
            //   $this->Flash->error(__('Unable to add company.'));
          }
          $errors = $contact->errors();
          $this->Flash->error('Unable to add contact: '.debug($errors));
      }
  }

  // Delete existing client
  public function delete()
  {
  }
}
