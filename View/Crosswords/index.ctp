<div class="fatty index">
	<h2><?php echo __('Mots croisés'); ?>
		<small class="pull-right">
			<?php echo $this->Crud->index_crud('crosswords');?>
		</small>
	</h2>
	<?php //debug($crosswords);?>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('cours_id'); ?></th>
			<th><?php echo $this->Paginator->sort('creator'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($crosswords as $crossword): ?>
	<tr>
		<td><?php echo h($crossword['Crossword']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($crossword['Crossword']['title'], array('action' => 'view', $crossword['Crossword']['id'], 'admin'=>false)); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($crossword['Cour']['titre'], array('controller' => 'cours', 'action' => 'view', $crossword['Cour']['id'])); ?>
		</td>
		<td><?php echo h($crossword['Creator']['name']); ?>&nbsp;</td>
		<td><?php echo h($crossword['Crossword']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $crossword['Crossword']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $crossword['Crossword']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $crossword['Crossword']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crossword['Crossword']['id']))); ?>
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
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Nouveau problem'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
