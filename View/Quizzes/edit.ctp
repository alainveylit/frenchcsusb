<?php echo $this->element('tinymce');?>
<div class="fatty form">
	
<?php echo $this->Form->create('Quiz',  ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Edit Quiz'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('type');
		//echo $this->Form->input('difficulty');
		//echo $this->Form->input('discipline');
		echo $this->Form->input('lesson_id');

		echo $this->Form->input('category_id');
		echo $this->Form->hidden('creator');
		?>
		<?php echo $this->Form->input('image', ['type' => 'file']); ?>
		<?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>

		<?php echo $this->Html->link('/files/quiz/image/' . $this->Form->value('image_dir') . DS . $this->Form->value('image'));?>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>

<?php if($User['role']=='Admin') :?>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">

			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Quiz.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Quiz.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Quizzes'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Question'), array('controller' => 'questions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
<?php endif;?>

