<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<p><legend><?php echo __('Edit User');?></legend></p>
<?php $roles=array('Admin'=>'Admin','Contributor'=>'Contributor','Basic'=>'Basic','Extended'=>'Extended'); ?>
	<?php
		echo $this->Form->input('id');
		//echo $this->Form->input('username');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('notify', array('label'=>'Send e-mail notifications'));
                //echo $this->Form->input('role', array('typer'=>'select', 'options'=>$roles));
                //echo $this->Form->input('sponsor');
 
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Delete'), array('action'=>'delete', $this->Form->value('User.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action'=>'index'));?></li>
	</ul>
</div>
