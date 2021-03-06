

<div class="wrapper">
    <!-- ヘッダー -->
    <div class="title">
        <h1>イベント編集</h1>
        <h2>Event Edit</h2>
    </div>

    <!-- 表 -->
    <?php echo $this->Form->create('Event', array('type' => 'file', 'id' => 'Event')); ?>
    <?php echo $this->Form->input('id'); ?>　
    <table class="type03" width="1000">
        <tr>
            <th width="290">イベント名</th>
            <td>
                <?php echo $this->Form->input('title', array('label' => false)); ?>

            </td>
        </tr>

        <tr>
            <th>現在のイベント画像</th>
            <td>
                <?php
                echo $this->Html->image($this->request->data['Event']['image'])
                ?>
            </td>
        </tr>

        <tr>
            <th>新しいイベント画像</th>
            <td>
                <?php
                echo $this->Form->input('file',
                    array(
                        'type' => 'file',
                        'label' => false,
                        'id' => 'file'
                    ));
                ?>
            </td>
        </tr>

        <tr>
            <th>詳細</th>
            <td width="">
                <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>

                <?php echo $this->Form->textarea('detail', array('class' => 'ckeditor')); ?>

                <!--<input type="text"><span class="moji">※000文字以内</span>-->
                <?php //echo $this->Form->input('detail', array('label' => false)); ?>
                  </td>
            </td>
        </tr>
        <tr>
            <th>受付開始</th>
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
            <th>受付終了</th>
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

    <div class="button4">
        <div class="button3">
            <?php
            echo $this->Html->link(
                '登録',
                'javascript:void(0)',
                array('onclick' => 'FormSubmit(\'Event\')')
            );
            ?>
        </div>
    </div>

    <div class="button4">
        <div class="button3">
            <?php
            echo $this->Form->postLink(
                '削除',
                array('action' => 'delete', $this->request->data['Event']['id']),
                array('confirm' => '削除します。よろしいですか？')
            );
            ?>

        </div>
    </div>

    <?php echo $this->Form->end(); ?>

    <!-- ページトップ -->
    <a href="#" id="page-top">Page Top</a>

</div>


