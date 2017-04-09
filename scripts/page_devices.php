<table id="grid_devices" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_devices.php"  pagination="true"  toolbar='#tb_devices' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="icon" width="40" align="center">ID</th>             
            <th field="device_name" width="150" align="left">Device Name</th>
            <th field="ip" width="150" align="left">IP</th>                                                    
            <th field="last_connect" width="120" align="left">Last Connect</th>
            <th field="last_channel" width="120" align="left">Last Channel</th>
            <th field="last_info" width="400" align="left">Last Info</th>
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_devices" style="padding: 3px 5px;">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="app.search_devices($('#txt_devices').val());">Cari</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_devices();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_devices();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_devices();">Delete</a>
</div>
<!-- Form GPS -->
<div id="dlg_devices" class="easyui-dialog" title="Add Streaming" style="width:400px;height:300px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_channel">
    <form id="form_devices" method="POST" novalidate>
        <table>
            <tr><td style="width: 100px;">Category</td><td style="width:250px">
                    <select name="category" class="easyui-combobox" name="dept"  data-options="height:30,width:'100%'">
                        <option value="TV">TV</option>
                        <option value="VOD">VOD</option>
                    </select>
                </td></tr>
            <tr><td>Channel/Streaming</td><td><input name="name" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>URL</td><td><input name="url" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>Descriptions</td><td><input  name="descr"  class="easyui-textbox" data-options="height:30,width:'100%'"/></td></tr>            
            <tr><td>Picture</td><td><input name="picture" class="easyui-filebox" data-options="height:30,width:'100%'"></td></tr>            


        </table>	
    </form>
</div>
<div id="dlg_btn_devices">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="app.save_devices()">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_channel').dialog('close');">Cancel</a>
</div>