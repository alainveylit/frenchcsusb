<div class="options form">
<?php echo $this->Form->create('Option'); ?>
	<fieldset>
		<legend><?php echo __('Add Option'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('index');
		echo $this->Form->input('correct_answer');
		echo $this->Form->input('category');
		echo $this->Form->input('quiz_id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('image_id');
		echo $this->Form->input('audio_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Options'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
	</ul>
</div>
