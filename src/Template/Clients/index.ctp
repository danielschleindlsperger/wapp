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

$url = $this->request->here;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Customers');
?>
<h1>Customers</h1>
<a class="btn btn-default" href="<?=Router::url(array(
    'controller' => 'clients',
    'action' => 'create'
  )); ?>">Create new customer</a>
<div class="list-group">
  <?php foreach ($clients as $client){
    echo '<a href="'.$url.'/'.urlencode($client->client_name).'"'.' class="list-group-item">'.$client->client_name.'</a>';
  }
  ?>
</div>
