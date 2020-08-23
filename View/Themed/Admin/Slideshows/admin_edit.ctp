<?php echo $this->element('tinymce');?>
<div class="slideshows form">
<?php echo $this->Form->create('Slideshow'); ?>
	<fieldset>
		<legend><?php echo __('Edit Slideshow'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file']);
		echo $this->Form->hidden('image_dir');
		echo $this->Form->input('cours_id');
?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Effacer ce diaporama'), array('action' => 'delete', $this->Form->value('Slideshow.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Slideshow.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des diaporamas'), array('action' => 'index')); ?></li>
	</ul>
</div>
