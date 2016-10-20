<style type="text/css">
</style>

<div class="wrapper">

<?php  //$this->log($applications); ?>

<header>
	<h1> 申し込み一覧</h1>
	<h2>Application List</h2>
	<!-- <h2><?php //echo __('Application List'); ?></h2> -->
</header>

<h3><?php	echo $applications[0]['Ticket']['Event']['title'];  ?></h3><br>

<table class="type03" width="1000">
	<thead>
	<tr>
		   <th>申し込みID</th>
			<th>チケットID</th>
		    <th>チケット名</th>
			<th>枚数</th>
			<th>申込者名</th>
			<th>Tel</th>
			<th>Email</th>
			<th>申込日</th>
			<th>詳細</th>

			<!-- <th><?php //echo $this->Paginator->sort('id'); ?></th> -->
			<!-- <th><?php //echo $this->Paginator->sort('ticket_id'); ?></th>  -->
			<!--<th><?php //echo $this->Paginator->sort('枚数'); ?></th> -->
			<!--<th><?php //echo $this->Paginator->sort('申し込み者名'); ?></th>  -->
			<!--<th><?php //echo $this->Paginator->sort('tel'); ?></th> -->
			<!--<th><?php //echo $this->Paginator->sort('email'); ?></th> -->
			<!--<th><?php //echo $this->Paginator->sort('申し込み日'); ?></th> -->
			<!-- <th><?php //echo $this->Paginator->sort('modified'); ?></th>  -->
			<!-- <th class="actions"><?php //echo __('Actions'); ?></th> -->
	</tr>
	</thead>

	<tbody>
	<?php foreach ($applications as $application): ?>
		<?php  //var_dump($application); ?>
	<tr>
		<!-- <td><?php //echo h($application['Application']['id']); ?>&nbsp;</td>  -->
		<!--<td>
			<?php //echo $this->Html->link($application['Ticket']['id'], array('controller' => 'tickets', 'action' => 'view', $application['Ticket']['id'])); ?>
		</td> -->
		<td><?php echo h($application['Application']['id']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['ticket_id']); ?>&nbsp;</td>
		<td><?php echo h($application['Ticket']['ticket_name']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['customer_name']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['tel']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['email']); ?></td>

		<!-- <td><?php //echo h($application['Application']['created']); ?></td> -->
		<?php $date = $application['Application']['created']; ?>
		<td><?php echo date('Y-m-d',strtotime($date)); ?></td>
		<!-- <td><?php //echo h($application['Application']['modified']); ?>&nbsp;</td>  -->
		<td class="actions">
			<?php echo $this->Html->link(__('閲覧'), array('action' => 'view', $application['Application']['id'])); ?>
			<!-- <?php //echo $this->Html->link(__('View'), array('action' => 'view', $application['Application']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $application['Application']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $application['Application']['id']),
			     //array('confirm' => __('Are you sure you want to delete # %s?', $application['Application']['id']))); ?> -->
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table><br>

	<?php
	//echo $this->Paginator->counter(array(
	//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	//));
	?>

	<?php
		//echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		//echo $this->Paginator->numbers(array('separator' => ''));
		//echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>


	<table class="type03" width="1000">
		<thead>
		<tr id="header2">
			<th>チケット種類</th>
			<th>枚数</th>
			<th>金額</th>
		</tr>
		</thead>


		<tbody>
		<?php
		$priceall = 0;
		$price = 0;
		$ticket_price =0;
		$countall =0;
		$count = 0;
		$tid = 0;

		$tname ="";
		//var_dump($applications);

		foreach ($applications as $application):

		  if($application['Application']['ticket_id'] != $tid && $application != end($applications)){
			if($application !== reset($applications)){ ?>
				<tr>
					<td><?php echo $tname ?> </td>
					<td><?php echo $count.' 枚'; ?></td>
					<?php //$price = $application['Application']['quantity'] * ($application['Ticket']['price']);
					?>
					<?php $price = $count * $ticket_price; ?>
					<td> <?php echo number_format($price).' 円'; ?> </td>
					<?php $count = 0;
					$ticket_price = 0;
					$price = 0;
			}	?>
				</tr>

			<?php } ?>


			<!-- <?php // $price =$application['Application']['quantity'] * ($application['Ticket']['price']); ?> -->
			<!-- <td> <?php  //echo $price;  ?> </td>  -->
			<!-- <td><?php // echo h($application['Ticket']['price']); ?></td>  -->
			<!-- <td><?php //echo array_sum($ticket['Ticket']['quantity']); ?></td> -->
			<?php $count = $count + $application['Application']['quantity'];?>
			<?php $tname = $application['Ticket']['ticket_name']; ?>
			<?php $countall =  $countall  + $application['Application']['quantity'];  ?>

			<?php $ticket_price =$application['Ticket']['price'];?>
			<?php $priceall = $priceall +  ($application['Application']['quantity'] * ($application['Ticket']['price'])); ?>
			<?php $tid = $application['Application']['ticket_id']; ?>



			<?php if ($application == end($applications)) { ?>
				<tr>
					<td><?php echo $tname ?> </td>
					<td><?php echo $count.' 枚'; ?></td>
					<?php $price = $count * $ticket_price; ?>
				<td> <?php echo number_format($price).' 円'; ?> </td>
				</tr>
			<?php }  ?>


		<?php 	endforeach; ?>


		<tr>
			<td>申し込み枚数  合計</td>
			<td><?php echo $countall.' 枚'; ?></td>
			<td><?php echo number_format($priceall).' 円'; ?></td>

		</tr>
		</tbody>

	</table><br>


	<!-- <h3><?php //echo __('Actions'); ?></h3>  -->
	<!--<ul> -->
		<!-- <li><?php //echo $this->Html->link(__('New Application'), array('action' => 'add')); ?></li> -->

<div class="button2">
	<div class="button"><?php echo $this->Html->link(__('イベント一覧に戻る'),
		  array('controller' => 'Events', 'action' => 'index')); ?> </div>
</div>

<!-- <li><?php //echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li> -->
		<!-- <li><?php //echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li> -->
	<!-- </ul> -->

	<!-- <a class="button" href="#"><?php //echo $this->Html->link(__('イベント一覧に戻る'),
			//array('controller' => 'Events', 'action' => 'index')); ?></a>  -->
</div>

