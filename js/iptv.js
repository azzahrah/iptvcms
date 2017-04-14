//var ip = "ws://127.0.0.1:7070/websocket";
var ip = "ws://192.168.1.81:7070/websocket";
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
    app.loop_log();
};
var wsHandler;
var websocket_server = "ws://localhost:7070/websocket";
app.init_ws = function () {
    app.websocket = new WebSocket(ip);
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
        console.log(evt);
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
    $("#form_channel").form('load', {mode: 'add', id: 0});
};
app.edit_channel = function () {
    var row = $("#grid_channel").datagrid('getSelected');
    if (row === null) {
        alert('Select Channel to Edit');
        return;
    }
    row['mode'] = 'edit';
    $("#form_channel").form('load', row);
    $("#dlg_channel").dialog('open').dialog('center').dialog('setTitle', 'Delete Channel');
};
app.del_channel = function () {
    var row = $("#grid_channel").datagrid('getSelected');
    if (row === null) {
        alert('Select Channel to Edit');
        return;
    }
    row['mode'] = 'delete';
    console.log(row);
    $("#form_channel").form('load', row);
    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            $('#form_channel').form('submit', {
                url: 'scripts/save_channel.php',
                onSubmit: function () {
                    // do some check
                    // return false to prevent submit;
                },
                success: function (data) {
                    console.log(data);
                    app.refresh_channel();
                }
            });
        }
    });
};
app.save_channel = function () {
    $('#form_channel').form('submit', {
        url: 'scripts/save_channel.php',
        onSubmit: function () {
            // do some check
            // return false to prevent submit;
        },
        success: function (data) {
            console.log(data);
            app.refresh_channel();
        }
    });
};
app.refresh_channel = function () {
    $("#grid_channel").datagrid('reload');
};
app.search_channel = function () {

};
app.lock_channel = function () {
    var row = $("#grid_channel").datagrid('getSelected');
    if (row === null || row === undefined) {
        alert('select channel');
        return;
    }
    var msg = {
        tag: 'broadcast',
        sub_tag: 'lock_channel',
        url: row.url
    };
    app.websocket.send(JSON.stringify(msg));
    setTimeout(function () {
        $("#grid_channel").datagrid('reload');
    }, 2000);
};
app.unlock_channel = function () {
    var msg = {
        tag: 'broadcast',
        sub_tag: 'unlock_channel',
        channel_id: 0
    };
    app.websocket.send(JSON.stringify(msg));
    setTimeout(function () {
        $("#grid_channel").datagrid('reload');
    }, 2000);
};
app.update_channel = function () {
    var msg = {
        tag: 'broadcast',
        sub_tag: 'update_channel'
    };
    app.websocket.send(JSON.stringify(msg));
};


/* Users */
app.add_user = function () {
    $("#form_user").form('load', {mode:'add',id:0,password:'',login:'',real_name:''});
    $("#dlg_user").dialog('open').dialog('center').dialog('setTitle', 'Add User');
};
app.edit_user = function () {
    var row = $("#grid_user").datagrid('getSelected');
    if (row === null) {
        alert('Select Data to Edit');
        return;
    }
    row['mode']='edit';
    $("#form_user").form('load', row);
    $("#dlg_user").dialog('open').dialog('center').dialog('setTitle', 'Edit User');
};
app.del_user = function () {
    var row = $("#grid_user").datagrid('getSelected');
    if (row === null) {
        alert('Select Data to Edit');
        return;
    }
    row['mode']='delete';
    $("#form_user").form('load', row);
    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            app.save_user();
        }
    });
};
app.save_user = function () {
    $('#form_user').form('submit', {
        url: 'scripts/save_user.php',
        onSubmit: function () {
            // do some check
            // return false to prevent submit;
        },
        success: function (data) {
            console.log(data);
            app.refresh_user();
        }
    });
};
app.refresh_user = function () {
    $("#grid_user").datagrid('reload');//.dialog('show').dialog('setTitle', 'Delete User');
};
/* Logs */
var xhr;
app.del_log = function () {
    var row = $("#grid_log").datagrid('getSelected');
    if (row === null) {
        alert('Select Log to Delete');
        return;
    }
    if (xhr) {
        xhr.abort();
    }
    row['mode'] = 'delete';
    console.log(row);

    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            xhr = $.ajax({
                url: 'scripts/save_log.php',
                dataType: 'json',
                type: 'post',
                data: row,
                success: function (result) {
                    console.log(result);
                    app.refresh_log();
                }
            });
        }
    });
};
app.clear_log = function () {
    var data = {
        mode: 'clear'
    };
    //console.log(row);

    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            xhr = $.ajax({
                url: 'scripts/save_log.php',
                dataType: 'json',
                type: 'post',
                data: data,
                success: function (result) {
                    console.log(result);
                    app.refresh_log();
                }
            });
        }
    });
};
app.refresh_log = function () {
    $("#grid_log").datagrid('reload');
};
var timerLog;
app.loop_log = function () {
    if (timerLog) {
        clearTimeout(timerLog);
    }
    $("#grid_log").datagrid('reload');
    timerLog = setTimeout(function () {
        app.loop_log();
    }, 5000);
};

