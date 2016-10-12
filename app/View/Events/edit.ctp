<?php echo $this->Form->create('Event'); ?>

<?php echo $this->Form->input('id',array('type' => 'visible')); ?>　　//idを確認するために一時的に表示
<?php echo $this->Form->input('title'); ?>
<?php echo $this->Form->input('detail'); ?>
<?php echo $this->Form->input('image',
    array(
        'type' => 'file',
        'label' => false,
    )); ?>
<?php echo $this->Form->input(
    'start_date',
    array(
        'label' => false, 'type' => 'datetime',
        'dateFormat' => 'YMD',
        'monthNames' => false,
        'timeFormat' => '24',
        'separator' => '/'
    )); ?>
<?php echo $this->Form->input(
    'end_date',
    array(
        'label' => false, 'type' => 'datetime',
        'dateFormat' => 'YMD',
        'monthNames' => false,
        'timeFormat' => '24',
        'separator' => '/'
    )); ?>

<?php echo $this->Form->submit('登録'); ?>

<?php echo $this->Form->end(); ?>

<?php echo $this->Html->link('キャンセル',array('action' => 'index')); ?>

