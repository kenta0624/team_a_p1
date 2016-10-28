<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->meta('icon');


    /* jQuery */
    echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');

    /* team_a.css,team_a.js　を読み込むための記述 */
    echo $this->Html->css('team_a');
    echo $this->Html->script('team_a');


    /*  */
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');


    //コントローラー名.アクション名.css　のスタイルを読み込む記述
    echo $this->Html->css($this->params['controller'].'.'.$this->params['action']);

    //コントローラー名.アクション名.js　のスタイルを読み込む記述
    echo $this->Html->script($this->params['controller'].'.'.$this->params['action']);



    ?>
    <!-- ページトップ -->
    <script>
        $(function(){
            var pageTop = $("#page-top");
            pageTop.click(function () {
                $('body, html').animate({ scrollTop: 0 }, 500);
                return false;
            });
            $(window).scroll(function () {
                if($(this).scrollTop() >= 200) {
                    pageTop.css( "transform", "rotateY(0deg)" );
                } else {
                    pageTop.css( "transform", "rotateY(270deg)" );
                }
            });
        });
    </script>
    <!-- フッター下固定 -->
    <script>
        new function(){

            var footerId = "footer";
            //メイン
            function footerFixed(){
                //ドキュメントの高さ
                var dh = document.getElementsByTagName("body")[0].clientHeight;
                //フッターのtopからの位置
                document.getElementById(footerId).style.top = "0px";
                var ft = document.getElementById(footerId).offsetTop;
                //フッターの高さ
                var fh = document.getElementById(footerId).offsetHeight;
                //ウィンドウの高さ
                if (window.innerHeight){
                    var wh = window.innerHeight;
                }else if(document.documentElement && document.documentElement.clientHeight != 0){
                    var wh = document.documentElement.clientHeight;
                }
                if(ft+fh<wh){
                    document.getElementById(footerId).style.position = "relative";
                    document.getElementById(footerId).style.top = (wh-fh-ft-1)+"px";
                }
            }

            //文字サイズ
            function checkFontSize(func){

                //判定要素の追加
                var e = document.createElement("div");
                var s = document.createTextNode("S");
                e.appendChild(s);
                e.style.visibility="hidden"
                e.style.position="absolute"
                e.style.top="0"
                document.body.appendChild(e);
                var defHeight = e.offsetHeight;

                //判定関数
                function checkBoxSize(){
                    if(defHeight != e.offsetHeight){
                        func();
                        defHeight= e.offsetHeight;
                    }
                }
                setInterval(checkBoxSize,1000)
            }

            //イベントリスナー
            function addEvent(elm,listener,fn){
                try{
                    elm.addEventListener(listener,fn,false);
                }catch(e){
                    elm.attachEvent("on"+listener,fn);
                }
            }

            addEvent(window,"load",footerFixed);
            addEvent(window,"load",function(){
                checkFontSize(footerFixed);
            });
            addEvent(window,"resize",footerFixed);

        }
    </script>
</head>
<body>
<div id="container">
    <!--ヘッダーを幅いっぱいにする為のボックス -->
    <div id="headerbg">
    <!--ヘッダー -->
    <div id="header">
        <?php
            if(!is_null(AuthComponent::user())){
                if(!($this->params['controller'] ==='applications' && ($this->params['action'] === 'add' || $this->params['action'] === 'added'))){
                    echo $this->Html->link('ログアウト',array('controller'=>'Users','action'=>'logout'));
                }
            }
        ?>
    </div>
    </div>
    <!--ヘッダーを幅いっぱいにする為のボックス2 -->
    <div id="headerbg2">
        <!--ヘッダー2 -->
        <div id="header2">
            -TeamA-
        </div>
    </div>
    <div id="content">

        <?php echo $this->Flash->render(); ?>

        <?php echo $this->fetch('content'); ?>
    </div>


    <!--フッター2 -->
    <div id="footer">
        COPYRIGHT © TeamA ALL RIGHTS RESERVED.
    </div>

</div>

</body>
</html>
