<div class="wrapper">

<header>
    <h1><?php echo $eventInfo['Event']['title']; ?></h1>
    <!--<h2>Event</h2>-->
</header>

<div class="event_img">
    <img src=<?php echo "/team_a_p1/app/webroot/img/".$eventInfo['Event']['image'];?>>
</div>

<h3>チケット申し込み</h3>

<?php echo $this->Form->create('Application'); ?>

<table class="type03" width="1000">
    <tr>
        <th width="150">チケット</th>
        <td>
            <?php echo $this->Form->input('ticket_id', array('type' => 'select', 'label' => false)); ?>
        </td>
    </tr>

    <tr>
        <th>枚数</th>
        <td>
            <?php echo $this->Form->input('quantity', array('label' => false,'value' => 1,'min' => 1)); ?>
           <span class="moji2">枚</span>
        </td>
    </tr>

    <tr>
        <th>料金</th>
        <td>{JSで算出}円</td>
    </tr>


    <tr>
        <th>詳細</th>
        <td><?php echo $eventInfo['Event']['detail']; ?></td>
    </tr>

</table>


<table class="type03" width="1000">
    <tr>
        <th width="150">氏名</th>
        <td><?php echo $this->Form->input('customer_name', array('label' => false)); ?></td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td><?php echo $this->Form->input('tel', array('label' => false)); ?></td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td><?php echo $this->Form->input('email', array('label' => false)); ?></td>
    </tr>
</table>


<?php echo $this->Form->end('申し込む'); ?>


</div>





