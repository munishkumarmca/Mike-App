<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('thumb_url'); ?></th>
            <th><?= $this->Paginator->sort('full_url'); ?></th>
            <th><?= $this->Paginator->sort('path'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('label'); ?></th>
            <th><?= $this->Paginator->sort('description'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($attachments as $attachment): ?>
        <tr>
            <td><?= $this->Number->format($attachment->id) ?></td>
            <td><?= h($attachment->thumb_url) ?></td>
            <td><?= h($attachment->full_url) ?></td>
            <td><?= h($attachment->path) ?></td>
            <td>
                <?= $attachment->has('user') ? $this->Html->link($attachment->user->id, ['controller' => 'Users', 'action' => 'view', $attachment->user->id]) : '' ?>
            </td>
            <td><?= h($attachment->label) ?></td>
            <td><?= $this->Number->format($attachment->description) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $attachment->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $attachment->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
