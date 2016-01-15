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

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Home');
?>
<h1>Dashboard</h1>
<div class="row">
  <h2>Top 5 Clients By Number of Projects</h2>
  <div class="list-group">
    <?php
    $topClientsByNumberOfProjects = $this->Dashboard->getTopClientsByProjectNumber($clients);
    foreach ($topClientsByNumberOfProjects as $client ) {
      $names = '<div class="col-xs-12 col-md-5"><span class="project-name">'.$client['client_name'].'</span></div>';
      $NumberOfProjects = '<div class="col-xs-6 col-md-3"> Projects: '.
      $client['NumberOfProjects'].'</div>';
      echo '<a href="'.Router::url(array('controller' => 'clients', 'action' => 'showdetails', $client['id']), true).'"'.' class="list-group-item row">'.
      $names.$NumberOfProjects.
      '</a>';
    }
    ?>
  </div>
</div>

<div class="row">
  <h2>Top 5 Clients By Sales</h2>
  <div class="list-group">
    <?php
    $topClientsBySales = $this->Dashboard->getTopClientsBySales($clients);
    foreach ($topClientsBySales as $client ) {
      $names = '<div class="col-xs-12 col-md-5"><span class="project-name">'.$client['client_name'].'</span></div>';
      $sales = '<div class="col-xs-6 col-md-3"> Revenue: '.
      $this->Number->currency($client['sales'], 'EUR').'</div>';
      echo '<a href="'.Router::url(array('controller' => 'clients', 'action' => 'showdetails', $client['id']), true).'"'.' class="list-group-item row">'.
      $names.$sales.
      '</a>';
    }
    ?>
  </div>
</div>

<div class="row">
  <h2>Top 5 Running Projects</h2>
  <div class="list-group">
    <?php
    $topRunningProjects = $this->Dashboard->getTopRunningProjects($projects);
    foreach ($topRunningProjects as $project ) {
      $names = '<div class="col-xs-12 col-md-5"><span class="project-name">'.$project['project_name'].'</span></div>';
      $sales = '<div class="col-xs-6 col-md-3"> Revenue: '.
      $this->Number->currency($project['sales'], 'EUR').'</div>';
      echo '<a href="'.Router::url(array('controller' => 'projects', 'action' => 'showdetails', $project['id']), true).'"'.' class="list-group-item row">'.
      $names.$sales.
      '</a>';
    }
    ?>
  </div>
</div>

<div class="row">
  <h2>Top 5 Stopped Projects</h2>
  <div class="list-group">
    <?php
    $topStoppedProjects = $this->Dashboard->getTopStoppedProjects($projects);
    foreach ($topStoppedProjects as $project ) {
      $names = '<div class="col-xs-12 col-md-5"><span class="project-name">'.$project['project_name'].'</span></div>';
      $sales = '<div class="col-xs-6 col-md-3"> Revenue: '.
      $this->Number->currency($project['sales'], 'EUR').'</div>';
      echo '<a href="'.Router::url(array('controller' => 'projects', 'action' => 'showdetails', $project['id']), true).'"'.' class="list-group-item row">'.
      $names.$sales.
      '</a>';
    }
    ?>
  </div>
</div>

<div class="row">
  <h2>Top 5 Planned Projects</h2>
  <div class="list-group">
    <?php
    $topPlannedProjects = $this->Dashboard->getTopPlannedProjects($projects);
    foreach ($topPlannedProjects as $project ) {
      $names = '<div class="col-xs-12 col-md-5"><span class="project-name">'.$project['project_name'].'</span></div>';
      $sales = '<div class="col-xs-6 col-md-3"> Revenue: '.
      $this->Number->currency($project['sales'], 'EUR').'</div>';
      echo '<a href="'.Router::url(array('controller' => 'projects', 'action' => 'showdetails', $project['id']), true).'"'.' class="list-group-item row">'.
      $names.$sales.
      '</a>';
    }
    ?>
  </div>
</div>
