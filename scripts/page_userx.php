<?php 
require '../php_script/session.php';
?>
<div class="easyui-layout" fit='true'>
    <div data-options="region:'north'" style="height:45px;background: #E6E6E6;">
        <div style="float:left;padding-left: 10px;">
            <h3 style="padding:0px;margin:7px;font-size: 18px;">.: User Management :.</h3>               
        </div>
        <div style="position: absolute;right:15px;">            
            <a href="#" class="easyui-linkbutton easyui-tooltip" title='User Login' data-options="size:'large',plain:true,iconCls:'icon-user_gear'"><?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Unknow User' ?></a>
            <a href="#" class="easyui-linkbutton easyui-tooltip" title='Exit Web' data-options="size:'large',plain:true,iconCls:'icon-close'" onclick="util.exit_web();"></a>
        </div>
    </div>
    <div data-options="region:'center',border:false" style="padding:5px;">
        <table id="grid_user"></table>
        <div id="tb_user" style="padding:10px;">
            <input id="searchUser"></input>
<!--            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="add();">Add</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="edit();">Edit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-delete" plain="true" onclick="del();">Delete</a>-->
<!--            &nbsp;
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="active(1);">Aktif</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="active(0);">Not Aktif</a>
            -->
        </div>
        <div id="dialog_user" class="easyui-dialog" title="Add/Edit User" style="width:400px;height:400px;padding:15px;" iconCls="icon-save" closed="true" buttons="#dlg_user_btn">
            <form id="form_user" method="POST">
                <table>
                    <input id="id" name="id" type="hidden" >
                    <input id="mode" name="mode" type="hidden" >
                    <tr><td style="width: 100px;">Login</td><td><input name="login" required="true" class="easyui-textbox" ></td></tr>
                    <tr><td style="width: 100px;">Login</td><td><input name="login" required="true" class="easyui-textbox" ></td></tr>
                    <tr><td>Real Name</td><td><input name="real_name" required="true" class="easyui-textbox" ></td></tr>
                    <tr><td>Expired</td><td><input class="easyui-datebox" name="expired_date" data-options="showSeconds:false,formatter:util.formatdate,parser:util.parsedate" value="2010-10-25" ></td></tr>
                    <tr><td>Level</td><td><input class="easyui-combobox" name="level_id" data-options="valueField:'id',textField:'text',url:'php_script/combobox_user_level.php'" /></td></tr>
                    <tr><td>Reseller</td><td><input class="easyui-combobox" name="reseller_id" data-options="valueField:'id',textField:'text',url:'php_script/combobox_reseller.php'" /></td></tr>
                    <tr><td>Address</td><td><input name="address" class="easyui-textbox" ></td></tr>
                    <tr><td>Phone</td><td><input name="phone" class="easyui-textbox" ></td></tr>
                    <tr><td>Password</td><td><input type="passwordx" name="passwordx"  class='easyui-textbox' value=""/></td></tr>
                    <tr><td>Description</td><td><textarea name="description" class="easyui-textbox" rows='5' ></textarea></td></tr>
                </table>		
            </form>
        </div>
        <div id="dlg_user_btn">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" onclick="save();">Save</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:dialog.dialog('close')">Cancel</a>
        </div>
    </div>
</div>