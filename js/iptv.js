var ip = "ws://192.168.1.110:7070/websocket";
var ws;
var app = {

};
app.init = function () {

    //init tree

    $("#treeMenu").tree({
        onClick: function (node) {
            console.log(node);
        }
    });
    app.init_ws();
};
var wsHandler;
var websocket_server = "ws://localhost:7070/websocket";
app.init_ws = function () {
    app.websocket = new WebSocket(websocket_server);
    app.websocket.onopen = function (evt) {
        console.log('websocket.onopen');
        wsHandler = setTimeout(function () {
            var msg = {
                tag: 'login',
                sub_tag: 'controller',
                msg: 'hello Iam Login'
            };
            app.websocket.send(JSON.stringify(msg));
        }, (10 * 1000));
    };
    app.websocket.onclose = function (evt) {
        console.log('websocket.onclose');
        if (wsHandler) {
            clearTimeout(wsHandler);
        }
        wsHandler = setTimeout(function () {
            app.init_ws();
        }, (10 * 1000));
    };
    app.websocket.onerror = function (evt) {
        console.log('websocket.onerror');
        if (wsHandler) {
            clearTimeout(wsHandler);
        }
        wsHandler = setTimeout(function () {
            app.init_ws();
        }, 10 * 1000);
    };
    app.websocket.onmessage = function (evt) {
        var data = JSON.parse(evt.data);
        console.log(data);
    };
};

app.add_channel = function () {
    $("#dlg_channel").dialog('open').dialog('center').dialog('setTitle', 'Add Channel');
};
app.edit_channel = function () {
    var row = $("#tbl_channel").datagrid('getSelected');
    if (row === null) {
        alert('Select Channel to Edit');
        return;
    }
    $("#form_channel").form('load', row);
    $("#dlg_channel").dialog('center').dialog('show').dialog('setTitle', 'Edit Channel');
};
app.del_channel = function () {
    var row = $("#tbl_channel").datagrid('getSelected');
    if (row === null) {
        alert('Select Channel to Edit');
        return;
    }
    $("#form_channel").form('load', row);
    $("#dlg_channel").dialog('center').dialog('show').dialog('setTitle', 'Delete Channel');
};
app.search_channel = function () {

};
app.set_main_display = function () {
    var row = app.streaming.datagrid.getSelected('selected');
    if (row === null || row === undefined) {
        alert('select stream');
        return;
    }
    app.websocket.websocket.send('set_main_display,' + row.id);
};
app.disable_main_display = function () {
    app.websocket.websocket.send('disable_main_display');
};