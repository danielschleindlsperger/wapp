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
  <!-- <h1>Create new customer</h1>

    <div class="col-sm-12 col-md-3">
      <h3>Company</h3>
    </div>
    <div class="col-sm-12 col-md-9">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="company_name">company name</label>
          <input type="text" class="form-control" id="company_name">
        </div>
      </form>
    </div>

    <div class="col-sm-12 col-md-3">
      <h3>Adress</h3>
    </div>
    <div class="col-sm-12 col-md-9">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="street">street</label>
          <input type="text" class="form-control" id="street">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="street_number">street number</label>
          <input type="text" class="form-control" id="street_number">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="postal_code">postal code</label>
          <input type="text" class="form-control" id="postal_code">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="city">city</label>
          <input type="text" class="form-control" id="city">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="country">country</label>
          <input type="text" class="form-control" id="country">
        </div>
      </form>
    </div>

    <div class="col-sm-12 col-md-3">
      <h3>Contact person</h3>
    </div>
    <div class="col-sm-12 col-md-9">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="first_name">first name</label>
          <input type="text" class="form-control" id="first_name">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="last_name">last name</label>
          <input type="text" class="form-control" id="last_name">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="phone">phone number</label>
          <input type="text" class="form-control" id="phone_number">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="fax">fax number</label>
          <input type="text" class="form-control" id="fax">
        </div>
      </form>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <form class="form-horizontal">
        <div class="form-group">
          <label for="email">email</label>
          <input type="email" class="form-control" id="email">
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-2 col-md-offset-10">
        <button type="submit" class="btn btn-default" id="create-client-submit">Submit</button>
      </div>
    </div> -->

  <h1>Create new customer</h1>
  <?= $this->Flash->render() ?>
  <form class="form-horizontal" action="<?=$url?>" method="post">
    <div class="col-sm-12 col-md-3">
      <h3>Company</h3>
    </div>
    <div class="col-sm-12 col-md-9">
      <div class="form-group">
        <label for="company_name">company name</label>
        <input type="text" class="form-control" id="company_name" name="client_name">
      </div>
    </div>

    <div class="col-sm-12 col-md-3">
      <h3>Adress</h3>
    </div>
    <div class="col-sm-12 col-md-9">
      <div class="form-group">
        <label for="street">street</label>
        <input type="text" class="form-control" id="street" name="street">
      </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <div class="form-group">
        <label for="street_number">street number</label>
        <input type="text" class="form-control" id="street_number" name="street_number">
      </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <div class="form-group">
        <label for="postal_code">postal code</label>
        <input type="text" class="form-control" id="postal_code" name="area_code">
      </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <div class="form-group">
        <label for="city">city</label>
        <input type="text" class="form-control" id="city" name="city">
      </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
      <div class="form-group">
        <label for="country">country</label>
        <input type="text" class="form-control" id="country" name="country">
      </div>
    </div>
    <div class="col-sm-12 col-md-3">
      <h3>Contact person</h3>
    </div>
    <div class="col-sm-12 col-md-9">
        <div class="form-group">
          <label for="firstname">first name</label>
          <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
        <div class="form-group">
          <label for="lastname">last name</label>
          <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">

        <div class="form-group">
          <label for="phone">phone number</label>
          <input type="text" class="form-control" id="phone" name="phone">
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
        <div class="form-group">
          <label for="fax">fax number</label>
          <input type="text" class="form-control" id="fax" name="fax">
        </div>
    </div>
    <div class="col-sm-12 col-md-9 col-md-offset-3">
        <div class="form-group">
          <label for="email">email</label>
          <input type="email" class="form-control" id="email" name="email">
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-2 col-md-offset-10">
        <input type="submit" class="btn btn-default" id="create-client-submit" value="Submit">
      </div>
    </div>
  </form>

  <!-- <div class="col-sm-12 col-md-3">
    <h3>Adress</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="street">street</label>
        <input type="text" class="form-control" id="street">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="street_number">street number</label>
        <input type="text" class="form-control" id="street_number">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="postal_code">postal code</label>
        <input type="text" class="form-control" id="postal_code">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="city">city</label>
        <input type="text" class="form-control" id="city">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="country">country</label>
        <input type="text" class="form-control" id="country">
      </div>
    </form>
  </div>

  <div class="col-sm-12 col-md-3">
    <h3>Contact person</h3>
  </div>
  <div class="col-sm-12 col-md-9">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="first_name">first name</label>
        <input type="text" class="form-control" id="first_name">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="last_name">last name</label>
        <input type="text" class="form-control" id="last_name">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="phone">phone number</label>
        <input type="text" class="form-control" id="phone_number">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="fax">fax number</label>
        <input type="text" class="form-control" id="fax">
      </div>
    </form>
  </div>
  <div class="col-sm-12 col-md-9 col-md-offset-3">
    <form class="form-horizontal">
      <div class="form-group">
        <label for="email">email</label>
        <input type="email" class="form-control" id="email">
      </div>
    </form>
  </div> -->

  <?php
    $this->start('more_js');
   ?>
   <?= $this->Html->script('create_client.js') ?>
  <?php
    $this->end('more_js')?>
