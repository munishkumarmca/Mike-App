<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
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
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($user->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Login') ?></td>
            <td><?= h($user->login) ?></td>
        </tr>
        <tr>
            <td><?= __('Email') ?></td>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <td><?= __('Password') ?></td>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <td><?= __('First Name') ?></td>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Last Name') ?></td>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Display Name') ?></td>
            <td><?= h($user->display_name) ?></td>
        </tr>
        <tr>
            <td><?= __('Image') ?></td>
            <td><?= h($user->image) ?></td>
        </tr>
        <tr>
            <td><?= __('Role') ?></td>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($user->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Last Logged In') ?></td>
            <td><?= h($user->last_logged_in) ?></td>
        </tr>
        <tr>
            <td><?= __('End Date') ?></td>
            <td><?= h($user->end_date) ?></td>
        </tr>
        <tr>
            <td><?= __('Dob') ?></td>
            <td><?= h($user->dob) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Attachments') ?></h3>
    </div>
    <?php if (!empty($user->attachments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Thumb Url') ?></th>
                <th><?= __('Full Url') ?></th>
                <th><?= __('Path') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Label') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Associated') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Size') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->attachments as $attachments): ?>
                <tr>
                    <td><?= h($attachments->id) ?></td>
                    <td><?= h($attachments->thumb_url) ?></td>
                    <td><?= h($attachments->full_url) ?></td>
                    <td><?= h($attachments->path) ?></td>
                    <td><?= h($attachments->user_id) ?></td>
                    <td><?= h($attachments->label) ?></td>
                    <td><?= h($attachments->description) ?></td>
                    <td><?= h($attachments->associated) ?></td>
                    <td><?= h($attachments->type) ?></td>
                    <td><?= h($attachments->deleted) ?></td>
                    <td><?= h($attachments->created) ?></td>
                    <td><?= h($attachments->modified) ?></td>
                    <td><?= h($attachments->size) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Attachments', 'action' => 'view', $attachments->], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Attachments', 'action' => 'edit', $attachments->], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Attachments', 'action' => 'delete', $attachments->], ['confirm' => __('Are you sure you want to delete # {0}?', $attachments->), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Attachments</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Comments') ?></h3>
    </div>
    <?php if (!empty($user->comments)): ?>
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
            <?php foreach ($user->comments as $comments): ?>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Forums') ?></h3>
    </div>
    <?php if (!empty($user->forums)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Uniue Str') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Excerpt') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Comment Status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->forums as $forums): ?>
                <tr>
                    <td><?= h($forums->id) ?></td>
                    <td><?= h($forums->uniue_str) ?></td>
                    <td><?= h($forums->title) ?></td>
                    <td><?= h($forums->excerpt) ?></td>
                    <td><?= h($forums->status) ?></td>
                    <td><?= h($forums->content) ?></td>
                    <td><?= h($forums->user_id) ?></td>
                    <td><?= h($forums->deleted) ?></td>
                    <td><?= h($forums->created) ?></td>
                    <td><?= h($forums->modified) ?></td>
                    <td><?= h($forums->comment_status) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Forums', 'action' => 'view', $forums->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Forums', 'action' => 'edit', $forums->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Forums', 'action' => 'delete', $forums->id], ['confirm' => __('Are you sure you want to delete # {0}?', $forums->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Forums</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Newsletters') ?></h3>
    </div>
    <?php if (!empty($user->newsletters)): ?>
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
            <?php foreach ($user->newsletters as $newsletters): ?>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Pages') ?></h3>
    </div>
    <?php if (!empty($user->pages)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Order') ?></th>
                <th><?= __('Unique Str') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Excerpt') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Menu Title') ?></th>
                <th><?= __('Is Menu') ?></th>
                <th><?= __('Is Home') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->pages as $pages): ?>
                <tr>
                    <td><?= h($pages->id) ?></td>
                    <td><?= h($pages->order) ?></td>
                    <td><?= h($pages->unique_str) ?></td>
                    <td><?= h($pages->title) ?></td>
                    <td><?= h($pages->excerpt) ?></td>
                    <td><?= h($pages->content) ?></td>
                    <td><?= h($pages->status) ?></td>
                    <td><?= h($pages->menu_title) ?></td>
                    <td><?= h($pages->is_menu) ?></td>
                    <td><?= h($pages->is_home) ?></td>
                    <td><?= h($pages->deleted) ?></td>
                    <td><?= h($pages->created) ?></td>
                    <td><?= h($pages->modified) ?></td>
                    <td><?= h($pages->user_id) ?></td>
                    <td><?= h($pages->role_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Pages', 'action' => 'view', $pages->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Pages', 'action' => 'edit', $pages->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Pages', 'action' => 'delete', $pages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pages->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Pages</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Payments') ?></h3>
    </div>
    <?php if (!empty($user->payments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Transaction Id') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Date') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($user->payments as $payments): ?>
                <tr>
                    <td><?= h($payments->id) ?></td>
                    <td><?= h($payments->user_id) ?></td>
                    <td><?= h($payments->transaction_id) ?></td>
                    <td><?= h($payments->amount) ?></td>
                    <td><?= h($payments->status) ?></td>
                    <td><?= h($payments->date) ?></td>
                    <td><?= h($payments->type) ?></td>
                    <td><?= h($payments->created) ?></td>
                    <td><?= h($payments->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Payments', 'action' => 'view', $payments->], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Payments', 'action' => 'edit', $payments->], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Payments', 'action' => 'delete', $payments->], ['confirm' => __('Are you sure you want to delete # {0}?', $payments->), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Payments</p>
    <?php endif; ?>
</div>
