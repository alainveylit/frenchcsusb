<div class="options index">
	<h2><?php echo __('Options'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('correct_answer'); ?></th>
			<th><?php echo $this->Paginator->sort('question_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($options as $option): ?>
	<tr>
		<td><?php echo h($option['Option']['id']); ?>&nbsp;</td>
		<td><?php echo h($option['Option']['title']); ?>&nbsp;</td>
		<td><?php echo h($option['Option']['correct_answer']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($option['Question']['text'], array('controller' => 'questions', 'action' => 'view', $option['Question']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $option['Option']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $option['Option']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $option['Option']['id']), array(), __('Are you sure you want to delete # %s?', $option['Option']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
	</ul>
</div>
