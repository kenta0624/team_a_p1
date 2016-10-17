<style type="text/css">
	thead {
		background-color: #c2c2c2;
		}
	#header2{
		background-color: #c2c2c2;
	}
	#table1 {

	}
	.button {
		display: inline-block;
		width: 200px;
		height: 54px;
		text-align: center;
		text-decoration: none;
		line-height: 54px;
		outline: none;
		background-color: #333;
		color: #fff;
	}
	.button::before,
	.button::after {
		position: absolute;
		z-index: -1;
		display: block;
		content: '';
	}
	.button,
	.button::before,
	.button::after {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		-webkit-transition: all .3s;
		transition: all .3s;
	}
	.button:hover {
		background-color: #59b1eb;
	}


</style>


<div id="header">
<h1><?php echo '申し込み一覧'; ?></h1><br>
</div>

<div class="applications index">
	<!-- <h2><?php //echo __('Applications'); ?></h2>  -->
	<table id="table1"  border="1" width="1000">
	<thead>
	<tr>
		   <th>申し込みID</th>
			<th>チケットID</th>
		    <th>チケット名</th>
			<th>枚数</th>
			<th>申込者名</th>
			<th>tel</th>
			<th>email</th>
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
		<td><?php echo h($application['Application']['email']); ?>&nbsp;</td>
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
	</table>
	<p>
	<?php
	//echo $this->Paginator->counter(array(
	//	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	//));
	?>	</p>
	<div class="paging">
	<?php
		//echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		//echo $this->Paginator->numbers(array('separator' => ''));
		//echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>

	<table id="table2" border="1" width="1000">

		<tr id="header2">
			<th>チケット</th>
			<th>枚数</th>
			<th>金額</th>
		</tr>


		<?php
		$priceall = 0;
		$price = 0;
		$ticket_price =0;
		$countall =0;
		$count = 0;
		$tid = 0;

		$tname ="";
		//var_dump($applications);
		//foreach ($application as $ticket):
		foreach ($applications as $application):
          //var_dump($application['Application']['ticket_id']);
		  if($application['Application']['ticket_id'] != $tid && $application != end($applications)){
			if($application !== reset($applications)){
			  //var_dump($application['Application']['ticket_id']); ?>
				<tr>
					<td><?php echo $tname ?> </td>
					<td><?php echo $count; ?></td>
					<?php //$price = $application['Application']['quantity'] * ($application['Ticket']['price']);
					?>
					<?php $price = $count * $ticket_price; ?>
					<td> <?php echo $price; ?> </td>
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
			<?php $id = $application['Application']['ticket_id']; ?>



		<?php if ($application == end($applications)) { ?>
		<tr>
			<td><?php echo $tname ?> </td>
			<td><?php echo $count; ?></td>
			<?php $price = $count * $ticket_price; ?>
			<td> <?php echo $price; ?> </td>
		</tr>
		<?php }  ?>


		<?php 	endforeach; ?>


		<tr>
			<td>申し込み枚数  合計</td>
			<td><?php echo $countall; ?></td>
			<td><?php echo $priceall; ?></td>

		</tr>

	</table>

</div>


<div class="actions">
	<!-- <h3><?php //echo __('Actions'); ?></h3>  -->
	<!--<ul> -->
		<!-- <li><?php //echo $this->Html->link(__('New Application'), array('action' => 'add')); ?></li> -->
		<li><?php echo $this->Html->link(__('イベント一覧に戻る'), array('controller' => 'Events', 'action' => 'index')); ?> </li>
		<!-- <li><?php //echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li> -->
		<!-- <li><?php //echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li> -->
	<!-- </ul> -->

	<!-- <a class="button" href="#"><?php //echo $this->Html->link(__('イベント一覧に戻る'),
			//array('controller' => 'Events', 'action' => 'index')); ?></a>  -->
</div>
