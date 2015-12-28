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
use Cake\I18n\Time;

$this->layout = false;

$edit_url = Router::url(array(
    'controller' => 'projects',
    'action' => 'edit',
    $data['project_id'],
  ), true);

$delete_url = Router::url(array(
    'controller' => 'projects',
    'action' => 'delete',
    $data['project_id'],
  ));

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', $data['project_name']);
?>

<div class="modal fade" id="modal-confirm-delete" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Project</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <?= $data['project_name']?>?</p>
      </div>
      <div class="modal-footer">
        <form class="form-horizontal" action="<?=$delete_url?>" method="post">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" id="delete-for-sure" value="Delete Project">
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="row">
  <div class="col-sm-12 col-md-9">
    <h1><?=$data['project_name']?></h1>
  </div>
  <div class="col-sm-12 col-md-3 col-md-offset-0">
    <div class="btn-group">
      <button class="btn btn-default" type="button" id="delete-button" data-toggle="modal" data-target="#modal-confirm-delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete</button>
      <a class="btn btn-default" href="<?=$edit_url?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit</a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 col-md-3">
    <h3>Timeframe</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <?= $this->Time->format($data['start_date'], 'd.M.Y').' - '.$this->Time->format($data['end_date'], 'd.M.Y') ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 col-md-3">
    <h3>Accounting</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <table class="table">
      <tr>
        <th>Contract amount</th>
        <td><?= $this->Number->currency($data['contract_amount'], 'EUR')?></td>
      </tr>
      <tr>
        <th>Internal costs</th>
        <td><?= $this->Number->currency($data['internal_cost'], 'EUR')?></td>
      </tr>
      <tr>
        <th>Net profit</th>
        <td><?php echo $this->Number->currency($data['contract_amount'] - $data['internal_cost'], 'EUR')?></td>
      </tr>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 col-md-3">
    <h3>Contact</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <h4>
      <?= $data['client_name']?>
    </h4>
    <?= $data['contact_firstname'].' '.$data['contact_lastname'].'<br>' ?>
    Phone number: <?= $data['contact_phone'].'<br>' ?>
    Email:
    <a href="mailto:<?=$data['contact_email']?>" target="_top"><?=$data['contact_email']?></a>
    <br>
    Fax: <?= $data['contact_fax'] ?>
  </div>
</div>
