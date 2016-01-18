<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;

$this->layout = false;

$url = Router::url(array(
    'controller' => 'projects',
    'action' => 'create',
  ), true);

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Create Project');
?>
  <h1>Create new project</h1>
  <?= $this->Flash->render() ?>

  <?php
  // Set options for client select list
  $client_name_options = [];
  foreach($clients as $client){
    $client_name_options[$client->client_name]=$client->client_name;
  }
  ?>

  <?php
    echo $this->Form->create(null,[
      'horizontal' => true,
      'cols' => [
        'xs' => [
          'label' => 12,
          'input' => 12,
          'error' => 12
        ],
        'md' => [
          'label' => 2,
          'input' => 8,
          'error' => 2
        ]
      ]
    ]);
    echo '<h3>Company</h3>';
    echo $this->Form->input('client_name', ['type' => 'select', 'options' => $client_name_options, 'required' => 'required']);
    echo '<h3>Project</h3>';
    echo $this->Form->input('project_name', ['type' => 'text', 'required' => 'required']);
    echo $this->Form->input('status', ['type' => 'select', 'options' => [
      'planned' => 'planned', 'began' => 'began', 'stopped' => 'stopped', 'cancelled' => 'cancelled' , 'completed' => 'completed'
      ]]);
    echo '<h3>Dates</h3>';
    echo $this->Form->input('start_date', ['type' => 'date', 'required' => 'required']);
    echo $this->Form->input('end_date', ['type' => 'date', 'required' => 'required']);
    echo '<h3>Accounting</h3>';
    echo $this->Form->input('contract_amount', ['type' => 'number', 'step' => 0.01, 'required' => 'required']);
    echo $this->Form->input('internal_cost', ['type' => 'number', 'step' => 0.01, 'required' => 'required']);
    echo '<h3>Contact person</h3>';
    echo $this->Form->input('contact_first_name', ['type' => 'text', 'required' => 'required']);
    echo $this->Form->input('contact_last_name', ['type' => 'text', 'required' => 'required']);
    echo $this->Form->input('contact_phone', ['type' => 'text', 'required' => 'required']);
    echo $this->Form->input('contact_fax', ['type' => 'text', 'required' => 'required']);
    echo $this->Form->input('contact_email', ['type' => 'email', 'required' => 'required']);
    echo $this->Form->submit('Create Project');
    echo $this->Form->end();
   ?>
