<div id="maintitle"><div id="mainico"></div><div id="maintip"><strong>λ�ã�</strong>����Ա��������</div></div>

<div class="content-box role"><div class="content-box-content"><div class="tab-content default-tab" >

<table width="100%">

				<thead><tr><th colspan="2">��������Ա���룺��¼�˺� <font color=red>admin</font></th></tr></thead>

				<tbody>

                <form action="<?php echo $this->createUrl('HisSystem/modify',array('type'=>'super'));?>" method="post"> 

                 <tr><td class="rs" width="25%">��������Աԭ���룺</td><td class="rs alignle"><input type="password" name="super1" /></td></tr>

                 <tr><td class="rs" width="25%">��������Ա�����룺</td><td class="rs alignle"><input type="password" name="super2" /></td></tr>

                 <tr><td class="rs" width="25%">�ظ��������������룺</td><td class="rs alignle"><input type="password" name="super3" /></td></tr>

                 <tr><td class="rs" width="25%"></td><td class="rs alignle"><input type="submit" class="button"  value="ȷ���޸ĳ�������" /></td></tr>

                 </form> 

             	</tbody>

       

       			<thead><tr><th colspan="2">��ͨ����Ա���룺��¼�˺� <font color=red>admin</font></th></tr></thead>

       			<tbody>

                <form action="<?php echo $this->createUrl('HisSystem/modify',array('type'=>'normal'));?>" method="post">     

                 <tr><td class="rs" width="25%">������ͨ����Ա��¼���룺</td><td class="rs alignle"><input type="password" name="normal" /></td></tr>

                 <tr><td class="rs" width="25%"></td><td class="rs alignle"><input type="submit" class="button"  value="�޸���ͨ��������" /></td></tr>

                 </form> 

             	</tbody>

                

                <thead><tr><th colspan="2">��̨����ߵ�¼���룺��¼�˺� <font color=red>test</font></th></tr></thead>

                <tbody>

                <form action="<?php echo $this->createUrl('HisSystem/modify',array('type'=>'test'));?>" method="post">  

                 <tr><td class="rs" width="25%">���ú�̨����û���¼���룺</td><td class="rs alignle"><input type="password" name="test" /></td></tr>

                 <tr><td class="rs" width="25%"></td><td class="rs alignle"><input type="submit" class="button"  value="�޸ĺ�̨����û�����" /></td></tr>

                 </form> 

             	</tbody>

                

			</table>

</div></div></div>