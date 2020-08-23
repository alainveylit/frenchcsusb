<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<?php //debug($cours);?>
<?php echo $this->Form->create('Lesson'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une Leçon'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('jour', array('type'=>'text', 'style'=>'width:250px', 'label'=>'Date:'));
		echo $this->Form->input('synopsis');
	
		echo $this->Form->input('civilisation');
		echo $this->Form->input('grammaire');
		echo $this->Form->input('lecture');
		echo $this->Form->input('idiomes');
		echo $this->Form->input('dictee');
		echo $this->Form->hidden('cours_id', ['value'=>$cours['id']]);
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('Liste des Leçons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>

<script>
	
	
	$(function() {
		$( "#LessonJour" ).datepicker({
			defaultDate: '2016-09-21',
			dateFormat: 'yy-mm-dd', 
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			}
		});
				
	});
</script>

