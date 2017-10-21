<?php require_once 'scripts/session.php';    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>IPTV - CMS</title>
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
        <script type="text/javascript" src="js/f.js?v=1.0.26"></script>
        <script type="text/javascript" src="js/iptv.js?v=1.0.28"></script>
    </head>
    <div id="winAlarm" class="easyui-window" closed="true" style="width:300px;height:300px;">
    </div>
    <body id="main" class="easyui-layout">
        <div data-options="region:'north', bodyCls: 'topCss'" style="height:45px;padding:5px 10px;">
            <b style="font-size:18px;">IPTV Content Management System <?php echo $_SESSION['user_level'];?></b>
            <div style="position:absolute;top:5px;right:10px;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-man" plain="true" onclick="app.logout();">Logout</a>
            </div>
        </div>
        <div data-options="region:'south',title:'Log Info', bodyCls: 'topCss'" style="height:250px;">
            <table id="grid_log" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_log.php"  pagination="true"  toolbar='#tb_log' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
                <thead>
                    <tr>           
                        <th field="ldate" width="150" align="left">Date</th>
                        <th field="priority" width="150" align="left">Priority</th>                                                    
                        <th field="category" width="120" align="left">Category</th>
                        <th field="msg" width="700" align="left">Message</th>
                    </tr>
                </thead>
            </table
            <!-- Toolbar -->
            <div id="tb_log" style="padding: 3px 5px;">
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_log();">Delete</a>
                <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="app.clear_log();">Clear</a>
            </div>
        </div>
        <!--        <div data-options="region:'west'" data-options="split:true" style="width:300px;">
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
                </div>        -->
        <div data-options="region:'center'">
            <div class="easyui-tabs" data-options="fit:true">
                <?php if($_SESSION['user_level']=='admin'){ ?>
                <div
                    data-options="title:'Media', 
                    href:'scripts/page_media.php?v=1.0.0'"
                    >

                </div>
                <?php } ?>
                <?php if($_SESSION['user_level']=='admin'){ ?>
                <div
                    data-options="title:'Channel', 
                    href:'scripts/page_channel.php?v=1.0.0',
                    onLoad: function () {
                    //app.init();
                    }"
                    >

                </div>
                <?php } ?>
                <?php if($_SESSION['user_level']=='admin'){ ?>
                <div
                    data-options="title:'Device', 
                    href:'scripts/page_device.php?v=1.0.0',
                    onLoad: function () {
                    //app.init();
                    }"
                    >
                </div>
                 <?php } ?>
                 <div
                    data-options="title:'Runningtext', 
                    href:'scripts/page_runningtext.php?v=1.0.0',
                    onLoad: function () {
                    //app.init();
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
                    data-options="title:'User', 
                    href:'scripts/page_user.php?v=1.0.0',
                    onLoad: function () {
                    //app.init();
                    }"
                    >

                </div>
            </div>
        </div>
    </body>
</html>
