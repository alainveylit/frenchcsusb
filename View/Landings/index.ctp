<div class="landings index">
	<h2><?php echo __('Landings'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('cours_id'); ?></th>
			<th><?php echo $this->Paginator->sort('professeur_id'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($landings as $landing): ?>
	<tr>
		<td><?php echo h($landing['Landing']['id']); ?>&nbsp;</td>
		<td><?php echo h($landing['Landing']['title']); ?>&nbsp;</td>
		<td><?php echo h($landing['Landing']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($landing['Cours']['id'], array('controller' => 'cours', 'action' => 'view', $landing['Cours']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($landing['Professeur']['nom'], array('controller' => 'professeurs', 'action' => 'view', $landing['Professeur']['id'])); ?>
		</td>
		<td><?php echo h($landing['Landing']['login']); ?>&nbsp;</td>
		<td><?php echo h($landing['Landing']['modified']); ?>&nbsp;</td>
		<td><?php echo h($landing['Landing']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $landing['Landing']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $landing['Landing']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $landing['Landing']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $landing['Landing']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Landing'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cours'), array('controller' => 'cours', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Professeur'), array('controller' => 'professeurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
