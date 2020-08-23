<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php //debug($quiz);
$quiz_type=$quiz['Quiz']['type'];
?>
<?php echo $this->Form->create('Question', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une question à cet exercice: '), $quiz['Quiz']['title']; ?></legend>
	<?php
		echo $this->Form->hidden('quiz_id', array('value'=>$quiz_id));
		echo $this->Form->hidden('index', array('value'=>$index));
	
		if($quiz_type=='Questions') {
			echo $this->Form->input('text');
			echo $this->Form->input('note', array('style'=>'width: 700px'));
		} else {
			echo $this->Form->input('note', array('label'=>'Réponse', 'style'=>'width: 700px'));
			echo $this->Form->input('text', array('label'=>'Définition'));		
		}
		
		echo $this->Form->hidden('Quiz.type', array('value'=>$quiz_type));		
	?>
	

	</fieldset>
	
	<?php if($quiz_type=='Questions'):?>
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
	<?php endif;?>
	<fieldset><legend>Image</legend>
			<div class="cartouche bordered">
				<?php echo $this->Form->url('image_url', ['type'=>'url']);?>
				<?php echo $this->Form->input('image', ['type' => 'file']); ?>
				<?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>
			</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Liste des Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>
