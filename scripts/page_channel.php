<table id="grid_channel" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_channel.php"  pagination="true"  toolbar='#tb_channel' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="nomor" width="70" align="center">No.Urut</th>             
            <th field="lock" width="60" align="left" formatter="format_lock">Lock</th>
            <th field="category" width="100" align="left">Category</th>
            <th field="name" width="200" align="left">Channel</th>            
            <th field="url" width="350" align="left">URL</th>       
            <th field="descr" width="400" align="left">Last Info</th>
            
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_channel" style="padding: 3px 5px;">
<!--    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="app.search_channel($('#txt_channels').val());">Cari</a>&nbsp;|&nbsp;-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_channel();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_channel();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_channel();">Delete</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="app.lock_channel();">Lock</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="app.unlock_channel();">Unlock</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="app.update_channel();">Update Channel</a>
    
    
</div>
<!-- Form GPS -->
<div id="dlg_channel" class="easyui-dialog" title="Add Streaming" style="width:400px;height:300px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_channel">
    <form id="form_channel" method="POST" novalidate>
        <input type="hidden" name="id">
        <input type="hidden" name="mode">       
        <table>
            <tr><td>No Urut</td><td><input name="nomor" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td style="width: 100px;">Category</td><td style="width:250px">
                    <select name="category" class="easyui-combobox"  data-options="height:30,width:'100%'">
                        <option value="TV">TV</option>
                        <option value="VOD">VOD</option>
                        <option value="ADV">Advertising</option>
                    </select>
                </td></tr>
            <tr><td>Channel Name</td><td><input name="name" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>URL</td><td><input name="url" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            
<!--            <tr><td>Picture</td><td><input name="picture" class="easyui-filebox" data-options="height:30,width:'100%'"></td></tr>            -->


        </table>	
    </form>
</div>
<div id="dlg_btn_channel">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onClick="app.save_channel();">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#dlg_channel').dialog('close');">Cancel</a>
</div>