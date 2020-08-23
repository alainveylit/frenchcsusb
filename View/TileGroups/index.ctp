<div class="tileGroups index">
	<h2><?php echo __('Tile Groups'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('header'); ?></th>
			<th><?php echo $this->Paginator->sort('columns'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tileGroups as $tileGroup): ?>
	<tr>
		<td><?php echo h($tileGroup['TileGroup']['id']); ?>&nbsp;</td>
		<td><?php echo h($tileGroup['TileGroup']['title']); ?>&nbsp;</td>
		<td><?php echo h($tileGroup['TileGroup']['header']); ?>&nbsp;</td>
		<td><?php echo h($tileGroup['TileGroup']['columns']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tileGroup['TileGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tileGroup['TileGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tileGroup['TileGroup']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tileGroup['TileGroup']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Tile Group'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tile'), array('controller' => 'tiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
