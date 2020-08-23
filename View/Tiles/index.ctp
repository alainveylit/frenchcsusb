<div class="fatty index">
	<h2><?php echo __('Tiles'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('tile_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ajax'); ?></th>
			<th><?php echo $this->Paginator->sort('creator'); ?></th>
			<th><?php echo $this->Paginator->sort('index'); ?></th>
			<th><?php echo $this->Paginator->sort('couleur_id', 'Color'); ?></th>
			<th><?php echo $this->Paginator->sort('full_row'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tiles as $tile): ?>
	<tr>
		<td><?php echo h($tile['Tile']['title']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($tile['TileGroup']['title'], array('controller'=>'tile_groups', 'action'=>'view', $tile['TileGroup']['id'])); ?>&nbsp;</td>
		<td><?php echo h($tile['Tile']['ajax']); ?>&nbsp;</td>
		<td><?php echo h($tile['Tile']['creator']); ?>&nbsp;</td>
		<td><?php echo h($tile['Tile']['index']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tile['Couleur']['title'], array('controller' => 'couleurs', 'action' => 'view', $tile['Couleur']['id'])); ?>
		</td>
		<td><?php echo h($tile['Tile']['full_row']); ?>&nbsp;</td>
		<td><?php echo h($tile['Tile']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tile['Tile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tile['Tile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tile['Tile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tile['Tile']['id']))); ?>
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
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('New Tile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Couleurs'), array('controller' => 'couleurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Couleur'), array('controller' => 'couleurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
