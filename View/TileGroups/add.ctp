<div class="tileGroups form">
<?php echo $this->Form->create('TileGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Tile Group'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('header');
		echo $this->Form->input('columns');
		echo $this->Form->input('index', ['value'=>$index]);
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tile Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tile'), array('controller' => 'tiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
