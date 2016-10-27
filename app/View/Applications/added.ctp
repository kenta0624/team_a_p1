<div class="wrapper">
    <!-- ヘッダー -->
    <div class="title">
        <h1>申し込み完了</h1>
        <h2>Application Completed</h2>
    </div>
    <!-- 申し込み完了致しました。 -->
    <div class="mousikomi">
        <p><?php echo $application['Ticket']['Event']['title']; ?>　の申し込みを完了致しました。</p>
        <p>申し込み番号は　<?php echo $application['Application']['id']; ?>　です。</p>
        <div class="mail">※申し込み時のメールアドレスに申し込み情報の控えが送信されました。</div>
    </div>

    <!-- 見出し -->
    <h3>チケット詳細</h3>
    <!-- 表 -->
    <table class="type03" width="1000">
        <tr>
            <th width="200">イベント名</th>
            <td width="800"><?php echo $application['Ticket']['Event']['title']; ?></td>
        </tr>
        <tr>
            <th width="200">チケット</th>
            <td width="800"><?php echo $application['Ticket']['ticket_name']; ?></td>
        </tr>
        <tr>
            <th>開催日時</th>
            <td><?php echo date_format(date_create($application['Ticket']['event_date']), 'Y/m/d H:i'); ?></td>
        </tr>
        <tr>
            <th>枚数</th>
            <td><?php echo $application['Application']['quantity']; ?><span class="moji2">枚</span></td>
        </tr>
        <tr>
            <th>料金</th>
            <td><?php echo $application['Application']['quantity'] * $application['Ticket']['price']; ?>円</td>
        </tr>
        <tr>
            <th>詳細</th>
            <td><?php echo $application['Ticket']['Event']['title']; ?></td>
        </tr>

    </table>
    <!-- 見出し -->
    <h4>ユーザー情報</h4>
    <!-- 表 -->
    <table class="type03" WIDTH="1000">
        <tr>
            <th width="200">氏名</th>
            <td WIDTH="800"><?php echo $application['Application']['customer_name']; ?></td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><?php echo $application['Application']['tel']; ?></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><?php echo $application['Application']['email']; ?></td>
        </tr>

    </table>

    <!-- ページトップ -->
    <a href="#" id="page-top">Page Top</a>


</div>
