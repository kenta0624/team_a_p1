<div class="wrapper">
    <!-- タイトル -->
    <div class="title">
        <h1>イベント一覧</h1>
        <h2>Event List</h2>
    </div>

    <!-- 検索 -->
    <div align="right">
        <?php echo $this->Form->create('Search',array('url'=>'index','id' => 'Search')); ?>
        <dl class="search2">
            <dt class="a1"><?php echo $this->Form->input('title', array('label' => false)); ?></dt>
            <dd>
                <button>
                <?php
                echo $this->Html->link(
                    'Search',
                    'javascript:void(0)',
                    array('onclick' => 'FormSubmit(\'Search\')')
                );
                ?>
                </button>
            </dd>
        </dl>
        <?php echo $this->Form->end(); ?>
    </div>

    <!-- 表 -->
    <table class="type03" width="1000">
        <thead>
        <tr>
            <th width="130"><?php echo $this->Paginator->sort('イベントID'); ?></th>
            <th width="130"><?php echo $this->Paginator->sort('イベント名'); ?></th>
            <th width="280"><?php echo $this->Paginator->sort('詳細'); ?></th>
            <th><?php echo 'イベント'; ?></th>
            <th><?php echo 'チケット'; ?></th>
            <th><?php echo '申し込み画面'; ?></th>
            <th><?php echo '申し込み一覧'; ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($events as $event): ?>
            <tr>
                <td><?php echo h($event['Event']['id']); ?></td>
                <td><?php echo h($event['Event']['title']); ?></td>
                <td><?php echo strip_tags($event['Event']['detail']); ?></td>
                <td><div class="button3"> <div class="button4"><?php echo $this->Html->link(('イベント編集'), array('controller' => 'events', 'action' => 'edit', $event['Event']['id'])); ?></div></div></td>
                <td><div class="button3"> <div class="button4"><?php echo $this->Html->link(('チケット編集'), array('controller' => 'tickets', 'action' => 'index', $event['Event']['id'])); ?></div></div></td>
                <td><div class="button3"> <div class="button4"><?php echo $this->Html->link(('申し込み画面'), array('controller' => 'applications', 'action' => 'add', $event['Event']['id']),array('target' => '_blank')); ?></div></div></td>
                <td><div class="button3"> <div class="button4"><?php echo $this->Html->link(('申し込み一覧'), array('controller' => 'applications', 'action' => 'index', $event['Event']['id'])); ?></div></div></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- 新規イベント追加 -->
    <div class="button2">
        <div class="button"><?php echo $this->Html->link('新規イベント追加',array('action' => 'add')); ?>
    </div></div>



    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>    </p>
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