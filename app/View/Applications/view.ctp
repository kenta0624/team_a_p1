<div class="applications view">

<h1><?php echo '申し込み詳細'; ?></h1>
<h2><?php echo __('Application'); ?></h2><br>
<p></p><br>
<p></p><br>

	<table border="1">
		<tr>
		<td width="200" bgcolor="#c2c2c2"> <?php echo __('申し込みid'); ?></td>
		<td width="800">
			<?php echo h($application['Application']['id']); ?>
			&nbsp;
		</td>
		</tr>

		<tr>
		<td width="200" bgcolor="#c2c2c2"><?php echo __('チケットid'); ?></td>
		<td width="800">
			<?php echo h($application['Ticket']['id']); ?>

		</td>

		<tr>
			<td width="200" bgcolor="#c2c2c2"><?php echo __('チケット名'); ?></td>
			<td width="800">
				<?php echo h($application['Ticket']['ticket_name']); ?>
				&nbsp;
			</td>



		<tr>
		<td width="200" bgcolor="#c2c2c2"><?php echo __('枚数'); ?></td>
		<td width="800">
			<?php echo h($application['Application']['quantity']); ?>
			&nbsp;
		</td>
		</tr>

		<tr">
		<td width="200" bgcolor="#c2c2c2"><?php echo __('名前'); ?></td>
		<td width="800">
			<?php echo h($application['Application']['customer_name']); ?>
		</td>
		</tr>

		<tr>
		<td width="200" bgcolor="#c2c2c2"><?php echo __('Tel'); ?></td>
		<td width="800">
			<?php echo h($application['Application']['tel']); ?>
		</td>
		</tr>


		<tr>
		<td width="200" bgcolor="#c2c2c2"><?php echo __('Email'); ?></td>
		<td width="800">
			<?php echo h($application['Application']['email']); ?>
			&nbsp;
		</td>

		<tr>
		<td width="200" bgcolor="#c2c2c2"><?php echo __('申込日'); ?></td>
		<td width="800">
			<?php $date = $application['Application']['created'];?>
			<?php echo date('Y-m-d',strtotime($date)); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
<div class="actions">
	<!-- <h3><?php //echo __('Actions'); ?></h3> -->
	<ul>
		<!-- <li><?php //echo $this->Html->link(__('Edit Application'), array('action' => 'edit', $application['Application']['id'])); ?> </li> -->
		<!-- <li><?php //echo $this->Form->postLink(__('Delete Application'), array('action' => 'delete', $application['Application']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $application['Application']['id']))); ?> </li>  -->
		<li><?php echo $this->Html->link(__('申し込み一覧に戻る'), array('controller' => 'applications','action' => 'index')); ?> </li>
		<!-- <li><?php //echo $this->Html->link(__('New Application'), array('action' => 'add')); ?> </li>  -->
		<!-- <li><?php //echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>  -->
		<!-- <li><?php //echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>  -->
	</ul>
</div>
