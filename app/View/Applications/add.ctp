<table>
    <tr>
        <th>イベント名</th>
        <td><?php echo $eventInfo['Event']['title']; ?></td>
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