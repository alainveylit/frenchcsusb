<div class="accueils form">
<?php echo $this->Form->create('Accueil'); ?>
	<fieldset>
		<legend><?php echo __('Add Accueil'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('image');
		echo $this->Form->input('image_dir');
		echo $this->Form->input('image_size');
		echo $this->Form->input('creator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Accueils'), array('action' => 'index')); ?></li>
	</ul>
</div>
