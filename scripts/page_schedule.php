<table id="grid_schedule" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_schedule.php"  pagination="true"  toolbar='#tb_schedule' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="id" width="40" align="center">ID</th>             
            <th field="start_time" width="150" align="left">Date/Time</th>
            <th field="name" width="150" align="left">Channel</th>    
            <th field="url" width="150" align="left">URL</th>
            <th field="descr" width="120" align="left">Description</th>
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_schedule" style="padding: 3px 5px;">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_schedule();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_schedule();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_schedule();">Delete</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="app.refresh_schedule();">Refresh</a>&nbsp;|&nbsp;
</div>
<!-- Form GPS -->
<div id="dlg_schedule" class="easyui-dialog" title="Add Schedule" style="width:300px;height:250px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_schedule">
    <form id="form_schedule" method="POST" novalidate>
        <input type="hidden" name="id">
        <input type="hidden" name="mode">
        <table>
            <tr><td>Tanggal/Jam</td><td><input name="start_time" class="easyui-timespinner" data-options="showSeconds:true,height:30,width:'100%'"></td></tr>           
            <tr><td>Channel/</td><td><input name="channel_id" class="easyui-combobox" data-options="textField:'name',valueField:'id', url:'scripts/combobox_channel.php', height:30,width:'100%'"></td></tr>           
            <tr><td>Description</td><td><input  name="descr"  class="easyui-textbox" data-options="height:30,width:'100%'"/></td></tr>                    
        </table>	
    </form>
</div>
<div id="dlg_btn_schedule">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="app.save_schedule()">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_schedule').dialog('close');">Cancel</a>
</div>