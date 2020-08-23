<style>
.inset { max-width: 150px; }
</style>
<div class="fatty index">
	<?php //debug($quizzes);?>
	<h2><?php echo __('Exercices'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('category_id', 'Categorie'); ?></th>
			<th><?php echo $this->Paginator->sort('title', 'Titre'); ?></th>
						<th><?php echo $this->Paginator->sort('type'); ?></th>

			<th><?php echo $this->Paginator->sort('lesson_id', 'Leçon'); ?></th>
			
			
			<?php //echo $this->Paginator->sort('difficulty', 'Niveau'); ?>
			<?php if($User['role']=='Admin'):?>
			<th class="actions"><?php echo __('Actions'); ?></th>
			<?php endif;?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($quizzes as $quiz): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($quiz['Category']['title'],
			array('controller' => 'categories', 'action' => 'view', $quiz['Category']['id'])); ?>
		</td>
		<td><?php echo $this->Html->link($quiz['Quiz']['title'], array('action'=>'view', $quiz['Quiz']['id'])); ?>&nbsp;</td>
		<td><?php echo $quiz['Quiz']['type']; ?>&nbsp;</td>
		<td><?php echo $quiz['Lesson']['titre']; ?>&nbsp;</td>
		<?php //echo h($quiz['Quiz']['difficulty']); ?>
		<?php if($User['role']=='Admin'):?>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $quiz['Quiz']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $quiz['Quiz']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $quiz['Quiz']['id']), array(), __('Are you sure you want to delete # %s?', $quiz['Quiz']['id'])); ?>
		</td>
		<?php endif;?>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	/*echo*/ $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('prec.'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('suiv.') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

<?php if($User['role']=='Admin'):?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Ajouter un exercice'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List des Questions'), array('controller' => 'questions', 'action' => 'index')); ?> </li>
	</ul>
</div>
<?php endif;?>
