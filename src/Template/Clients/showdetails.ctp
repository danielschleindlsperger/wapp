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
    $client->id,
  ), true);

$delete_url = Router::url(array(
    'controller' => 'clients',
    'action' => 'delete',
    $client->id,
  ));
$client_url = Router::url(array(
   'controller' => 'clients',
   'action' => 'showdetails'
 ), true);

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', $client->client_name);
?>

<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Customer</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <?= $client->client_name?> and their contact?</p>
      </div>
      <div class="modal-footer">
        <form class="form-horizontal" action="<?=$delete_url?>" method="post">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" id="delete-for-sure" value="Delete Customer">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
  <div class="col-sm-12 col-md-9">
    <h1><?=$client->client_name?></h1>
  </div>
    <div class="btn-group">
      <button class="btn btn-default" type="button" id="delete-button" data-toggle="modal" data-target="#modal-confirm-delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete</button>
      <a class="btn btn-default" href="<?=$edit_url?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit</a>
    </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-4">
    <h3>Adress</h3>
    <?= $client->street.' '.$client->street_number.'<br>'?>
    <?= $client->area_code.' '.$client->city.'<br>'?>
    <?= $client->country ?>
  </div>
  <div class="col-sm-12 col-md-4" style="height:30rem;">
    <div id="map">
    </div>
  </div>
  <div class="col-sm-12 col-md-4">
    <h3>Contact</h3>
    <?= $client->contact_first_name.' '.$client->contact_last_name.'<br>'?>
    Phone number: <?= $client->contact_phone.'<br>' ?>
    Email:
    <a href="mailto:<?=$client->contact_email?>" target="_top"><?=$client->contact_email?></a>
    <br>
    Fax: <?= $client->contact_fax?>
  </div>
</div>
<div class="row">
  <h2>Projects</h2>
  <div class="list-group">
    <?php foreach ($client->projects as $project) {
      $names = '<div class="col-xs-12 col-md-5"><span class="project-name">'.$project->project_name.'</span></div>';
      $dates = '<div class="col-xs-6 col-md-3">'.'<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>'.$this->Time->format($project->start_date, 'd.M.Y').' - '. $this->Time->format($project->end_date, 'd.M.Y').'</div>';
      $profit = '<div class="col-xs-6 col-md-3">'.'<span class="glyphicon glyphicon-tag" aria-hidden="true"></span>'.
      $this->Number->currency($project->contract_amount - $project->internal_cost, 'EUR').'</div>';
      echo '<a href="'.Router::url(array('controller' => 'projects', 'action' => 'showdetails', $project->id), true).'"'.' class="list-group-item row">'.
      $names.$dates.$profit.
      '</a>';
}
    ?>
  </div>
</div>
<?php
  $this->start('more_js');
 ?>
<script>
var client_data =
  <?php
  echo '{'.
      'client_name: "'.htmlspecialchars($client->client_name).'", '.
      'client_link: "'.$client_url.'/'.$client->id.'", '.
      'street: "'.htmlspecialchars($client->street).'", '.
      'street_number: "'.htmlspecialchars($client->street_number).'", '.
      'area_code: "'.htmlspecialchars($client->area_code).'", '.
      'city: "'.htmlspecialchars($client->city).'", '.
      'country: "'.htmlspecialchars($client->country).
      '"}';
  ?>;
</script>
 <?= $this->Html->script('client_showdetails_map.js') ?>
 <?= $this->Html->script('delete_client.js') ?>
 <?= $this->Html->script('https://maps.googleapis.com/maps/api/js?callback=initMap') ?>
<?php
  $this->end('more_js')?>
