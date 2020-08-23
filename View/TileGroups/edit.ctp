<div class="tileGroups form">
<?php echo $this->Form->create('TileGroup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tile Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('header');
		echo $this->Form->input('columns');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TileGroup.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('TileGroup.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Tile Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tile'), array('controller' => 'tiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
