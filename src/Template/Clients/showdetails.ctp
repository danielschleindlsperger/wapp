<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 *
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\I18n\Time;

$this->layout = false;

$edit_url = Router::url(array(
    'controller' => 'clients',
    'action' => 'edit',
    $data['client_id'],
  ), true);

$delete_url = Router::url(array(
    'controller' => 'clients',
    'action' => 'delete',
    $data['client_id'],
  ));

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', $data['client_name']);
?>

<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Customer</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <?= $data['client_name']?> and their contact?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="delete-for-sure">Delete Customer</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
  <div class="col-sm-12 col-md-9">
    <h1><?=$data['client_name']?></h1>
  </div>
  <div class="col-sm-12 col-md-3 col-md-offset-0">
    <div class="btn-group">
      <button class="btn btn-default" type="button" id="delete-button" data-url="<?=$delete_url?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete</button>
      <a class="btn btn-default" href="<?=$edit_url?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-4">
    <h3>Adress</h3>
    <?= $data['street'].' '.$data['street_number'].'<br>'?>
    <?= $data['postal_code'].' '.$data['city'].'<br>'?>
    <?= $data['country'] ?>
  </div>
  <div class="col-sm-12 col-md-4" style="height:30rem;">
    <div id="map">
    </div>
  </div>
  <div class="col-sm-12 col-md-4">
    <h3>Contact</h3>
    <?= $data['contact_firstname'].' '.$data['contact_lastname'].'<br>'?>
    Phone number: <?= $data['contact_phone'].'<br>' ?>
    Email:
    <a href="mailto:<?=$data['contact_email']?>" target="_top"><?=$data['contact_email']?></a>
    <br>
    Fax: <?= $data['contact_fax'] ?>
  </div>
</div>
<div class="row">
  <h2>Projects</h2>
  <div class="list-group">
    <?php foreach ($data['projects'] as $project) {
    echo '<a href="'.Router::url(array('controller' => 'projects', 'action' => 'showdetails', $project->id), true).'"'.' class="list-group-item" ><span class="project-list-title">'.
      $project->project_name.'</span>&nbsp;Start: '.$this->Time->format($project->start_date, 'd.M.Y').'&nbsp;End: '.$this->Time->format($project->end_date, 'd.M.Y').'&nbsp;Contract amount: '.$this->Number->currency($project['contract_amount'], 'EUR').'</a>';
}
    ?>
  </div>
</div>
<?php
  $this->start('more_js');
 ?>
 <?= $this->Html->script('client_showdetails_map.js') ?>
 <?= $this->Html->script('delete_client.js') ?>
 <?= $this->Html->script('https://maps.googleapis.com/maps/api/js?callback=initMap') ?>
<?php
  $this->end('more_js')?>
