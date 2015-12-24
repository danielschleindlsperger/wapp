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
$this->assign('title', $data['project_name']);
?>
<div class="row">
  <div class="col-sm-12 col-md-9">
    <h1><?=$data['project_name']?></h1>
  </div>
  <div class="col-sm-12 col-md-3 col-md-offset-0">
    <div class="btn-group">
      <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;Delete</button>
      <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;Edit</button>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 col-md-3">
    <h3 class="create-heading">Timeframe</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <?= $data['start_date'].' - '.$data['end_date'] ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-12 col-md-3">
    <h3 class="create-heading">Profit</h3>
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
    <h3 class="create-heading">Contact</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <h4>
      <?= $data['client_name']?>
    </h4>
    <?= $data['contact_firstname'].' '.$data['contact_lastname'].'<br>' ?>
    Phone number: <?= $data['contact_phone'].'<br>' ?>
    Email:
    <a href="mailto:<?=$data['contact_email']?>" target="_top"><?=$data['contact_email']?></a>
  </div>
</div>
