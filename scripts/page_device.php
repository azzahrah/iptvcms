<table id="grid_device" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_device.php"  pagination="true"  toolbar='#tb_device' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>          
            <th field="mac" width="150" align="left">Mac</th>
            <th field="name" width="150" align="left">Device Name</th>
            <th field="ip" width="150" align="left">IP</th>     
            <th field="descr" width="400" align="left">Descr</th>
            <th field="last_active" width="220" align="left">Last Active</th>
            
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_device" style="padding: 3px 5px;">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_device();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_device();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_device();">Delete</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="app.refresh_device();">Refresh</a>
</div>
<!-- Form GPS -->
<div id="dlg_device" class="easyui-dialog" title="Add Streaming" style="width:400px;height:300px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_device">
    <form id="form_device" method="POST" novalidate>
        <input type="hidden" name="id">
        <input type="hidden" name="mode">   
        <table>
            <tr><td style="width: 100px;">Category</td><td style="width:250px">
                    <select name="category" class="easyui-combobox" name="dept"  data-options="height:30,width:'100%'">
                        <option value="Android Box">Android Box</option>
                        <option value="Android Phone">Android Phone</option>
                    </select>
                </td></tr>
            <tr><td>Name</td><td><input name="name" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>IP Address</td><td><input name="ip" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>Mac Address</td><td><input name="mac" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>Descriptions</td><td><input  name="descr"  class="easyui-textbox" data-options="multiline:true,height:60,width:'100%'"/></td></tr>            

        </table>	
    </form>
</div>
<div id="dlg_btn_device">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="app.save_device()">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_device').dialog('close');">Cancel</a>
</div>