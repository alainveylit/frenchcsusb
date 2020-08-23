<div class="stories index">
	<h2 classe="centered"><?php echo __('Pages de Story'); ?>
		<small class="pull-right">
	<?php echo $this->Crud->index_crud('stories');?>
	</small>

	</h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('cours'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stories as $story): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($story['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $story['Cours']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link($story['Story']['title'], array('action' => 'view', $story['Story']['id'])); ?>&nbsp;</td>		
		<td><?php echo h($story['Story']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $story['Story']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $story['Story']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $story['Story']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $story['Story']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	
	<?php /*
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging centered">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	* */?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Nouvelle histoire'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
