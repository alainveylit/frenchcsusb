<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Ressource', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Edit Ressource'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('titre');
		echo $this->Form->input('medium');
		echo $this->Form->input('focus');

		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 
		echo $this->Form->hidden('creator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ressource.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Ressource.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ressources'), array('action' => 'index')); ?></li>
	</ul>
</div>
