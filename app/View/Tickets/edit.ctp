<div class="wrapper">
    <div class="title">
        <h1>チケット編集</h1>
        <h2><?php echo __('Ticket Edit'); ?></h2>
    </div>

    <h3><?php echo $eventTitle; ?></h3>

    <!-- ユーザー入力情報 タイトル＆表 -->
    <div class="tickets form">
        <?php echo $this->Form->create('Ticket', array('id' => 'Ticket')); ?>
        <?php echo $this->Form->input('event_id',array('type' => 'hidden')); ?>

        <table class="type03" width="1000">
            <?php echo $this->Form->input('id'); ?>

            <tr>
                <th width="200">チケット名</th>
                <td>
                    <?php echo $this->Form->input('ticket_name', array('label' => false)); ?>
                </td>
            </tr>
            <tr>
                <th>開催日</th>
                <td>
                    <?php echo $this->Form->input('event_date', array(
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
                <th>チケット総数</th>
                <td>
                    <?php echo $this->Form->input('count', array('label' => false)); ?><span class="moji1">枚</span>
                </td>
            </tr>

        </table>

        <!-- ボタン -->
            <div class="button5">
                <?php echo $this->Html->link(
                    __('チケット一覧に戻る'),
                    array(
                        'action' => 'index',
                        $data['Ticket']['event_id']
                    ),
                    array('class' => 'button')
                ); ?>
            </div>

            <div class="button3">
                <?php echo $this->Html->link(
                    '保存',
                    'javascript:void(0)',
                    array(
                        'onclick' => 'FormSubmit(\'Ticket\')',
                        'class' => 'button'
                    )
                ); ?>
            </div>

        <?php echo $this->Form->end(); ?>
    </div>

    <div class="button4">
        <div class="button3">
            <?php echo $this->Form->postLink(
                __('削除'),
                array(
                    'action' => 'delete',
                    $data['Ticket']['id']
                ),
                array(
                    'confirm' => __('Are you sure you want to delete # %s?', $data['Ticket']['id']),
                    'class' => 'button'
                )
            ); ?>
        </div>
    </div>

    <!-- ページトップ -->
    <a href="#" id="page-top">Page Top</a>
    </div>
