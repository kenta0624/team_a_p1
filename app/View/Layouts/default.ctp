<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('team_a');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="container">
    <div id="header">
        <?php
            if(!is_null(AuthComponent::user())){
                echo $this->Html->link('ログアウト',array('controller'=>'Users','action'=>'logout'));
            }
        ?>
    </div>
    <div id="content">

        <?php echo $this->Flash->render(); ?>

        <?php echo $this->fetch('content'); ?>
    </div>
    <div id="footer">

    </div>
</div>

</body>
</html>
