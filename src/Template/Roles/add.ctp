<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($role); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Role']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('description');
    echo $this->Form->control('status');
    echo $this->Form->control('deleted');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
