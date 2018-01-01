<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Forum $forum
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $forum->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $forum->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $forum->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Forums'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($forum); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Forum']) ?></legend>
    <?php
    echo $this->Form->control('uniue_str');
    echo $this->Form->control('title');
    echo $this->Form->control('excerpt');
    echo $this->Form->control('status');
    echo $this->Form->control('content');
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('deleted');
    echo $this->Form->control('comment_status');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
