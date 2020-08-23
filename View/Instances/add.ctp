<div class="instances form">
<?php echo $this->Form->create('Instance'); ?>
	<fieldset>
		<legend><?php echo __('Add Instance'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('quiz_id');
		echo $this->Form->input('creator');
		echo $this->Form->input('password');
		echo $this->Form->input('expires');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Instances'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
