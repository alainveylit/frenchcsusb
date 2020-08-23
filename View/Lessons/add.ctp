<?php echo $this->element('tinymce');?>
<div class="lessons form">
<?php echo $this->Form->create('Lesson'); ?>
	<fieldset>
		<legend><?php echo __('Add Lesson'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('jour');
		echo $this->Form->input('grammaire');
		echo $this->Form->input('lecture');
		echo $this->Form->input('idiomes');
		echo $this->Form->input('dictee');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Lessons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>
