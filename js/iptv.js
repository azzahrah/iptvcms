var ip="ws://192.168.1.110:7070/websocket";
var ws;
var app={
    
};
app.init=function(){
    ws=new WebSocket(ip);
    ws.onOpen=function(){
        
    };
    ws.onClose=function(){
        
    };
    ws.onError=function(){
        
    };   
    
    //init tree
    
    $("#treeMenu").tree({
        onClick:function(node){
            console.log(node);
        }
    });
};
app.add_channel=function(){
    $("#dlg_channel").dialog('open').dialog('center').dialog('setTitle','Add Channel');
};
app.edit_channel=function(){
    var row=$("#tbl_channel").datagrid('getSelected');
    if(row===null){
        alert('Select Channel to Edit');
        return;
    }
    $("#form_channel").form('load',row);
    $("#dlg_channel").dialog('center').dialog('show').dialog('setTitle','Edit Channel');
};
app.del_channel=function(){
    var row=$("#tbl_channel").datagrid('getSelected');
    if(row===null){
        alert('Select Channel to Edit');
        return;
    }
    $("#form_channel").form('load',row);
    $("#dlg_channel").dialog('center').dialog('show').dialog('setTitle','Delete Channel');
};
app.search_channel=function(){
    
};