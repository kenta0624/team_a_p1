
<div class="wrapper">


    <div class="form-wrapper">
        <h3>Login</h3>
        <?php echo $this->Form->create('User'); ?>
        <div class="form-item">
<!--            <label for="name"></label>
            <input type="text" name="name" required="required" placeholder="Id"></input>-->
            <?php echo $this->Form->input('name',array('label' => false,'required' => 'required','placeholder' => 'Id')); ?>
        </div>
        <div class="form-item">
<!--            <label for="password"></label>
            <input type="password" name="password" required="required" placeholder="Password"></input>-->
            <?php echo $this->Form->password('password',array('required' => 'required','placeholder' => 'Password')); ?>
        </div>
        <div class="button-panel">
            <!--<input type="submit" class="button" title="Login" value="Login"></input>-->
            <?php echo $this->Form->submit('Login',array('class' => 'button'));?>
        </div>
        <?php echo $this->Form->end(); ?>

        <div class="">
            <?php echo $this->Html->link('新規登録',array('action' => 'add'));?> ←後で修正
        </div>

        <div class="form-footer">

        </div>
    </div>

</div>
<!--
<?php /*echo $this->Form->create('User'); */?>
<?php /*echo $this->Form->input('name'); */?>
<?php /*echo $this->Form->input('password'); */?>
--><?php /*echo $this->Form->end(__('Submit')); */?>
