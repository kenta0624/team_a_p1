<script>

    function CalcPrice(){
        var priceArray = <?php echo json_encode($eventInfo['Ticket']);?> ;
        var ticketId = document.forms.Application.ticket_id.value;
        var count = document.forms.Application.quantity.value;

        for(var i = 0;i < priceArray.length ;i++){
            if(priceArray[i]['id'] == ticketId){
                var price =  priceArray[i]['price'];
                break;
            }
        }

        var totalPrice = count * price;
        document.getElementById('TotalPrice').innerText = totalPrice + '円';
    }

</script>

<div class="wrapper">

<header>
    <h1><?php echo $eventInfo['Event']['title']; ?></h1>
    <!--<h2>Event</h2>-->
</header>

<div class="event_img">
    <img src=<?php echo "/team_a_p1/app/webroot/img/".$eventInfo['Event']['image'];?>>
</div>

<h3>チケット申し込み</h3>

<?php echo $this->Form->create('Application',array('id' => 'Application')); ?>

<table class="type03" width="1000">
    <tr>
        <th width="150">チケット</th>
        <td>
            <?php echo $this->Form->input('ticket_id', array('type' => 'select', 'label' => false,'id' => 'ticket_id','onChange' => 'CalcPrice()')); ?>
        </td>
    </tr>

    <tr>
        <th>枚数</th>
        <td>
            <?php echo $this->Form->input('quantity', array('label' => false,'value' => 0,'min' => 1,'id' => 'quantity','onChange' => 'CalcPrice()')); ?>
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





    <div class="button2">
        <div class="button">
            <?php
            echo $this->Html->link(
                '申し込む',
                'javascript:void(0)',
                array('onclick' => 'FormSubmit(\'Application\')')
            );
            ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>

</div>





