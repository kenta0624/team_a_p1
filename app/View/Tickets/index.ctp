<div class="wrapper">
    <div class="title">
        <h1>チケット一覧</h1>
        <h2><?php echo __('Ticket List'); ?></h2>
    </div>
    <!-- ユーザー入力情報 タイトル＆表  -->
    <div class="tickets index">
        <table class="type03" width="1000" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('id', 'チケットID'); ?></th>
                <th><?php echo $this->Paginator->sort('ticket_name', 'チケット名'); ?></th>
                <th><?php echo $this->Paginator->sort('event_date', '開催日'); ?></th>
                <th><?php echo $this->Paginator->sort('price', '単価'); ?></th>
                <th><?php echo $this->Paginator->sort('count', 'チケット総数'); ?></th>
                <th><?php echo '販売済枚数'; //echo $this->Paginator->sort('sold', '販売済枚数'); ?></th>
                <th><?php echo '在庫数'; //echo $this->Paginator->sort('stock', '在庫数'); ?></th>
                <th><?php echo $this->Paginator->sort('created', '登録日'); ?></th>
                <th><?php echo $this->Paginator->sort('modified', '更新日'); ?></th>
                <th class="actions"><?php echo __('編集'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <tr>
                    <td><?php echo h($ticket['Ticket']['id']); ?>&nbsp;</td>
                        <?php // echo $this->Html->link($ticket['Event']['title'], array('controller' => 'events', 'action' => 'view', $ticket['Event']['id'])); ?>
                    <td><?php echo h($ticket['Ticket']['ticket_name']); ?>&nbsp;</td>
                    <td><?php echo h(substr($ticket['Ticket']['event_date'],0,10)); ?>&nbsp;</td>
                    <td><?php echo h($ticket['Ticket']['price']); ?>&nbsp;</td>
                    <td><?php echo h(substr($ticket['Ticket']['count'],0,10)); ?>&nbsp;</td>
                    <td><?php echo h(substr($ticket['Ticket']['sold'],0,10)); ?>&nbsp;</td>
                    <td><?php echo h(substr($ticket['Ticket']['stock'],0,10)); ?>&nbsp;</td>
                    <td><?php echo h(substr($ticket['Ticket']['created'],0,10)); ?>&nbsp;</td>
                    <td><?php echo h(substr($ticket['Ticket']['modified'],0,10)); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('チケット編集'), array('action' => 'edit', $ticket['Ticket']['id']), array('class' => 'button1')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- ボタン -->
    <?php echo $this->Html->link(__('イベント一覧'), array('controller' => 'events','action' => 'index'), array('class' => 'button'));    /* 2016/10/20 katashio*/ ?>
    <?php echo $this->Html->link(__('新規チケット追加'), array('action' => 'add', $id), array('class' => 'button')); ?>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __( ' previous '), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ' '));
        echo $this->Paginator->next(__(' next ') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>

    <!-- ページトップ -->
    <a href="#" id="page-top">Page Top</a>

</div>
