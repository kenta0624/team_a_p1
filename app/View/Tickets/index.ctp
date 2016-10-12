<h1>チケット一覧</h1>
<h2><?php echo __('Ticket List'); ?></h2>
<p><?php echo $user_name; ?></p>
<!-- 以下のクリアdiv1行は開発中に見づらいので入れたもの。デザイン入れる際は消してください -->
<div class="clear" style="clear: both"></div>
<div class="tickets index">
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id', 'チケットID'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id', 'イベント名'); ?></th>
			<th><?php echo $this->Paginator->sort('ticket_name', 'チケット名'); ?></th>
			<th><?php echo $this->Paginator->sort('event_date', '開催日'); ?></th>
			<th><?php echo $this->Paginator->sort('price', '単価'); ?></th>
			<th><?php echo $this->Paginator->sort('created', '登録日'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', '更新日'); ?></th>
			<th class="actions"><?php echo __('編集'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tickets as $ticket): ?>
	<tr>
		<td><?php echo h($ticket['Ticket']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['id'])); ?>
		</td>
		<td><?php echo h($ticket['Ticket']['ticket_name']); ?>&nbsp;</td>
		<td><?php echo h(substr($ticket['Ticket']['event_date'],0,10)); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['price']); ?>&nbsp;</td>
		<td><?php echo h(substr($ticket['Ticket']['created'],0,10)); ?>&nbsp;</td>
		<td><?php echo h(substr($ticket['Ticket']['modified'],0,10)); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('チケット編集'), array('action' => 'edit', $ticket['Ticket']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
<?php
echo $this->Html->link(__('新規チケット追加'), array('action' => 'add', $id), array('class' => 'button')); ?>