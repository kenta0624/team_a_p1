<style type="text/css">

</style>

<div class="wrapper">
<?php //$this->log($application,'debug'); ?>


<header>
	<h1>申し込み詳細</h1>
	<h2>Application</h2><br>
</header>

	<h3><?php echo $application['Ticket']['Event']['title']; ?></h3>

	<table class="type03" width="1000">

		<tr>
			<th > <?php echo __('申し込みID'); ?></th>
			<td>
			<?php echo h($application['Application']['id']); ?>
			&nbsp;
			</td>
		</tr>

		<tr>
			<th ><?php echo __('チケットID'); ?></th>
			<td>
				<?php echo h($application['Ticket']['id']); ?>

			</td>

		<tr>
			<th><?php echo __('チケット名'); ?></th>
			<td>
				<?php echo h($application['Ticket']['ticket_name']); ?>
			</td>
		</tr>


		<tr>
			<th><?php echo __('枚数'); ?></th>
			<td>
				<?php echo h($application['Application']['quantity'].' 枚'); ?>
&nbsp;			</td>
		</tr>

		<tr>
			<th><?php echo __('名前'); ?></th>
			<td>
				<?php echo h($application['Application']['customer_name']); ?>
			</td>
			</tr>

		<tr>
			<th><?php echo __('Tel'); ?></th>
			<td>
				<?php echo h($application['Application']['tel']); ?>
			</td>
		</tr>


		<tr>
			<th><?php echo __('Email'); ?></th>
			<td>
				<?php echo h($application['Application']['email']); ?>
		&nbsp;	</td>
		</tr>


		<tr>
	  		<th><?php echo __('申込日'); ?></th>
			<td>
				<?php $date = $application['Application']['created'];?>
				<?php echo date('Y-m-d',strtotime($date)); ?>
			</td>
		</tr>

	</table><br>



	<!-- <h3><?php //echo __('Actions'); ?></h3> -->
	<!-- <ul>  -->
		<!-- <li><?php //echo $this->Html->link(__('Edit Application'), array('action' => 'edit', $application['Application']['id'])); ?> </li> -->
		<!-- <li><?php //echo $this->Form->postLink(__('Delete Application'), array('action' => 'delete', $application['Application']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $application['Application']['id']))); ?> </li>  -->
<div class="button2">
	<div class="button"><?php echo $this->Html->link(('申し込み一覧に戻る'),
		array('controller' => 'applications','action' => 'index',$application['Ticket']['event_id'] )); ?> </div>
</div>

		<!-- <li><?php //echo $this->Html->link(__('New Application'), array('action' => 'add')); ?> </li>  -->
		<!-- <li><?php //echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>  -->
		<!-- <li><?php //echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>  -->
	<!-- </ul> -->
</div>