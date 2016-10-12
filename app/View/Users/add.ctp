<div class="wrapper">
    <div class="form-wrapper">
        <h3>新規登録</h3>
        <?php echo $this->Form->create('User'); ?>
        <div class="form-item">
            <?php echo $this->Form->input('name',array('label' => false,'required' => 'required','placeholder' => 'Id')); ?>
        </div>
        <div class="form-item">
            <?php echo $this->Form->password('password',array('required' => 'required','placeholder' => 'Password')); ?>
        </div>
        <div class="button-panel">
            <?php echo $this->Form->submit('登録',array('class' => 'button'));?>
        </div>
        <?php echo $this->Form->end(); ?>

        <?php echo $this->Html->link('Login',array('action' => 'login')); ?>
    </div>
</div>
<!--
<?php /*echo $this->Form->create('User'); */?>
<?php /*echo $this->Form->input('name'); */?>
<?php /*echo $this->Form->input('password'); */?>
<?php /*echo $this->Form->submit('登録'); */?>
--><?php /*echo $this->Form->end(); */?>
