<div class="wrapper">
    <!-- ヘッダー -->
    <header>
        <h1>新規イベント追加</h1>
        <h2>Add New Event</h2>

        <!-- ユーザー入力情報 タイトル＆表 -->
        <?php echo $this->Form->create('Event', array('label' => false,'type' => 'file')); ?>

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
                    <!-- <div class="button3">ファイル形式 jpg (1000px X 400px) <a class="button4" href="#">参照</a></div> -->
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
                    <!-- <input type="text"> -->
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
        <div class="button2"><?php echo $this->Html->link('キャンセル',array('action' => 'index')); ?></div>


        <!-- <div class="button6"> <a class="button5" href="#">保存</a></div> -->
        <div class="button2"><?php echo $this->Form->submit('登録'); ?></div>

        <?php echo $this->Form->end(); ?>

</div>
