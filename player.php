<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>IPTV Player</title>
        <link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.5.1/themes/bootstrap/easyui.css">
        <link rel="stylesheet" type="text/css" href="js/jquery-easyui-1.5.1/themes/icon.css?v=1.0.0">
        <link rel="stylesheet" type="text/css" href="css/style.css?v=1.0.0">

        <style>
            /* Basics */
            html, body {
                font-family: "Helvetica Neue", Helvetica, sans-serif;
                color: #000;
                text-decoration:none;
                -webkit-font-smoothing: antialiased;
            }
            .finish{
                background-color: #ff9900;
            }
            .cancel{
                background-color: #ff0000;
            }
            #container {
                position: fixed;
                width: 250px;
                height: 90px;
                top: 50%;
                left: 50%;
                margin-top: -150px;
                margin-left: -170px;
                background: #fff;
                border-radius: 3px;
                border: 1px solid #ccc;
                box-shadow: 0 1px 2px rgba(0, 0, 0, .1);

            }
            #container2 {
                margin: 0 auto;
                margin-top: 20px;
            }
            label {
                color: #555;
                display: inline-block;
                margin-left: 30px;
                margin-top:5px;
                padding-top: 14px;
                font-size: 14px;
                float:left;
            }
            img {
                color: #555;
                display: inline-block;
                margin-left: 25px;
                padding-top: 10px;
                font-size: 14px;
                float:left;
            }            
        </style>     

        <script type="text/javascript" src="js/jquery-easyui-1.5.1/jquery.min.js?v=1.0.33"></script>
        <script type="text/javascript" src="js/jquery-easyui-1.5.1/jquery.easyui.min.js?v=1.0.33"></script>
        <script type="text/javascript" src="http://yandex.st/swfobject/2.2/swfobject.min.js"></script>
        <script>
            play = function (node) {
                var flashvars = {
                    src: node.url
                };
                var params = {
                    allowFullScreen: true,
                    bufferTime: 0
                    , allowScriptAccess: "always"
                    , bgcolor: "#000000"
                };
                var attrs = {
                    name: "player",
                    bufferTime: 0
                };
                swfobject.embedSWF("js/GrindPlayer.swf", "player", "290", "300", "10.2", null, flashvars, params, attrs);
            };
//            $(document).ready(function () {
//
//            });

        </script>
    </head>

    <body id="main" class="easyui-layout">
        <div data-options="region:'west',width:300">
            <ul id="tree" class="easyui-tree" data-options="href:'scripts/load_channel.php',onClick:function(node){ play(node);}">

            </ul>
        </div>
        <div data-options="region:'center',width:300">
            <div id="player" class="easyui-panel" data-options="fit:true">

            </div>
        </div>

    </body>
</html>
