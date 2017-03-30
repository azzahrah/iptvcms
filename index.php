<?php // require_once 'scripts/session.php';   ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>GPS Tracking System</title>
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
        <script type="text/javascript" src="js/jquery-easyui-1.5.1/jquery.min.js?v=1.0.0"></script>
        <script type="text/javascript" src="js/jquery-easyui-1.5.1/jquery.easyui.min.js?v=1.0.0"></script>
        <script type="text/javascript" src="js/iptv.js?v=1.0.6"></script>
    </head>
    <div id="winAlarm" class="easyui-window" closed="true" style="width:300px;height:300px;">
    </div>
    <body id="main" class="easyui-layout">
        <div data-options="region:'north', bodyCls: 'topCss'" style="height:45px;padding:3px;10px;">
            <b>IPTV Content Management System</b>
        </div>
        <div data-options="region:'west'" data-options="split:true" style="width:300px;">
            <ul id="treeMenu" class="easyui-tree">
                <li>
                    <span>Menu</span>
                    <ul>
                        <li><span>Streaming</span></li>
                        <li><span>Schedule</span></li>
                        <li><span>Running Text</span></li>
                        <li><span>Devices</span></li>
                    </ul>
                </li>
            </ul>
        </div>        
        <div data-options="region:'center'">
            <div class="easyui-tabs" data-options="fit:true">
                <div
                    data-options="title:'Streaming', 
                    href:'scripts/page_channel.php?v=1.0.0',
                    onLoad: function () {
                    app.init();
                    }"
                    >

                </div>
                <div
                    data-options="title:'Schedule', 
                    href:'scripts/page_schedule.php?v=1.0.0',
                    onLoad: function () {
                        //app.init();
                    }"
                    >

                </div>
                <div
                    data-options="title:'Devices', 
                    href:'scripts/page_devices.php?v=1.0.0',
                    onLoad: function () {
                        //app.init();
                    }"
                    >

                </div>
            </div>
        </div>
    </body>
</html>
