<div class="fatty index">
	<h2><?php echo __('Devoirs'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('lesson_id'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($devoirs as $devoir): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($devoir['Lesson']['titre'], 
			array('controller' => 'lessons', 'action' => 'view', $devoir['Lesson']['id']), ['escape'=>false]); ?>
		</td>
		<td><?php echo $devoir['Devoir']['description']; ?>&nbsp;</td>
		<td><?php echo h($devoir['Devoir']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $devoir['Devoir']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $devoir['Devoir']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $devoir['Devoir']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $devoir['Devoir']['id']))); ?>
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
	<ul>
		<li><?php echo $this->Html->link(__('New Devoir'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lesson'), array('controller' => 'lessons', 'action' => 'add')); ?> </li>
	</ul>
</div>
