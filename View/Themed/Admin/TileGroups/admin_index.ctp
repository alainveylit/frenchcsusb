<div class="tileGroups index">
	<h2><?php echo __('Groupes de Tuiles'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('model'); ?></th>
			
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
		<td><?php echo h($categories[$tileGroup['TileGroup']['model']]); ?>&nbsp;</td>
		<td><?php echo h($tileGroup['TileGroup']['title']); ?>&nbsp;</td>
		<td><?php echo h($tileGroup['TileGroup']['header']); ?>&nbsp;</td>
		<td><?php echo h($tileGroup['TileGroup']['columns']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Aperçu'), array('action' => 'view', $tileGroup['TileGroup']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $tileGroup['TileGroup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $tileGroup['TileGroup']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tileGroup['TileGroup']['id']))); ?>
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
		echo $this->Paginator->prev('< ' . __(' page precedente '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' &nbsp |  &nbsp'));
		echo $this->Paginator->next(__(' page suivante ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Nouveau Groupe'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter une Tuile'), array('controller' => 'tiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
