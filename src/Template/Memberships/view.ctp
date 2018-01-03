<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?> </li>
<li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Membership'), ['action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?> </li>
<li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Membership'), ['action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($membership->name) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Name') ?></td>
            <td><?= h($membership->name) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= h($membership->status) ?></td>
        </tr>
        <tr>
            <td><?= __('Validity Type') ?></td>
            <td><?= h($membership->validity_type) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($membership->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($membership->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Price') ?></td>
            <td><?= $this->Number->format($membership->price) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($membership->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($membership->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Description') ?></td>
            <td><?= $this->Text->autoParagraph(h($membership->description)); ?></td>
        </tr>
    </table>
</div>

