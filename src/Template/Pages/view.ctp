<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Page'), ['action' => 'edit', $page->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Page'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?> </li>
<li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Page'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Page'), ['action' => 'edit', $page->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Page'), ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id)]) ?> </li>
<li><?= $this->Html->link(__('List Pages'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Page'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($page->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= h($page->status) ?></td>
        </tr>
        <tr>
            <td><?= __('Is Menu') ?></td>
            <td><?= h($page->is_menu) ?></td>
        </tr>
        <tr>
            <td><?= __('Is Home') ?></td>
            <td><?= h($page->is_home) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $page->has('user') ? $this->Html->link($page->user->id, ['controller' => 'Users', 'action' => 'view', $page->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= $page->has('role') ? $this->Html->link($page->role->name, ['controller' => 'Roles', 'action' => 'view', $page->role->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($page->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Order') ?></td>
            <td><?= $this->Number->format($page->order) ?></td>
        </tr>
        <tr>
            <td><?= __('Unique Str') ?></td>
            <td><?= $this->Number->format($page->unique_str) ?></td>
        </tr>
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= $this->Number->format($page->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Excerpt') ?></td>
            <td><?= $this->Number->format($page->excerpt) ?></td>
        </tr>
        <tr>
            <td><?= __('Content') ?></td>
            <td><?= $this->Number->format($page->content) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= $this->Number->format($page->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= $this->Number->format($page->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= $this->Number->format($page->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Menu Title') ?></td>
            <td><?= $this->Text->autoParagraph(h($page->menu_title)); ?></td>
        </tr>
    </table>
</div>

