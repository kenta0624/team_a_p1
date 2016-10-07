<div class="header2">
<h1><?php echo $eventInfo['Event']['title']; ?></h1>
<h2>Event</h2>
</div>

<div class="event_img">
    <img src="/team_a_p1/app/webroot/img/okinawa.jpg">
</div>

<h3>チケット申し込み</h3>

<table class="type03">
    <tr>
        <th>イベント名</th>
        <td>
                <?php echo $this->Form->input('ticket_id'); ?>
            </td>
    </tr>

    <tr>
        <th>料金</th>
        <td>円</td>
    </tr>

    <tr>
        <th>枚数</th>
        <td><?php echo $this->Form->input('quantity'); ?> 枚 </td>
    </tr>

    <tr>
        <th>詳細</th>
        <td><?php echo $eventInfo['Event']['detail']; ?></td>
    </tr>
</table>


<?php echo $this->Form->create('Application'); ?>


<table class="type03">
    <tr>
        <th >氏名</th>
        <td><?php echo $this->Form->input('customer_name'); ?></td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td><?php echo $this->Form->input('tel'); ?></td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td><?php echo $this->Form->input('email'); ?></td>
    </tr>
</table>






<?php echo $this->Form->end(__('Submit')); ?>








