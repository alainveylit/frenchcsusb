<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Quiz', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Add Quiz'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		//echo $this->Form->input('language');
		echo $this->Form->input('type');
		//echo $this->Form->input('difficulty');
		echo $this->Form->input('lesson_id');
		echo $this->Form->input('category_id');
		echo $this->Form->hidden('creator', array('value'=>$creator));
		?>
    <?php echo $this->Form->input('image', ['type' => 'file']); ?>
    <?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>

	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Quizzes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
