<div class="fatty view">
<h2><?php echo __('Tile Group'); ?>: <?php echo h($tileGroup['TileGroup']['title']); ?></h2>
<h3>Header: <?php echo h($tileGroup['TileGroup']['header']); ?></h3>
<p>Number of columns: <?php echo h($tileGroup['TileGroup']['columns']); ?></p>


<div class="related">
	<h3><?php echo __('Related Tiles'); ?></h3>
	<?php if (!empty($tileGroup['Tile'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Ajax'); ?></th>
		<th><?php echo __('Creator'); ?></th>
		<th><?php echo __('Index'); ?></th>
		<th><?php echo __('Couleur Id'); ?></th>
		<th><?php echo __('Full Row'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tileGroup['Tile'] as $tile): ?>
		<tr>
			<td><?php echo $tile['title']; ?></td>
			<td><?php echo $tile['ajax']; ?></td>
			<td><?php echo $tile['creator']; ?></td>
			<td><?php echo $tile['index']; ?></td>
			<td><?php echo $tile['couleur_id']; ?></td>
			<td><?php echo ($tile['full_row']) ? "Yes" : "No"; ?></td>
			<td><?php echo $tile['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tiles', 'action' => 'view', $tile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tiles', 'action' => 'edit', $tile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tiles', 'action' => 'delete', $tile['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tile['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Edit Tile Group'), array('action' => 'edit', $tileGroup['TileGroup']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Tile Group'), array('action' => 'delete', $tileGroup['TileGroup']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tileGroup['TileGroup']['id']))); ?> </li>
				<li><?php echo $this->Html->link(__('List Tile Groups'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Tile Group'), array('action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Tiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Tile'), array('controller' => 'tiles', 'action' => 'add')); ?> </li>
			</ul>
		</div>

	</div>
</div>
