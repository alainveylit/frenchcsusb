<div class="fatty index">
	<div>
	<h2><?php echo __('Resultats'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('test_id'); ?></th>
			<th><?php echo $this->Paginator->sort('etudiant_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('grade'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($resultats as $resultat): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($resultat['Test']['title'], array('controller' => 'tests', 'action' => 'view', $resultat['Test']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($resultat['Etudiant']['nom'], array('controller' => 'etudiants', 'action' => 'view', $resultat['Etudiant']['id'])); ?>
		</td>
		<td><?php echo h($resultat['Resultat']['created']); ?>&nbsp;</td>
		<td><?php echo h($resultat['Resultat']['grade']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resultat['Resultat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resultat['Resultat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resultat['Resultat']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $resultat['Resultat']['id']))); ?>
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
			<li><?php echo $this->Html->link(__('New Resultat'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Tests'), array('controller' => 'tests', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Test'), array('controller' => 'tests', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Etudiant'), array('controller' => 'etudiants', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
