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

$url = $this->request->here;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Customers');
?>
<h1>Customers</h1>
<div class="row">
  <div class="create-button">
    <a class="btn btn-default" href="<?=Router::url(array(
        'controller' => 'clients',
        'action' => 'create',
      )); ?>">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Add customer
    </a>
  </div>
</div>
<?= $this->Flash->render() ?>
<div class="list-group">
  <?php foreach ($clients as $client) {
    echo '<a href="'.$url.'/'.urlencode($client->id).'"'.' class="list-group-item row"><div class="col-sm-12 col-md-6 list-element"><h4>'.$client->client_name.'</h4>'.
    $this->Client->getAddressString($client).
    '</div>';
    $proj = $this->Project->getProjectsByStatus($client->projects);

    // Stopped projects
    echo '<div class="project-counter-element col-xs-2 col-md-1">'.
    '<span class="glyphicon glyphicon-pause" aria-hidden="true">'.
    $proj['stopped'].
    '</span></div>';

    // Began projects
    echo '<div class="project-counter-element col-xs-2 col-md-1">'.
    '<span class=" glyphicon glyphicon-play" aria-hidden="true">'.
    $proj['began'].
    '</span></div>';

    // Planned projects
    echo '<div class="project-counter-element col-xs-2 col-md-1">'.
    '<span class=" glyphicon glyphicon-th-list" aria-hidden="true">'.
    $proj['planned'].
    '</span></div>';

    // Cancelled projects
    echo '<div class="project-counter-element col-xs-2 col-md-1">'.
    '<span class=" glyphicon glyphicon-remove" aria-hidden="true">'.
    $proj['cancelled'].
    '</span></div>';

    // Completed projects
    echo '<div class="project-counter-element col-xs-2 col-md-1">'.
    '<span class=" glyphicon glyphicon-check" aria-hidden="true">'.
    $proj['completed'].
    '</span></div>';

    echo'</a>';
}
  ?>
</div>
