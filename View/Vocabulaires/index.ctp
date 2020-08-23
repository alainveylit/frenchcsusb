<div class="fatty index">
	<h2 classe="centered"><?php echo __('Pages de Vocabulaire'); ?>
	<small class="pull-right">
	<?php echo $this->Crud->index_crud('vocabulaires');?>
	</small>
	</h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('cours'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($vocabulaires as $vocabulaire): ?>
	<tr>
		<td><?php echo $this->Html->link($vocabulaire['Vocabulaire']['title'], array('action' => 'view', $vocabulaire['Vocabulaire']['id'])); ?>&nbsp;</td>
		<?php /*
		<td>
			<?php echo $this->Html->link($vocabulaire['Professeur']['nom'], array('controller' => 'professeurs', 'action' => 'view', $vocabulaire['Professeur']['id'])); ?>
		</td>*/?>
		<td>
			<?php echo $this->Html->link($vocabulaire['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $vocabulaire['Cours']['id'])); ?>
		</td>

		
		<td><?php echo h($vocabulaire['Vocabulaire']['modified']); ?>&nbsp;</td>
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
	<div class="pager centered">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	* */?>
</div>
