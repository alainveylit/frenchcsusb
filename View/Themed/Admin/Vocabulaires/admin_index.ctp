<div class="vocabulaires index">
	<h2 classe="centered"><?php echo __('Pages de Vocabulaire'); ?>
		<small class="pull-right">
	<?php echo $this->Crud->index_crud('vocabulaires');?>
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
	<?php foreach ($vocabulaires as $vocabulaire): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($vocabulaire['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $vocabulaire['Cours']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link($vocabulaire['Vocabulaire']['title'], array('action' => 'view', $vocabulaire['Vocabulaire']['id'])); ?>&nbsp;</td>		
		<td><?php echo h($vocabulaire['Vocabulaire']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $vocabulaire['Vocabulaire']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $vocabulaire['Vocabulaire']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $vocabulaire['Vocabulaire']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $vocabulaire['Vocabulaire']['id']))); ?>
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
	<div class="paging centered">
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
		<li><?php echo $this->Html->link(__('Nouvelle page de Vocabulaire'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
