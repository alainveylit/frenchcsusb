<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<h2 >Vue etudiant</h2>
<?php echo $this->Form->create('Lesson'); ?>
	<fieldset>
		<legend><?php echo __('Editer cette leçon'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre');
		echo $this->Form->input('jour');
		echo $this->Form->input('grammaire');
		echo $this->Form->input('lecture');
		echo $this->Form->input('idiomes');
		echo $this->Form->input('dictee', array('label'=>'Dictée'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Lesson.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Lesson.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>
