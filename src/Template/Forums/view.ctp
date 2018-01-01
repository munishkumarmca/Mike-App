<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Forum'), ['action' => 'edit', $forum->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Forum'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?> </li>
<li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Forum'), ['action' => 'edit', $forum->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Forum'), ['action' => 'delete', $forum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]) ?> </li>
<li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Forum'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($forum->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Uniue Str') ?></td>
            <td><?= h($forum->uniue_str) ?></td>
        </tr>
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= h($forum->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= h($forum->status) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $forum->has('user') ? $this->Html->link($forum->user->id, ['controller' => 'Users', 'action' => 'view', $forum->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($forum->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Comment Status') ?></td>
            <td><?= h($forum->comment_status) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($forum->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($forum->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($forum->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Excerpt') ?></td>
            <td><?= $this->Text->autoParagraph(h($forum->excerpt)); ?></td>
        </tr>
        <tr>
            <td><?= __('Content') ?></td>
            <td><?= $this->Text->autoParagraph(h($forum->content)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($forum->comments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Forum Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($forum->comments as $comments): ?>
                <tr>
                    <td><?= h($comments->id) ?></td>
                    <td><?= h($comments->forum_id) ?></td>
                    <td><?= h($comments->user_id) ?></td>
                    <td><?= h($comments->title) ?></td>
                    <td><?= h($comments->description) ?></td>
                    <td><?= h($comments->deleted) ?></td>
                    <td><?= h($comments->created) ?></td>
                    <td><?= h($comments->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Comments', 'action' => 'view', $comments->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Comments', 'action' => 'edit', $comments->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Comments</p>
    <?php endif; ?>
</div>
