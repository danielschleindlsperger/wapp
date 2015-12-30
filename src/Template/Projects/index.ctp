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

$url = $this->request->here;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;
?>
<?php $this->extend('/Layout/default');
$this->assign('title', 'Projects');
?>
<h1>Projects</h1>
<div class="row">
  <div class="create-button">
    <a class="btn btn-default" href="<?=Router::url(array(
        'controller' => 'projects',
        'action' => 'create',
      )); ?>">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      Add Project
    </a>
  </div>
</div>
<?= $this->Flash->render() ?>
<div class="list-group">
  <?php foreach ($projects as $project) {
    echo '<a href="'.$url.'/'.urlencode($project->id).'"'.' class="list-group-item row">'.$project->project_name.'</a>';
}
  ?>
</div>
