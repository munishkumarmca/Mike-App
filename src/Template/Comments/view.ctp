<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($comment->title) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Forum') ?></td>
            <td><?= $comment->has('forum') ? $this->Html->link($comment->forum->title, ['controller' => 'Forums', 'action' => 'view', $comment->forum->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $comment->has('user') ? $this->Html->link($comment->user->id, ['controller' => 'Users', 'action' => 'view', $comment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Title') ?></td>
            <td><?= h($comment->title) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($comment->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($comment->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($comment->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($comment->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($comment->description)); ?></td>
        </tr>
    </table>
</div>

