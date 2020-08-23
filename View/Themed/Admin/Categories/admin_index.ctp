<div class="categories index">
	<?php //debug($categories);?>
	<h2><?php echo __('Categories'); ?>
	<small class="pull-right"><?php echo $this->Crud->index_crud("categories");?></small>
	</h2>
	<table  class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('creator'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['title']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($category['Creator']['name'], array('controller' => 'users', 'action' => 'view', $category['Creator']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $category['Category']['id']), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
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
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Nouvelle Categorie'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>
