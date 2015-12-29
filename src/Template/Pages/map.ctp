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
   'controller' => 'clients',
   'action' => 'showdetails'
 ), true);

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;


?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Home');
?>
<?php
  $this->start('more_js');
 ?>
 <div id="map"></div>
 <script>
  var client_data = [
    <?php foreach ($clients as $client){
      echo '{'.
        'client_name: "'.htmlspecialchars($client->client_name).'", '.
        'client_link: "'.$url.'/'.$client->id.'", '.
        'client_icon_color: "'.htmlspecialchars($this->IconColor->getColor($client->projects)).'", '.
        'street: "'.htmlspecialchars($client->street).'", '.
        'street_number: "'.htmlspecialchars($client->street_number).'", '.
        'area_code: "'.htmlspecialchars($client->area_code).'", '.
        'city: "'.htmlspecialchars($client->city).'", '.
        'country: "'.htmlspecialchars($client->country).
        '"},';
    }
    ?>
  ];
 </script>
 <?= $this->Html->script('wmap.js') ?>
 <?= $this->Html->script('https://maps.googleapis.com/maps/api/js?callback=initMap') ?>
<?php
  $this->end('more_js')?>
