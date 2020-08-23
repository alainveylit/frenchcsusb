<div class="profiles form">
<?php echo $this->Form->create('Profile'); ?>
	<fieldset>
		<legend><?php echo __('Add Profile'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('occupation');
		echo $this->Form->input('instrument');
		echo $this->Form->input('birthday');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('region');
		echo $this->Form->input('ZIP');
		echo $this->Form->input('country');
		echo $this->Form->input('phone');
		echo $this->Form->input('picture_id');
		echo $this->Form->input('avatar');
		echo $this->Form->input('user_id');
		echo $this->Form->input('facebook');
		echo $this->Form->input('skype');
		echo $this->Form->input('WEB');
		echo $this->Form->input('notes');
		echo $this->Form->input('notify');
		echo $this->Form->input('public');
		echo $this->Form->input('donations');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Donations'), array('controller' => 'donations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Donation'), array('controller' => 'donations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instruments'), array('controller' => 'instruments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instrument'), array('controller' => 'instruments', 'action' => 'add')); ?> </li>
	</ul>
</div>
