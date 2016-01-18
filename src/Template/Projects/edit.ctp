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

$url = Router::url(array(
   'controller' => 'projects',
   'action' => 'edit',
   $project->id
 ), true);

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Edit Project');
?>
<h1>Edit project: <?=$project->project_name?></h1>
<?= $this->Flash->render() ?>

<?php
// Set default entry for client select list
$client_name_default;
foreach($clients as $client){
  if($client->id == $project->client_id){
    $client_name_default = $client->client_name;
  }
}

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
  echo $this->Form->input('client_name', ['type' => 'select', 'options' => $client_name_options, 'default' => $client_name_default, 'required' => 'required']);
  echo '<h3>Project</h3>';
  echo $this->Form->input('project_name', ['type' => 'text', 'value' => $project->project_name, 'required' => 'required']);
  echo $this->Form->input('status', ['type' => 'select', 'options' => [
    'planned' => 'planned', 'began' => 'began', 'stopped' => 'stopped', 'cancelled' => 'cancelled' , 'completed' => 'completed'
  ], 'default' => $project->status]);
  echo '<h3>Dates</h3>';
  echo $this->Form->input('start_date', ['type' => 'date', 'value' => $this->Time->format($project->start_date, 'YYYY-MM-dd'), 'required' => 'required']);
  echo $this->Form->input('end_date', ['type' => 'date', 'value' => $this->Time->format($project->end_date, 'YYYY-MM-dd'), 'required' => 'required']);
  echo '<h3>Accounting</h3>';
  echo $this->Form->input('contract_amount', ['type' => 'number', 'step' => 0.01, 'value' => $project->contract_amount, 'required' => 'required']);
  echo $this->Form->input('internal_cost', ['type' => 'number', 'step' => 0.01, 'value' => $project->internal_cost, 'required' => 'required']);
  echo '<h3>Contact person</h3>';
  echo $this->Form->input('contact_first_name', ['type' => 'text', 'value' => $project->contact_first_name, 'required' => 'required']);
  echo $this->Form->input('contact_last_name', ['type' => 'text', 'value' => $project->contact_last_name, 'required' => 'required']);
  echo $this->Form->input('contact_phone', ['type' => 'text', 'value' => $project->contact_phone, 'required' => 'required']);
  echo $this->Form->input('contact_fax', ['type' => 'text', 'value' => $project->contact_fax, 'required' => 'required']);
  echo $this->Form->input('contact_email', ['type' => 'email', 'value' => $project->contact_email, 'required' => 'required']);
  echo $this->Form->submit('Edit Project');
  echo $this->Form->end();
 ?>
