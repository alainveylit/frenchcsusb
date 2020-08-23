<?php echo $this->element('tinymce');?>
<div class="slideshows form">
<?php echo $this->Form->create('Slideshow', ['type'=>'file']); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un diaporama'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file']);
		echo $this->Form->hidden('image_dir');
		echo $this->Form->input('cours_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Liste des diaporamas'), array('action' => 'index')); ?></li>
	</ul>
</div>
