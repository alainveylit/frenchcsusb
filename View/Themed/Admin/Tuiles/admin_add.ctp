<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<?php //debug($professeur);?>
	<h2>
		<?php echo $this->Crud->professor_name($professeur);?></h2>
	<div>
<?php echo $this->Form->create('Tuile'); ?>
	<fieldset>
		<legend><?php echo __('Add Tuile'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('cours_id');
		echo $this->Form->hidden('professeur_id', ['value'=>$professeur['id'], 'type'=>'text']);
		echo $this->Form->input('index', ['value'=>$index, 'type'=>'text']);
		echo $this->Form->input('couleur_id');
		echo $this->Form->input('full_row');
		echo $this->Form->input('actif');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		</ul>
	</div>
</div>
