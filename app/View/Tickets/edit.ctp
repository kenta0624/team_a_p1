<h1>チケット編集</h1>
<h2><?php echo __('Ticket Edit'); ?></h2>
<!-- 以下のクリアdiv1行は開発中に見づらいので入れたもの。デザイン入れる際は消してください -->
<div class="clear" style="clear: both"></div>
<div class="tickets form">
<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('id');
		echo 'イベント名：'.$data['Event']['title'];
		echo $this->Form->input('ticket_name');
		echo $this->Form->input('event_date', array(
		'type' => 'date',
		'dateFormat' => 'YMD',
		'monthNames' => false,
		'separator' => '/',
	));
		echo $this->Form->input('price');
		echo "<input type='hidden' name='event_id' value='".$data['Event']['id']."'>";
	?>
	</fieldset>
<?php echo $this->Form->end(__('編集')); ?>
</div>
<?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $data['Ticket']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $data['Ticket']['id']), 'class' => 'button')); ?>
<?php echo $this->Html->link(__('チケット一覧に戻る'), array('action' => 'index', $data['Event']['id']), array('class' => 'button')); ?>
