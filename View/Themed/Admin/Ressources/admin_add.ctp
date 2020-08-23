<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Ressource', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Add Ressource'); ?></legend>
	<?php
		echo $this->Form->input('titre');
		echo $this->Form->input('medium');
		echo $this->Form->input('cours_id');
		echo $this->Form->input('focus');
		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator', array('value'=>$creator));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ressources'), array('action' => 'index')); ?></li>
	</ul>
</div>
