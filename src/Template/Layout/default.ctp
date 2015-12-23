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
use Cake\Routing\Router;

$cakeDescription = 'WAPP';
$link_dashboard = Router::url('/', true);
$link_map = Router::url('/map', true);
$link_clients = Router::url(array(
    'controller' => 'clients',
    'action' => 'index'
  ));
$link_projects = Router::url(array(
    'controller' => 'projects',
    'action' => 'index'
  ));

$url = $this->request->here;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('styles.css') ?>
    <?= $this->Html->css('normalize.css') ?>

    <script type="text/javascript">var BaseUrl = '<?php echo Router::url('/', true); ?>';</script>

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
  <!-- Main nav bar here -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li <?php echo ($url == Router::url('/'))? 'class="active"' : ''?>><a href="<?php echo $link_dashboard;?>">
            <span class="glyphicon glyphicon-th-large" aria-hidden="true">
            </span>&nbsp;Dashboard<span class="sr-only">(current)</span>
          </a></li>
          <li <?php echo ($url == Router::url('/map'))? 'class="active"' : ''?>><a href="<?php echo $link_map;?>">
            <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;Map</a></li>
          <li <?php echo ($url == $link_clients)? 'class="active"' : ''?>><a href="<?php echo $link_clients;?>">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;Customers</a></li>
          <li <?php echo ($url == $link_projects)? 'class="active"' : ''?>><a href="<?php echo $link_projects;?>">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;Projects</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
    <?= $this->Flash->render() ?>
    <div class="content container">
        <?=
        $this->fetch('content');
        ?>
    </div>

  <?= $this->Html->script('jquery-2.1.4.min.js') ?>
  <?= $this->Html->script('bootstrap.min.js') ?>
  <?= $this->fetch('more_js') ?>
</body>
</html>
