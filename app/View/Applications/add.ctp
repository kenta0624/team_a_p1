<div class="header2">
<h1><?php echo $eventInfo['Event']['title']; ?></h1>
<h2>Event</h2>
</div>

<div class="event_img">
    <img src="/team_a_p1/app/webroot/img2/okinawa.jpg">
</div>

<h3>チケット申し込み</h3>

<table class="type03">
    <tr>
        <th>イベント名</th>
        <td><select name="ticket">
                <option value="1"> 11/1沖縄フェス飲み放題付き　12,000円</option>
                <option value="2"> 11/1沖縄フェス飲み放題食べ放題付き18,000円</option>
                <option value="3"> 11/1沖縄フェス入場料のみ　5,000円</option>
            </select></td>
    </tr>

    <tr>
        <th>料金</th>
        <td>円</td>
    </tr>

    <tr>
        <th>枚数</th>
        <td><input type="number" min="1" max="10" value="1"> 枚 </td>
    </tr>

    <tr>
        <th>詳細</th>
        <td><?php echo $eventInfo['Event']['detail']; ?></td>
    </tr>
</table>

<?php echo $this->Form->create('Application'); ?>
<?php echo $this->Form->input('ticket_id'); ?>
<?php echo $this->Form->input('quantity'); ?>
<?php echo $this->Form->input('customer_name'); ?>
<?php echo $this->Form->input('tel'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->end(__('Submit')); ?>








