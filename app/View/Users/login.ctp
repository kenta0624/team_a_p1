
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('name');?>
<?php echo $this->Form->input('password');?>
<?php echo $this->Form->end(__('Submit'));?>

<?php
/*
?>
<div class="wrapper">
    <!-- ヘッダー -->
    <header>

    </header>

    <div class="form-wrapper">
        <h3>Login</h3>
        <form>
            <div class="form-item">
                <label for="name"></label>
                <input type="text" name="name" required="required" placeholder="Id"></input>
                <?php //echo $this->Form->input('name');?>
            </div>
            <div class="form-item">
                <label for="password"></label>
                <input type="password" name="password" required="required" placeholder="Password"></input>
                <?php //echo $this->Form->input('password');?>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="Login" value="Login"></input>
                <?php //echo $this->Form->end(__('Submit'));?>
            </div>
        </form>
        <div class="form-footer">

        </div>
    </div>

</div>
