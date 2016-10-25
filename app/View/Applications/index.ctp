<div class="wrapper">

<?php  $this->log($applications,'debug'); ?>
<?php //echo phpversion(); ?>

<header>
	<h1> 申し込み 一覧</h1>
	<h2>Application List</h2>
	<!-- <h2><?php //echo __('Application List'); ?></h2> -->
</header>

<!-- 検索 -->
<!--  <div align="right">
<form method="get" action="index.ctp" class="search2">
	<input type="text" id="usersearch" name="usersearch" />
	<input type="submit" name="submit" value="名前検索" /><br />
</form>
</div> -->

<div align="right">
	<?php echo $this->Form->create('Search',array('url'=>'index','id' => 'Search')); ?>
	<dl class="search2">
		<dt class="a1"><?php echo $this->Form->input('customer_name', array('label' => false)); ?></dt>
		<dd>
			<button>
				<?php
				echo $this->Html->link(
					'Search',
					'javascript:void(0)',
					array('onclick' => 'FormSubmit(\'Serach\')')
				);
				?>
			</button>
		</dd>
	</dl>
	<?php echo $this->Form->end();  ?>
</div>


<div>
	<h3><?php	echo $applications[0]['Ticket']['Event']['title'];  ?></h3><br>
</div>


<table class="type03" width="1000">
	<thead>
	<tr>
		   <th>申込ID</th>
			<th>チケット</th>
		    <th>枚数</th>
			<th>金額</th>
			<th>申込者名</th>
			<th>電話番号</th>
			<th>メールアドレス</th>
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
    <?php foreach($applications as $key => $value){
    	$sort[$key] = $value['Application']['id'];
	}
	array_multisort($sort,SORT_ASC,$applications);
	//asort($applications); ?>
	<?php foreach ($applications as $application): ?>

	<tr>

		<td><?php echo h($application['Application']['id']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['ticket_id'].': '.$application['Ticket']['ticket_name']); ?></td>

		<td><?php echo h($application['Application']['quantity']); ?>&nbsp;</td>
		<td><?php echo number_format($application['Application']['quantity'] * $application['Ticket']['price']).'円'; ?>&nbsp;</td>
		<td><?php echo h($application['Application']['customer_name']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['tel']); ?>&nbsp;</td>
		<td><?php echo h($application['Application']['email']); ?></td>

		<!-- <td><?php //echo h($application['Application']['created']); ?></td> -->
		<?php $date = $application['Application']['created']; ?>
		<td><?php echo date('Y-m-d',strtotime($date)); ?></td>
		<!-- <td><?php //echo h($application['Application']['modified']); ?>&nbsp;</td>  -->
		<td class="actions">
			<div class="button3">
			<div class="button4">
				<?php echo $this->Html->link(__('閲覧'), array('action' => 'view', $application['Application']['id'])); ?>
			</div>
			</div>
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


	<table class="type03" width="1000">
		<thead>
		<tr>
			<th>チケット種類</th>
			<th>枚数</th>
			<th>金額</th>
		</tr>
		</thead>


		<tbody>
		<?php

		//$this->log($applications,'debug');
		foreach($applications as $key => $value){
			$sort[$key] = $value['Ticket']['id'];
		}
		array_multisort($sort,SORT_ASC,$applications);
		//$this->log($application,'debug');

		$priceall = 0;
		$price = 0;
		$ticket_price =0;
		$countall =0;
		$count = 0;
		$tid = 0;
		$i =0;
		$tname ="";

		foreach ($applications as $application):
		$i= $i +1;

		if($i != 1) {
			   //if($application['Application']['ticket_id'] != $tid && $application == end($applications)) {
			if($application['Application']['ticket_id'] != $tid) { ?>
				  <tr>
				   <td><?php echo $tid.': '.$tname ?> </td>
				   <td><?php echo $count . ' 枚'; ?></td>
				   <?php $price = $count * $ticket_price; ?>
				   <td> <?php echo number_format($price) . ' 円'; ?> </td>
				   </tr>
				   <?php $count = 0;
				   $ticket_price = 0;
				   $price = 0;
				}

		} ?>

		<?php $count = $count + $application['Application']['quantity'];?>
		<?php $tname = $application['Ticket']['ticket_name']; ?>
		<?php $countall =  $countall  + $application['Application']['quantity'];  ?>

		<?php $ticket_price =$application['Ticket']['price'];?>
		<?php $priceall = $priceall +  ($application['Application']['quantity'] * ($application['Ticket']['price'])); ?>
		<?php $tid = $application['Application']['ticket_id']; ?>

		<?php if ($application == end($applications)) { ?>
				<tr>
    				<td><?php echo $tid.': '.$tname ?> </td>
					<td><?php echo $count.' 枚'; ?></td>
					<?php $price = $count * $ticket_price; ?>
					<td> <?php echo number_format($price).' 円'; ?> </td>
					</tr>
			<?php
				} ?>

		<?php 	endforeach; ?>

		<tr class="total">
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
<?php
//echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
//echo $this->Paginator->numbers(array('separator' => ''));
//echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
