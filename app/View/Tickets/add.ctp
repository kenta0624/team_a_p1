<div class="wrapper">
    <!-- ヘッダー -->
    <div class="title">
        <h1>新規チケット追加</h1>
        <h2><?php echo __('Ticket Add'); ?></h2>
    </div>
    <h3><?php echo $eventTitle; ?></h3>
    <div class="tickets form">
        <?php echo $this->Form->create('Ticket', array('id' => 'Ticket')); ?>
        <!-- ユーザー入力情報 タイトル＆表 -->
        <table class="type03" width="1000">
            <?php echo $this->Form->input('id'); ?>
            <tr>
                <th width="290">チケット名</th>
                <td>
                    <?php echo $this->Form->input('ticket_name', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <th>開催日</th>
                <td>
                    <?php
                    echo $this->Form->input('event_date', array(
                        'type' => 'date',
                        'dateFormat' => 'YMD',
                        'monthNames' => false,
                        'separator' => '/',
                        'label' => false
                    )); ?>
                </td>
            </tr>
            <tr>
                <th>単価</th>
                <td>
                    <?php echo $this->Form->input('price', array('label' => false)); ?><span class="moji1">円</span>
                </td>
            </tr>
            <tr>
                <th>販売枚数</th>
                <td>
                    <?php echo $this->Form->input('count', array('label' => false)); ?><span class="moji1">枚</span>
                </td>
            </tr>
        </table>
    </div>
    <!-- ボタン -->
    <?php
    echo $this->Html->link(
        __('チケット一覧に戻る'),
        array('action' => 'index', $event_id),
        array('class' => 'button2')
    );
    ?>

    <?php
    echo $this->Html->link(
        '追加',
        'javascript:void(0)',
        array(
            'onclick' => 'FormSubmit(\'Ticket\')',
            'class' => 'button'
        )
    );
    ?>
    <?php echo $this->Form->end(); ?>

    <!-- ページトップ -->
    <a href="#" id="page-top">Page Top</a>
</div>
