<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php //debug($quiz_title);?>
<?php echo $this->Form->create('Question', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Add a new Question to the Quiz: '), $quiz_title; ?></legend>
	<?php
		echo $this->Form->input('text');
		echo $this->Form->input('note', array('style'=>'width: 700px'));
		echo $this->Form->hidden('index', array('value'=>$index));
		echo $this->Form->hidden('quiz_id', array('value'=>$quiz_id));
			?>
			<div class="cartouche bordered">
	<?php echo $this->Form->input('image', ['type' => 'file']); ?>
    <?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>
</div>

	</fieldset>
	
		<table class="cartouche">
			<caption>Options</caption>
			<tr>
				<td><?php echo $this->Form->input('Option_1');?></td>
				<td>
				&nbsp;Correct answer: <?php echo $this->Form->checkbox('Option_1_correct', array('label'=>'correct answer'));?>
				</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('Option_2');?></td>
				<td>
				&nbsp;Correct answer: <?php echo $this->Form->checkbox('Option_2_correct', array('label'=>'correct answer'));?>
				</td>
			</tr>
			<tr>
				<td><?php echo $this->Form->input('Option_3');?></td>
				<td>
				&nbsp;Correct answer: <?php echo $this->Form->checkbox('Option_3_correct', array('label'=>'correct answer'));?>
				</td>
			</tr>
			
	</table>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Options'), array('controller' => 'options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Option'), array('controller' => 'options', 'action' => 'add')); ?> </li>
	</ul>
</div>
