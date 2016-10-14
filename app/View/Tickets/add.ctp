<div class="wrapper">
	<header>
		<h1>新規チケット追加</h1>
		<h2><?php echo __('Ticket Add'); ?></h2>
	</header>
		<h3>沖縄フェスタ</h3>
	<div class="tickets form">
		<?php echo $this->Form->create('Ticket'); ?>
	<!-- ユーザー入力情報 タイトル＆表 -->
	<table class="type03" width="1000">
	<?php
	echo $this->Form->input('id');
	echo $this->Form->input('event_id'); ?>
		<tr>
			<th>チケット名</th>
			<td>
				<!-- <input type="text" name="example1" size="30" value="沖縄フェスタ"> -->
				<?php echo $this->Form->input('ticket_name', array('label' => false)); ?>
				<span class="moji1">※20文字以内</span>
			</td>
		</tr>
		<tr>
			<th>開催日</th>
			<td>
				<!-- <input type="text" name="example1" size="30" value="１１／１"> -->
				<?php
				echo $this->Form->input('event_date', array(
					'type' => 'date',
					'dateFormat' => 'YMD',
					'monthNames' => false,
					'separator' => '/',
					'label' => false
				)); ?>
				<span class="moji1">※20文字以内</span>
			</td>
		</tr>
		<tr>
			<th>単価</th>
			<td>
				<!-- <input type="text" name="example1" size="30" value="１０，０００">　円 -->
				<?php echo $this->Form->input('price', array('label' => false)); ?>
			</td>
		</tr>
	</table>
	<!-- ボタン -->
		<!-- <a class="button" href="#"><strong>保存</strong></a> -->
		<?php echo $this->Form->end(__('保存'));
		// class="button" 追加する必要ある。
		?>
	</div>
	<?php echo $this->Html->link(__('チケット一覧に戻る'), array('action' => 'index', $event_id), array('class' => 'button3')); ?>
</div>
