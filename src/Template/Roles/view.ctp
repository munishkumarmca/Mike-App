<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
<li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
<li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($role->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= h($role->status) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($role->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($role->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($role->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($role->description)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Pages') ?></h3>
    </div>
    <?php if (!empty($role->pages)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Order') ?></th>
                <th><?= __('Unique Str') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Excerpt') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Menu Title') ?></th>
                <th><?= __('Is Menu') ?></th>
                <th><?= __('Is Home') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($role->pages as $pages): ?>
                <tr>
                    <td><?= h($pages->id) ?></td>
                    <td><?= h($pages->order) ?></td>
                    <td><?= h($pages->unique_str) ?></td>
                    <td><?= h($pages->title) ?></td>
                    <td><?= h($pages->excerpt) ?></td>
                    <td><?= h($pages->content) ?></td>
                    <td><?= h($pages->status) ?></td>
                    <td><?= h($pages->menu_title) ?></td>
                    <td><?= h($pages->is_menu) ?></td>
                    <td><?= h($pages->is_home) ?></td>
                    <td><?= h($pages->deleted) ?></td>
                    <td><?= h($pages->created) ?></td>
                    <td><?= h($pages->modified) ?></td>
                    <td><?= h($pages->user_id) ?></td>
                    <td><?= h($pages->role_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Pages', 'action' => 'view', $pages->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Pages', 'action' => 'edit', $pages->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Pages', 'action' => 'delete', $pages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pages->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Pages</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Users') ?></h3>
    </div>
    <?php if (!empty($role->users)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Login') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Display Name') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Last Logged In') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Dob') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($role->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->login) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->last_name) ?></td>
                    <td><?= h($users->display_name) ?></td>
                    <td><?= h($users->image) ?></td>
                    <td><?= h($users->last_logged_in) ?></td>
                    <td><?= h($users->role_id) ?></td>
                    <td><?= h($users->end_date) ?></td>
                    <td><?= h($users->dob) ?></td>
                    <td><?= h($users->deleted) ?></td>
                    <td><?= h($users->created) ?></td>
                    <td><?= h($users->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Users', 'action' => 'view', $users->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Users', 'action' => 'edit', $users->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Users</p>
    <?php endif; ?>
</div>
