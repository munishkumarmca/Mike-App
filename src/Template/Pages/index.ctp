<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Page'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('order'); ?></th>
            <th><?= $this->Paginator->sort('unique_str'); ?></th>
            <th><?= $this->Paginator->sort('title'); ?></th>
            <th><?= $this->Paginator->sort('excerpt'); ?></th>
            <th><?= $this->Paginator->sort('content'); ?></th>
            <th><?= $this->Paginator->sort('status'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page): ?>
        <tr>
            <td><?= $this->Number->format($page->id) ?></td>
            <td><?= $this->Number->format($page->order) ?></td>
            <td><?= $this->Number->format($page->unique_str) ?></td>
            <td><?= $this->Number->format($page->title) ?></td>
            <td><?= $this->Number->format($page->excerpt) ?></td>
            <td><?= $this->Number->format($page->content) ?></td>
            <td><?= h($page->status) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $page->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $page->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $page->id], ['confirm' => __('Are you sure you want to delete # {0}?', $page->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
