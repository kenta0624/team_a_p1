<div class="events index">

    <div class="header2">
        <h1>イベント一覧</h1>
        <h2>Event List</h2>
    </div>


    <table class="type03" style="width:800px;">
        <thead>
        <tr>
            <th><?php echo $this->Paginator->sort('イベントID'); ?></th>
            <th><?php echo $this->Paginator->sort('イベント名'); ?></th>
            <th><?php echo $this->Paginator->sort('詳細'); ?></th>
            <th><?php echo 'イベント'; ?></th>
            <th><?php echo 'チケット'; ?></th>
            <th><?php echo '申し込み'; ?></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?php echo h($event['Event']['id']); ?>&nbsp;</td>
                <td><?php echo h($event['Event']['title']); ?>&nbsp;</td>
                <td><?php echo h($event['Event']['detail']); ?>&nbsp;</td>
                <td><?php echo $this->Html->link(('イベント編集'), array('controller' => 'events', 'action' => 'edit', $event['Event']['id'])); ?></td>
                <td><?php echo $this->Html->link(('チケット編集'), array('controller' => 'tickets', 'action' => 'index', $event['Event']['id'])); ?></td>
                <td><?php echo $this->Html->link(('申し込み一覧'), array('controller' => 'applications', 'action' => 'index', $event['Event']['id'])); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>    </p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>