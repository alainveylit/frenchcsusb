<div class="users form">
<?php echo $this->Form->create('User', array('url'=>'edit_role', $this->request->data['User']['id']));?>

<?php //debug($this->request->data);?>
	<fieldset>
 		<p><legend><?php echo __('Edit User Role');?></legend></p>
	<?php //$roles=array('Admin'=>'Admin','Contributor'=>'Contributor','Basic'=>'Basic','Extended'=>'Extended'); ?>
	
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('active');
		
		//echo $this->Form->input('notify', array('label'=>'Send e-mail notifications'));        
        echo $this->Form->input('role'); //, array('type'=>'select', 'options'=>$role));
		echo $this->Form->input('licenses');
 
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
