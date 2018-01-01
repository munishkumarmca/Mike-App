<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Attachment $attachment
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($attachment); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Attachment']) ?></legend>
    <?php
    echo $this->Form->control('thumb_url');
    echo $this->Form->control('full_url');
    echo $this->Form->control('path');
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('label');
    echo $this->Form->control('description');
    echo $this->Form->control('associated');
    echo $this->Form->control('type');
    echo $this->Form->control('deleted');
    echo $this->Form->control('size');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
