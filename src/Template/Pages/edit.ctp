<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $page->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $page->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($page); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Page']) ?></legend>
    <?php
    echo $this->Form->control('order');
    echo $this->Form->control('unique_str');
    echo $this->Form->control('title');
    echo $this->Form->control('excerpt');
    echo $this->Form->control('content');
    echo $this->Form->control('status');
    echo $this->Form->control('menu_title');
    echo $this->Form->control('is_menu');
    echo $this->Form->control('is_home');
    echo $this->Form->control('deleted');
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('role_id', ['options' => $roles]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
