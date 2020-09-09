<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>位置：</strong>管理员口令设置</div></div>

<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >

<table width="100%">

				<thead><tr><th colspan="2">超级管理员密码：登录账号 <font color=red>admin</font></th></tr></thead>

				<tbody>

                <form action="<?php echo $this->createUrl('HisSystem/modify',array('type'=>'super'));?>" method="post"> 

                 <tr><td class="rs" width="25%">超级管理员原密码：</td><td class="rs alignle"><input type="password" name="super1" /></td></tr>

                 <tr><td class="rs" width="25%">超级管理员新密码：</td><td class="rs alignle"><input type="password" name="super2" /></td></tr>

                 <tr><td class="rs" width="25%">重复超级管理新密码：</td><td class="rs alignle"><input type="password" name="super3" /></td></tr>

                 <tr><td class="rs" width="25%"></td><td class="rs alignle"><input type="submit" class="button"  value="确定修改超级密码" /></td></tr>

                 </form> 

             	</tbody>

       

       			<thead><tr><th colspan="2">普通管理员密码：登录账号 <font color=red>admin</font></th></tr></thead>

       			<tbody>

                <form action="<?php echo $this->createUrl('HisSystem/modify',array('type'=>'normal'));?>" method="post">     

                 <tr><td class="rs" width="25%">设置普通管理员登录密码：</td><td class="rs alignle"><input type="password" name="normal" /></td></tr>

                 <tr><td class="rs" width="25%"></td><td class="rs alignle"><input type="submit" class="button"  value="修改普通管理密码" /></td></tr>

                 </form> 

             	</tbody>

                

                <thead><tr><th colspan="2">后台浏览者登录密码：登录账号 <font color=red>test</font></th></tr></thead>

                <tbody>

                <form action="<?php echo $this->createUrl('HisSystem/modify',array('type'=>'test'));?>" method="post">  

                 <tr><td class="rs" width="25%">设置后台浏览用户登录密码：</td><td class="rs alignle"><input type="password" name="test" /></td></tr>

                 <tr><td class="rs" width="25%"></td><td class="rs alignle"><input type="submit" class="button"  value="修改后台浏览用户密码" /></td></tr>

                 </form> 

             	</tbody>

                

			</table>

</div></div></div>