<?php echo $this->element('tinymce');?>
<?php $media = array('Film'=>'Film', 'Video'=>'Video', 'WEB'=>'WEB', 'Télévision'=>'Télévision', 'Wikipedia'=>'Wikipedia');?>
<?php $foci = array('Civilisation'=>'Civilisation', 'Grammaire'=>'Grammaire', 'Géographie'=>'Géographie', 'Culture'=>'Culture');?>
<div class="fatty form">
<?php echo $this->Form->create('Ressource', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Add Ressource'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('medium', ['options'=>$media]);
		echo $this->Form->input('focus', ['options'=>$foci]);

		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator', array('value'=>$creator));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Liste des ressources'), array('action' => 'index')); ?></li>
	</ul>
</div>
