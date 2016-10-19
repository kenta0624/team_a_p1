<div class="wrapper">
    <!-- ヘッダー -->
    <header>
        <h1>新規イベント追加</h1>
        <h2>Add New Event</h2>

        <!-- ユーザー入力情報 タイトル＆表 -->
        <?php echo $this->Form->create('Event', array('id' => 'Event', 'label' => false, 'type' => 'file')); ?>

        <table class="type03" width="1000">
            <tr>
                <th width="100">イベント名</th>
                <td>
                    <!-- <input type="text"> -->
                    <?php echo $this->Form->input('title', array('label' => false)); ?>
                    <span class="moji">※000文字以内</span>
                </td>
            </tr>
            <tr>
                <th>イベント画像</th>
                <td>
                    <?php echo $this->Form->input('file',
                        array(
                            'type' => 'file',
                            'label' => false,
                        ));
                    ?>

                </td>
            </tr>
            <tr>
                <th>詳細</th>
                <td>
                    <?php echo $this->Form->input('detail', array('label' => false)); ?>
                    <span class="moji">※000文字以内</span>
                </td>
            </tr>

            <tr>
                <th>公開開始</th>
                <td>
                    <?php echo $this->Form->input(
                        'start_date',
                        array(
                            'label' => false, 'type' => 'datetime',
                            'dateFormat' => 'YMD',
                            'monthNames' => false,
                            'timeFormat' => '24',
                            'separator' => '/'
                        )); ?>
                </td>
            </tr>

            <tr>
                <th>公開終了</th>
                <td>
                    <?php echo $this->Form->input(
                        'end_date',
                        array(
                            'label' => false, 'type' => 'datetime',
                            'dateFormat' => 'YMD',
                            'monthNames' => false,
                            'timeFormat' => '24',
                            'separator' => '/'
                        )); ?>
                </td>
            </tr>


        </table>

        <!-- ボタン -->
        <div class="button2">
            <div class="button"><?php echo $this->Html->link('イベント一覧に戻る', array('action' => 'index')); ?></div>
        </div>

        <div class="button2">
            <div class="button">
            <?php
            echo $this->Html->link(
                '登録',
                'javascript:void(0)',
                array('onclick' => 'FormSubmit(\'Event\')')
            );
            ?>
            </div>
        </div>

        <?php echo $this->Form->end(); ?>

</div>
