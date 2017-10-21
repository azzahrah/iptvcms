<table id="grid_runningtext" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_runningtext.php"  pagination="true"  toolbar='#tb_runningtext' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="id" width="40" align="center">ID</th>             
            <th field="visible" width="70" align="left" formatter="format_yesno">Default</th>
            <th field="runningtext" width="800" align="left">Running Text</th>
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_runningtext" style="padding: 3px 5px;">
<!--    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="app.search_channel($('#txt_channels').val());">Cari</a>&nbsp;|&nbsp;-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_runningtext();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_runningtext();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_runningtext();">Delete</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.default_runningtext();">Default</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="app.update_runningtext();">Update Runningtext</a>
<!--    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="app.hide_runningtext();">Hide Runningtext</a>-->
    
    
    
</div>
<!-- Form GPS -->
<div id="dlg_runningtext" class="easyui-dialog" title="Add Streaming" style="width:350px;height:230px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_runningtext">
    <form id="form_runningtext" method="POST" novalidate>
         <input type="hidden" name="id">
        <input type="hidden" name="mode">   
        <table>
            <tr><td>Info Running Text</td></tr>
            <tr><td><input name="runningtext" class="easyui-textbox" data-options="multiline:true,height:100,width:300"></td></tr>           

        </table>	
    </form>
</div>
<div id="dlg_btn_runningtext">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="app.save_runningtext()">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_runningtext').dialog('close');">Cancel</a>
</div>