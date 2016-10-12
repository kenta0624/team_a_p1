<?php echo $this->Form->create('Event'); ?>

<?php echo $this->Html->input('id', array('hidden' => true)); ?>
<?php echo $this->Form->input('title', array('label' => false)); ?>
<?php echo $this->Form->input('detail', array('label' => false)); ?>
<?php echo $this->Form->input('image', array('label' => false)); ?>
<?php echo $this->Form->input('start_date', array('label' => false)); ?>
<?php echo $this->Form->input('end_date', array('label' => false)); ?>

<?php echo $this->Form->submit('登録'); ?>

<?php echo $this->Form->end(); ?>