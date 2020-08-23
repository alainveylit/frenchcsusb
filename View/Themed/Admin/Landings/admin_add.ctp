<?php echo $this->element('tinymce');?>
<div class="fatty form">
	
	<?php //debug($cours);?>
	<h3>Cours: <?php echo $cours['Cours']['titre'];?> 
		<small class="pull-right">Professeur: 
			<?php echo $this->Crud->professor_view($professeur);?>
	</small>
	
	
	</h3>

	<?php echo $this->Form->create("Landing"); ?>
	<fieldset>
		<legend><?php echo __("Ajouter une page d'arriv&eacute;e pour ce cours:" ); ?></legend>
	<?php
		echo $this->Form->input('title', ['label'=>'Titre']);
		echo $this->Form->input('description');
		echo $this->Form->hidden('cours_id');
		echo $this->Form->hidden('professeur_id');
		echo $this->Form->input('syllabus');

		//echo $this->Form->input('login');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Mes Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
	</ul>
</div>
