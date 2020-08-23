<?php echo $this->element('tinymce');?>

<?php
$landing_id = $this->request['data']['Landing']['id'];
?>

<div class="fatty form">
<?php echo $this->Form->create('Cour'); ?>
	<fieldset>
		<legend><?php echo __('Editer ce Cours'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ccode', ['label'=>'ccode', 'style'=>'width: 100px;', 'after'=>' <small><i>Code d\'acc&egrave;s au cours</i></small>']);
		echo $this->Form->input('titre', ['style'=>'width: 500px;']);
		echo $this->Form->input('banniere', ['style'=>'width: 700px;']);
		echo $this->Form->input('horaire', ['style'=>'width: 700px;']);
		echo $this->Form->input('salle', ['style'=>'width: 500px;']);
		echo $this->Form->hidden('professeur_id');
		echo $this->Form->hidden('creator', ['value'=>$creator]);	
		
		echo $this->Form->input('landing', ['value'=>$landing_id]);
		
		echo $this->Form->input('description');
		echo "<p>Le cahier d'exercices</p>";
		echo $this->Form->textarea('weekly_comments');
		echo $this->Form->input('active');

		//echo  $this->Form->input('slug');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Effacer'), 
		array('action' => 'delete', $this->Form->value('Cour.id')), array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Cour.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Mes Cours'), array('action' => 'index'), ['class'=>'list']); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Etudiants'), array('controller' => 'etudiants', 'action' => 'index'), ['class'=>'list']); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel Etudiant'), array('controller' => 'etudiants', 'action' => 'add'), ['class'=>'add']); ?> </li>
	</ul>
</div>
