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

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Create Project');
?>
  <h1>Create new project</h1>
<form class="form-horizontal">
  <div class="col-sm-12 col-md-3">
    <h3>Company</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <div class="form-group">
      <label for="company_name">company name</label>
      <select class="form-control" id="company_name" name="client_name">
        <?php
          foreach($clients as $client){
            echo '<option data-id="'.$client->id.'">'.$client->client_name.'</option>';
          }
        ?>
      </select>
    </div>
  </div>

  <div class="col-sm-12 col-md-3">
    <h3>Project</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="project_name">project name</label>
        <input type="text" class="form-control" id="project_name" name="project_name">
      </div>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <div class="form-group">
      <label for="project_status">project status</label>
      <select class="form-control" id="project_status" name="status">
        <option>planned</option>
        <option>began</option>
        <option>stopped</option>
        <option>cancelled</option>
        <option>completed</option>
      </select>
    </div>
  </div>

  <div class="col-sm-12 col-md-3">
    <h3>Dates</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <div class="form-group">
      <label for="start_date">start date</label>
      <input type="date" class="form-control" id="start_date" name="start_date">
    </div>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <div class="form-group">
      <label for="end_date">end date</label>
      <input type="date" class="form-control" id="end_date" name="start_date">
    </div>
  </div>

  <div class="col-sm-12 col-md-3">
    <h3>Pricing</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <div class="form-group">
      <label for="contract_amound">contract amount</label>
      <input type="text" class="form-control" id="contract_amount" name="contract_amount">
    </div>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <div class="form-group">
      <label for="internal_costs">internal costs</label>
      <input type="text" class="form-control" id="internal_costs" name="internal_cost">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-2 col-md-offset-10">
      <input type="submit" value="Submit" class="btn btn-default" id="create-client-submit">
    </div>
  </div>
  </form>

<?php
  $this->start('more_js');
 ?>
 <?= $this->Html->script('create_project.js') ?>
<?php
  $this->end('more_js')?>
