<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Personnage', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un Personnage'); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('profession');
		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator', array('value'=>$creator));
		echo $this->Form->input('focus');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Liste des Personnages'), array('action' => 'index')); ?></li>
	</ul>
</div>
