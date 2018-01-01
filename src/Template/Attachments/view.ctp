<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Attachment'), ['action' => 'edit', $attachment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Attachment'), ['action' => 'delete', $attachment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attachment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Attachments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Attachment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($attachment->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Thumb Url') ?></td>
            <td><?= h($attachment->thumb_url) ?></td>
        </tr>
        <tr>
            <td><?= __('Full Url') ?></td>
            <td><?= h($attachment->full_url) ?></td>
        </tr>
        <tr>
            <td><?= __('Path') ?></td>
            <td><?= h($attachment->path) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $attachment->has('user') ? $this->Html->link($attachment->user->id, ['controller' => 'Users', 'action' => 'view', $attachment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Label') ?></td>
            <td><?= h($attachment->label) ?></td>
        </tr>
        <tr>
            <td><?= __('Associated') ?></td>
            <td><?= h($attachment->associated) ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($attachment->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($attachment->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($attachment->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Number->format($attachment->description) ?></td>
        </tr>
        <tr>
            <td><?= __('Size') ?></td>
            <td><?= $this->Number->format($attachment->size) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($attachment->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($attachment->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Newsletters') ?></h3>
    </div>
    <?php if (!empty($attachment->newsletters)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Attachment Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Excerpt') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($attachment->newsletters as $newsletters): ?>
                <tr>
                    <td><?= h($newsletters->id) ?></td>
                    <td><?= h($newsletters->user_id) ?></td>
                    <td><?= h($newsletters->attachment_id) ?></td>
                    <td><?= h($newsletters->title) ?></td>
                    <td><?= h($newsletters->excerpt) ?></td>
                    <td><?= h($newsletters->description) ?></td>
                    <td><?= h($newsletters->status) ?></td>
                    <td><?= h($newsletters->deleted) ?></td>
                    <td><?= h($newsletters->created) ?></td>
                    <td><?= h($newsletters->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Newsletters', 'action' => 'view', $newsletters->], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Newsletters', 'action' => 'edit', $newsletters->], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Newsletters', 'action' => 'delete', $newsletters->], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletters->), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Newsletters</p>
    <?php endif; ?>
</div>
