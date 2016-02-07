<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $ingredient->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $ingredient->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Ingredients'), ['action' => 'index']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
<?= $this->Form->create($ingredient); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Ingredient']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('unit');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>