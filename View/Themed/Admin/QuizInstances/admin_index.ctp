<div class="fatty index">
	<h2><?php echo __('Quiz Instances'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('points'); ?></th>
			<th><?php echo $this->Paginator->sort('quiz_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('score'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($quizInstances as $quizInstance): ?>
	<tr>
		<td><?php echo h($quizInstance['QuizInstance']['id']); ?>&nbsp;</td>
		<td><?php echo h($quizInstance['QuizInstance']['points']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($quizInstance['Quiz']['title'], array('controller' => 'quizzes', 'action' => 'view', $quizInstance['Quiz']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($quizInstance['User']['name'], array('controller' => 'users', 'action' => 'view', $quizInstance['User']['id'])); ?>
		</td>
		<td><?php echo h($quizInstance['QuizInstance']['score']); ?>&nbsp;</td>
		<td><?php echo h($quizInstance['QuizInstance']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quizInstance['QuizInstance']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quizInstance['QuizInstance']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quizInstance['QuizInstance']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $quizInstance['QuizInstance']['id']))); ?>
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
		echo $this->Paginator->prev('< ' . __('precedent '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__(' suivant') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Liste des  exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
	</ul>
</div>
