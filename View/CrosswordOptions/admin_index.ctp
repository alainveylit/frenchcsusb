<div class="fatty index">
	<h2><?php echo __('Crossword Options'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('clue'); ?></th>
			<th><?php echo $this->Paginator->sort('crossword_id'); ?></th>
			<th><?php echo $this->Paginator->sort('answer'); ?></th>
			<th><?php echo $this->Paginator->sort('position'); ?></th>
			<th><?php echo $this->Paginator->sort('orientation'); ?></th>
			<th><?php echo $this->Paginator->sort('startx'); ?></th>
			<th><?php echo $this->Paginator->sort('starty'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($crosswordOptions as $crosswordOption): ?>
	<tr>
		<td><?php echo h($crosswordOption['CrosswordOption']['id']); ?>&nbsp;</td>
		<td><?php echo h($crosswordOption['CrosswordOption']['clue']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($crosswordOption['Crossword']['title'], array('controller' => 'crosswords', 'action' => 'view', $crosswordOption['Crossword']['id'])); ?>
		</td>
		<td><?php echo h($crosswordOption['CrosswordOption']['answer']); ?>&nbsp;</td>
		<td><?php echo h($crosswordOption['CrosswordOption']['position']); ?>&nbsp;</td>
		<td><?php echo h($crosswordOption['CrosswordOption']['orientation']); ?>&nbsp;</td>
		<td><?php echo h($crosswordOption['CrosswordOption']['startx']); ?>&nbsp;</td>
		<td><?php echo h($crosswordOption['CrosswordOption']['starty']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $crosswordOption['CrosswordOption']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $crosswordOption['CrosswordOption']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $crosswordOption['CrosswordOption']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crosswordOption['CrosswordOption']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Crossword Option'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Crosswords'), array('controller' => 'crosswords', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Crossword'), array('controller' => 'crosswords', 'action' => 'add')); ?> </li>
	</ul>
</div>
