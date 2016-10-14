<div class="wrapper">
    <!-- ヘッダー -->
    <header>
        <h1>イベント編集</h1>
        <h2>Event Edit</h2>
        <!-- ユーザー入力情報 タイトル＆表 -->
        <?php echo $this->Form->create('Event',array('type' => 'file')); ?>

        <?php echo $this->Form->input('id',array('type' => 'visible')); ?>　　//idを確認するために一時的に表示

        <table class="type03" width="1000">
            <tr>
                <th width="100">イベント名</th>
                <td>

                    <!--<input type="text">-->
                    <?php echo $this->Form->input('title',array('label' => false)); ?>
                    <span class="moji">※000文字以内</span></td>
            </tr>
            <tr>
                <th>イベント画像</th>
                <td>
                    <!--<div class="button3">ファイル形式 jpg (1000px X 400px) <a class="button4" href="#">参照</a></div>-->
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
                    <!--<input type="text"><span class="moji">※000文字以内</span>-->
                    <?php echo $this->Form->input('detail',array('label' => false)); ?>
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
        <!--<div class="button2"> <a class="button" href="#">イベント一覧に戻る</a></div>-->
        <?php echo $this->Html->link('キャンセル',array('action' => 'index')); ?>


        <!--<div class="button6"> <a class="button5" href="#">編集</a></div>-->
        <?php echo $this->Form->submit('登録'); ?>

        <?php echo $this->Form->end(); ?>


</div>