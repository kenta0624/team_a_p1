<script>

    function CalcPrice() {
        var priceArray = <?php echo json_encode($eventInfo['Ticket']);?> ;
        var ticketId = document.forms.Application.ticket_id.value;
        var count = document.forms.Application.quantity.value;

        for (var i = 0; i < priceArray.length; i++) {
            if (priceArray[i]['id'] == ticketId) {
                var price = priceArray[i]['price'];
                break;
            }
        }

        var totalPrice = count * price;
        document.getElementById('TotalPrice').innerText = totalPrice + '円';
    }

</script>

<div class="wrapper">

    <div class="title">
        <h1><?php echo $eventInfo['Event']['title']; ?></h1>
        <!--<h2>Event</h2>-->
    </div>

    <div class="event_img">
        <img src=<?php echo "/team_a_p1/app/webroot/img/" . $eventInfo['Event']['image']; ?>>
    </div>

    <h3>チケット申し込み</h3>

    <?php echo $this->Form->create('Application', array('id' => 'Application')); ?>

    <table class="type03" width="1000">
        <tr>
            <th width="150">チケット</th>
            <td>
                <?php echo $this->Form->input('ticket_id', array('type' => 'select', 'label' => false, 'id' => 'ticket_id', 'onChange' => 'CalcPrice()')); ?>
            </td>
        </tr>

        <tr>
            <th>枚数</th>
            <td>
                <?php echo $this->Form->input('quantity', array('label' => false, 'value' => 0, 'min' => 1, 'id' => 'quantity', 'onChange' => 'CalcPrice()')); ?>
                <span class="moji2">枚</span>
            </td>
        </tr>

        <tr>
            <th>料金</th>
            <td><span id="TotalPrice">0 円</span></td>
        </tr>


        <tr>
            <th>詳細</th>
            <td><?php echo $eventInfo['Event']['detail']; ?></td>
        </tr>

    </table>

    <h4>お客様情報</h4>

    <table class="type03" width="1000">
        <tr>
            <th width="150">氏名</th>
            <td><?php echo $this->Form->input('customer_name', array('label' => false)); ?></td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><?php echo $this->Form->input('tel', array('label' => false)); ?></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><?php echo $this->Form->input('email', array('label' => false)); ?></td>
        </tr>
    </table>


    <div class="button2" align="center">
        <div class="button">
            <?php

            $start = date_create($eventInfo['Event']['start_date']) ;
            $end = date_create($eventInfo['Event']['end_date']);
            $now = new DateTime();

            if ($start <= $now && $now <= $end) {
                echo $this->Html->link(
                    'この内容で申し込む',
                    'javascript:void(0)',
                    array('onclick' => 'FormSubmit(\'Application\')')
                );
            } else {
                $this->log('申し込みできません','debug');
                echo $this->Html->link(
                    '申し込みできません',
                    'javascript:void(0)',
                    array('onclick' => 'javascript:void(0)')
                );
            }
            ?>

        </div>
    </div>
    <?php echo $this->Form->end(); ?>






    <!-- ページトップ -->
    <a href="#" id="page-top">Page Top</a>



    <!-- シェアボタンに変換される -->
    <div class="fb"><div class="fb-like" data-href="<?php $this->Html->url('/controller/action/', true);?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div></div>
    <!-- シェアボタンに変換される -->
    <div class="tw"><a class="twitter-share-button" href="https://twitter.com/share" data-dnt="true">Tweet</a></div></div>





    <!-- [head]内や、[body]の終了直前などに配置 -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>



    <!-- [head]内や、[body]の終了直前などに配置 -->
    <script>
        window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
    </script>

</div>





