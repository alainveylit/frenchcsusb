<div class="fatty index">
	<h2 classe="centered"><?php echo __('Histoires'); ?>
	<small class="pull-right">
	<?php echo $this->Crud->index_crud('stories');?>
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
	<?php foreach ($stories as $story): ?>
	<tr>
		<td><?php echo $this->Html->link($story['Story']['title'], array('action' => 'view', $story['Story']['id'])); ?>&nbsp;</td>
		<?php /*
		<td>
			<?php echo $this->Html->link($story['Professeur']['nom'], array('controller' => 'professeurs', 'action' => 'view', $story['Professeur']['id'])); ?>
		</td>*/?>
		<td>
			<?php echo $this->Html->link($story['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $story['Cours']['id'])); ?>
		</td>

		
		<td><?php echo h($story['Story']['modified']); ?>&nbsp;</td>
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
