<table id="grid_channel" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_channel.php"  pagination="true"  toolbar='#tb_channel' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="icon" width="40" align="center">ID</th>             
            <th field="main_display" width="150" align="left">Main Display</th>
            <th field="category" width="150" align="left">Category</th>
            <th field="name" width="150" align="left">Channel</th>
            <th field="picture" width="120" align="center">Picture</th>                                        
            <th field="sid" width="120" align="center">SID</th>                                        
            <th field="descr" width="120" align="left">Description</th>
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_channel" style="padding: 3px 5px;">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="app.search_channel($('#txt_channels').val());">Cari</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_channel();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_channel();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_channel();">Delete</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="app.set_main_display();">Set Main Display</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" plain="true" onclick="app.release_main_display();">Release Display</a>
    
    
</div>
<!-- Form GPS -->
<div id="dlg_channel" class="easyui-dialog" title="Add Streaming" style="width:400px;height:300px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_channel">
    <form id="form_channel" method="POST" novalidate>
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
<div id="dlg_btn_channel">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="app.save_channel()">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_channel').dialog('close');">Cancel</a>
</div>