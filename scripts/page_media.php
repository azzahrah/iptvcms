<table id="grid_media" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_media.php"  pagination="true"  toolbar='#tb_media' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="nomor" width="70" align="center">Id</th>             
            <th field="descr" width="200" align="left">Description</th>            
            <th field="file" width="350" align="left">File Name</th>       
        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_media" style="padding: 3px 5px;">
<!--    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="app.search_media($('#txt_medias').val());">Cari</a>&nbsp;|&nbsp;-->
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_media();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_media();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_media();">Delete</a>&nbsp;|&nbsp;
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="app.refresh_media();">Refresh</a>    
</div>
<!-- Form GPS -->
<div id="dlg_media" class="easyui-dialog" title="Add Media" style="width:400px;height:300px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_media">
    <form id="form_media" method="POST" novalidate enctype="multipart/form-data">
        <input type="hidden" name="id">
        <input type="hidden" name="mode">       
        <table>
            <tr><td style="width: 100px;">Category</td><td style="width:250px">
                    <select name="category" class="easyui-combobox"  data-options="height:30,width:'100%'">
                        <option value="video">Video</option>
                    </select>
                </td></tr>
            <tr><td>Description</td><td><input name="descr" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>File</td><td><input name="file" class="easyui-filebox" data-options="height:30,width:'100%'"></td></tr>                     
        </table>	
    </form>
</div>
<div id="dlg_btn_media">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onClick="app.save_media();">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#dlg_media').dialog('close');">Cancel</a>
</div>