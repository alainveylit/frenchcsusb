<?php echo $this->element('tinymce');?>
<div class="fatty form">
	
	<?php 
	$Cours = $this->Session->read('Cours');
	/*debug($this->request->data);*/?>

<?php echo $this->Form->create('Lesson'); ?>
	<fieldset>
		<legend>Cours: <?php echo $Cours['titre'];?> <small class="pull-right"><?php echo __('Editer cette leçon'); ?></small></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre');
		//echo $this->Form->input('jour', array('label'=>'Jour et heure'));
		echo $this->Form->input('jour', array('type'=>'text', 'style'=>'width:250px', 'label'=>'Date:'));
		echo $this->Form->input('synopsis');

		echo $this->Form->input('active');
	
		echo '<hr>';

		
		if(!isset($field) || $field=='civilisation')
			echo $this->Form->input('civilisation');
		
		if(!isset($field) || $field=='grammaire')
			echo $this->Form->input('grammaire');
			
		if(!isset($field) || $field=='lecture')
			echo $this->Form->input('lecture');
			
		if(!isset($field) || $field=='idiomes')
			echo $this->Form->input('idiomes');

		if(!isset($field) || $field=='dictee')			
			echo $this->Form->input('dictee', array('label'=>'Dictée'));
			
		echo $this->Form->input('Quiz', ['label'=>'Exercices']);
		echo $this->Form->input('Slideshow', ['label'=>'Diaporama']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Effacer cette leçon'), array('action' => 'delete', $this->Form->value('Lesson.id')), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $this->Form->value('Lesson.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Leçons'), array('action' => 'index'), ['class'=>'list']); ?></li>
		<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index'), ['class'=>'list']); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add'), ['class'=>'add']); ?> </li>
	</ul>
</div>

<script>
	
	
	$(function() {
		$( "#LessonJour" ).datepicker({
			defaultDate: '2017-01-21',
			dateFormat: 'yy-mm-dd', 
			changeMonth: true,
			changeYear: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			}
		});
				
	});
</script>
