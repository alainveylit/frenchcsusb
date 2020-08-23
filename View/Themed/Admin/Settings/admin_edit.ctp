<div class="settings form">
<?php echo $this->Form->create('Setting'); ?>
	<fieldset>
		<legend><?php echo __('Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre');
		echo $this->Form->input('horaire');
		echo $this->Form->input('professeur');
		echo $this->Form->input('courriel');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
		echo $this->Form->input('banniere');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Setting.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Setting.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Settings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
