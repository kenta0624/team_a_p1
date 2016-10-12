<?php echo $this->Form->create('Event'); ?>

<?php echo $this->Form->input('id',array('type' => 'visible')); ?>　　//idを確認するために一時的に表示
<?php echo $this->Form->input('title'); ?>
<?php echo $this->Form->input('detail'); ?>
<?php echo $this->Form->input('image'); ?>
<?php echo $this->Form->input('start_date'); ?>
<?php echo $this->Form->input('end_date'); ?>

<?php echo $this->Form->submit('登録'); ?>

<?php echo $this->Form->end(); ?>