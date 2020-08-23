<div class="users form">
	<?php echo $this->Form->create('User', array('url'=>'edit_role', $this->request->data['User']['id']));?>

		<fieldset>
			<p><legend><?php echo __('Edit User');?></legend></p>
		
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('name');
			echo $this->Form->input('email');
			echo $this->Form->input('active');		
			echo $this->Form->input('role'); 
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
