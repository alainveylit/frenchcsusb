<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Devoir'); ?>
	<fieldset>
		<legend><?php echo __('Edit Devoir'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('lesson_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Devoir.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Devoir.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Devoirs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add')); ?> </li>
	</ul>
</div>
