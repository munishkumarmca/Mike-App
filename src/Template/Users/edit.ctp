<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Attachments'), ['controller' => 'Attachments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Attachment'), ['controller' => 'Attachments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Comment'), ['controller' => 'Comments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Forums'), ['controller' => 'Forums', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Forum'), ['controller' => 'Forums', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Newsletters'), ['controller' => 'Newsletters', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Newsletter'), ['controller' => 'Newsletters', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Pages'), ['controller' => 'Pages', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Page'), ['controller' => 'Pages', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Payments'), ['controller' => 'Payments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Payment'), ['controller' => 'Payments', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['User']) ?></legend>
    <?php
    echo $this->Form->control('login');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('display_name');
    echo $this->Form->control('image');
    echo $this->Form->control('last_logged_in');
    echo $this->Form->control('role_id', ['options' => $roles]);
    echo $this->Form->control('end_date');
    echo $this->Form->control('dob');
    echo $this->Form->control('deleted');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
