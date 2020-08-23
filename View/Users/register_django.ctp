<div class="users form">
<?php echo $this->Form->create('User');?>
<?php $roles=array('Admin'=>'Admin','Registered'=>'Registered', 'User'=>'User'); ?>

	<fieldset>
 		<p><legend><?php echo __('Add User');?></legend></p>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('name');
		//echo $this->Form->input('password');
                echo $this->Form->input('plain_password', array('type'=>'text'));
 
		echo $this->Form->input('email');
		//echo $this->Form->input('role', array('typer'=>'select', 'options'=>$roles));
		//echo $this->Form->input('sponsor');
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action'=>'index'));?></li>
	</ul>
</div>
