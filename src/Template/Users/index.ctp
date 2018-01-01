<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('login'); ?></th>
            <th><?= $this->Paginator->sort('email'); ?></th>
            <th><?= $this->Paginator->sort('password'); ?></th>
            <th><?= $this->Paginator->sort('first_name'); ?></th>
            <th><?= $this->Paginator->sort('last_name'); ?></th>
            <th><?= $this->Paginator->sort('display_name'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->login) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->password) ?></td>
            <td><?= h($user->first_name) ?></td>
            <td><?= h($user->last_name) ?></td>
            <td><?= h($user->display_name) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $user->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
