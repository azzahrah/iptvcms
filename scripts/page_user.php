<?php require_once("session.php"); ?>
<table id="grid_user" class="easyui-datagrid" style="width:600px;height:250px"  url="scripts/data_user.php"  pagination="true"  toolbar='#tb_user' rownumbers="true" fitColumns="false" sortName="install_date" sortOrder="desc" singleSelect="true" fit="true">
    <thead>
        <tr>
            <th field="status" width="100" align="left" formatter="format_activenonactive">Status</th>             
            <th field="real_name" width="200" align="left">Nama</th>
            <th field="login" width="150" align="left">Login</th>
            <th field="level" width="150" align="left">Level User</th>

        </tr>
    </thead>
</table
<!-- Toolbar -->
<div id="tb_user" style="padding: 3px 5px;">
    <!--    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true"  onclick="app.search_channel($('#txt_channels').val());">Cari</a>&nbsp;|&nbsp;-->
    <?php if($_SESSION['user_level']=='admin'){ ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="app.add_user();">Add</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="app.edit_user();">Edit</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="app.del_user();">Delete</a>
    <?php } ?>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="app.refresh_user();">Refresh</a>

</div>
<!-- Form GPS -->
<div id="dlg_user" class="easyui-dialog" title="Add User" style="width:400px;height:300px;padding:15px;overflow: hidden;" iconCls="icon-save" closed="true" buttons="#dlg_btn_user">
    <form id="form_user" method="POST" novalidate>
         <input type="hidden" name="id">
        <input type="hidden" name="mode">
        <table>
            <tr><td style="width: 100px;">Level</td><td style="width:250px">
                    <select name="level" class="easyui-combobox" data-options="height:30,width:'100%'">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </td></tr>
            <tr><td>Nama</td><td><input name="real_name" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>Login</td><td><input name="login" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
            <tr><td>Password</td><td><input name="password2" class="easyui-textbox" data-options="height:30,width:'100%'"></td></tr>           
        </table>	
    </form>
</div>
<div id="dlg_btn_user">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="app.save_user()">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg_user').dialog('close');">Cancel</a>
</div>