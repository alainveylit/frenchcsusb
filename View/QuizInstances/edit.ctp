<div class="quizInstances form">
<?php echo $this->Form->create('QuizInstance'); ?>
	<fieldset>
		<legend><?php echo __('Edit Quiz Instance'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('points');
		echo $this->Form->input('quiz_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('score');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuizInstance.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('QuizInstance.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Quiz Instances'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
