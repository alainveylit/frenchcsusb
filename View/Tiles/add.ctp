<?php echo $this->element('tinymce'); ?>
<div class="fatty form">
	<div>
<?php echo $this->Form->create('Tile'); ?>
	<fieldset>
		<legend><?php echo __('Add Tile'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('title_link');
		echo $this->Form->input('description');
		echo $this->Form->input('tile_group_id',  ['options'=>$tile_groups]);
		echo $this->Form->input('element');
		echo $this->Form->input('ajax');
		echo $this->Form->input('creator', ['value'=>$creator]);
		echo $this->Form->input('index', ['value'=>$index]);
		echo $this->Form->input('couleur_id');
		echo $this->Form->input('full_row');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Tiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Couleurs'), array('controller' => 'couleurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couleur'), array('controller' => 'couleurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
