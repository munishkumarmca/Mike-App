<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Forum'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('uniue_str'); ?></th>
            <th><?= $this->Paginator->sort('title'); ?></th>
            <th><?= $this->Paginator->sort('status'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('deleted'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($forums as $forum): ?>
        <tr>
            <td><?= $this->Number->format($forum->id) ?></td>
            <td><?= h($forum->uniue_str) ?></td>
            <td><?= h($forum->title) ?></td>
            <td><?= h($forum->status) ?></td>
            <td>
                <?= $forum->has('user') ? $this->Html->link($forum->user->id, ['controller' => 'Users', 'action' => 'view', $forum->user->id]) : '' ?>
            </td>
            <td><?= h($forum->deleted) ?></td>
            <td><?= h($forum->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $forum->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $forum->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
