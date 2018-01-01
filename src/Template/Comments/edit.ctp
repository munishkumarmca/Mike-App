<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $comment->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $comment->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($comment); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Comment']) ?></legend>
    <?php
    echo $this->Form->control('forum_id', ['options' => $forums]);
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('title');
    echo $this->Form->control('description');
    echo $this->Form->control('deleted');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
