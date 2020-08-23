<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<div><?php echo $this->Form->create('Tuile'); ?>
	<h3>Cours: <?php echo $cour['titre'];?>
	<small class="pull-right"><?php echo $this->Crud->professor_view($professeur);?></small>
	</h3>
	<fieldset>
		<legend><?php echo __('Editer cette tuile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description', ['label'=>'Texte']);
		echo $this->Form->input('cours_id');
		//echo $this->Form->input('professeur_id');
		//echo $this->Form->input('index');
		echo $this->Form->input('model_id', ['label'=>'Modèle']);
		echo $this->Form->input('couleur_id');
		echo $this->Form->input('full_row', ['label'=>'largeur maximale']);

		echo $this->Form->input('actif', ['label'=>'Active']);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Tuile.id')), array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Tuile.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('action' => 'index'), ['class'=>'list']); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index'), ['class'=>'list']); ?> </li>
	</ul>
</div>
</div>
