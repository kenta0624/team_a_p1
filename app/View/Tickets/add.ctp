<h1>新規チケット追加</h1>
<h2><?php echo __('Ticket Add'); ?></h2>
<p><?php echo $user_name; ?></p>
<!-- 以下のクリアdiv1行は開発中に見づらいので入れたもの。デザイン入れる際は消してください -->
<div class="clear" style="clear: both"></div>
<div class="tickets form">
<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
	<?php
		echo $this->Form->input('event_id');
		echo $this->Form->input('ticket_name');
		echo $this->Form->input('event_date', array(
			'type' => 'date',
			'dateFormat' => 'YMD',
			'monthNames' => false,
			'separator' => '/',
		));
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('保存')); ?>
</div>
	<?php echo $this->Html->link(__('チケット一覧に戻る'), array('action' => 'index')); ?>