/* Running Text */
/* Users */
app.add_runningtext = function () {
    $("#form_runningtext").form('load', {mode: 'add', id: 0});
    $("#dlg_runningtext").dialog('open').dialog('center').dialog('setTitle', 'Add runningtext');
};
app.edit_runningtext = function () {
    var row = $("#grid_runningtext").datagrid('getSelected');
    if (row === null) {
        alert('Select runningtext to Edit');
        return;
    }
    row['mode'] = 'edit';
    $("#form_runningtext").form('load', row);
    $("#dlg_runningtext").dialog('center').dialog('show').dialog('setTitle', 'Edit runningtext');
};
app.del_runningtext = function () {
    var row = $("#grid_runningtext").datagrid('getSelected');
    if (row === null) {
        alert('Select Data to Delete');
        return;
    }
    row['mode'] = 'delete';
    $("#form_runningtext").form('load', row);
    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            app.save_runningtext();
        }
    });
};
app.save_runningtext = function () {
    $('#form_runningtext').form('submit', {
        url: 'scripts/save_runningtext.php',
        onSubmit: function () {
            // do some check
            // return false to prevent submit;
        },
        success: function (data) {
            console.log(data);
            app.refresh_runningtext();
        }
    });
};
app.refresh_runningtext = function () {
    $("#grid_runningtext").datagrid('reload');//.dialog('show').dialog('setTitle', 'Delete User');
};

app.update_runningtext = function () {
    var row = $("#grid_runningtext").datagrid('getSelected');
    var data = {
        tag: 'broadcast',
        sub_tag: 'update_runningtext',
        runningtext: row.runningtext
    };
    console.log(data);
    try {
        app.websocket.send(JSON.stringify(data));
    } catch (e) {
        alert(e);
    }
};

/* Device */
app.add_device = function () {
    $("#form_device").form('load', {mode: 'add', id: 0});
    $("#dlg_device").dialog('open').dialog('center').dialog('setTitle', 'Add device');

};
app.edit_device = function () {
    var row = $("#grid_device").datagrid('getSelected');
    if (row === null) {
        alert('Select device to Edit');
        return;
    }
    row['mode'] = 'edit';
    $("#form_device").form('load', row);
    $("#dlg_device").dialog('open').dialog('center').dialog('setTitle', 'Delete device');
};
app.del_device = function () {
    var row = $("#grid_device").datagrid('getSelected');
    if (row === null) {
        alert('Select device to Edit');
        return;
    }
    row['mode'] = 'delete';
    console.log(row);
    $("#form_device").form('load', row);
    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            $('#form_channel').form('submit', {
                url: 'scripts/save_device.php',
                onSubmit: function () {
                    // do some check
                    // return false to prevent submit;
                },
                success: function (data) {
                    console.log(data);
                    app.refresh_channel();
                }
            });
        }
    });
};
app.save_device = function () {
    $('#form_device').form('submit', {
        url: 'scripts/save_device.php',
        onSubmit: function () {
            // do some check
            // return false to prevent submit;
        },
        success: function (data) {
            console.log(data);
            app.refresh_device();
        }
    });
};
app.refresh_device = function () {
    $("#grid_device").datagrid('reload');
};

/* Schedule */
app.add_schedule = function () {
    $("#dlg_schedule").dialog('open').dialog('center').dialog('setTitle', 'Add schedule');
    $("#form_schedule").form('load', {mode: 'add', id: 0});
};
app.edit_schedule = function () {
    var row = $("#grid_schedule").datagrid('getSelected');
    if (row === null) {
        alert('Select schedule to Edit');
        return;
    }
    row['mode'] = 'edit';
    $("#form_schedule").form('load', row);
    $("#dlg_schedule").dialog('open').dialog('center').dialog('setTitle', 'Delete schedule');
};
app.del_schedule = function () {
    var row = $("#grid_schedule").datagrid('getSelected');
    if (row === null) {
        alert('Select schedule to Edit');
        return;
    }
    row['mode'] = 'delete';
    console.log(row);
    $("#form_schedule").form('load', row);
    $.messager.confirm('Confirm', 'Are you sure you want to delete record?', function (r) {
        if (r) {
            $('#form_schedule').form('submit', {
                url: 'scripts/save_schedule.php',
                onSubmit: function () {
                    // do some check
                    // return false to prevent submit;
                },
                success: function (data) {
                    console.log(data);
                    app.refresh_schedule();
                }
            });
        }
    });
};
app.save_schedule = function () {
    $('#form_schedule').form('submit', {
        url: 'scripts/save_schedule.php',
        onSubmit: function () {
            // do some check
            // return false to prevent submit;
        },
        success: function (data) {
            console.log(data);
            app.refresh_schedule();
        }
    });
};
app.refresh_schedule = function () {
    $("#grid_schedule").datagrid('reload');
};