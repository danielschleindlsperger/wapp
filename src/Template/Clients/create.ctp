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
 use Cake\Cache\Cache;
 use Cake\Core\Configure;
 use Cake\Datasource\ConnectionManager;
 use Cake\Error\Debugger;
 use Cake\Network\Exception\NotFoundException;
 use Cake\Routing\Router;

$url = Router::url(array(
    'controller' => 'clients',
    'action' => 'create',
  ), true);

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Create Customer');
?>

<h1>Create new customer</h1>
<?= $this->Flash->render() ?>
<?php
  echo $this->Form->create(null,[
    'horizontal' => true,
    'cols' => [
      'sm' => [
        'label' => 4,
        'input' => 4,
        'error' => 4
      ],
      'md' => [
        'label' => 2,
        'input' => 8,
        'error' => 2
      ]
    ]
  ]);
  echo '<h3>Company</h3>';
  echo $this->Form->input('client_name', ['type' => 'text']);
  echo '<h3>Adress</h3>';
  echo $this->Form->input('street', ['type' => 'text']);
  echo $this->Form->input('street_number', ['type' => 'text']) ;
  echo $this->Form->input('area_code', ['type' => 'text']) ;
  echo $this->Form->input('city', ['type' => 'text']) ;
  echo $this->Form->input('country', ['type' => 'text']) ;
  echo '<h3>Contact person</h3>';
  echo $this->Form->input('contact_first_name', ['type' => 'text']);
  echo $this->Form->input('contact_last_name', ['type' => 'text']);
  echo $this->Form->input('contact_phone', ['type' => 'text']);
  echo $this->Form->input('contact_fax', ['type' => 'text']);
  echo $this->Form->input('contact_email', ['type' => 'email']);
  echo $this->Form->submit('Submit');
  echo $this->Form->end();
 ?>

  <?php
    $this->start('more_js');
   ?>
  <?php
    $this->end('more_js')?>
