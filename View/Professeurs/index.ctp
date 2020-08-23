<div class="fatty index">
	<?php //debug($professeurs);?>
	<h2><?php echo __('Professeurs'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('diplome'); ?></th>
			<th><?php echo $this->Paginator->sort('created', 'inscrit'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($professeurs as $professeur): ?>
	<tr>
		<td><?php echo $this->Crud->professor_view($professeur['Professeur']); ?>&nbsp;</td>
		<td><?php echo h($professeur['Professeur']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($professeur['Professeur']['diplome']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($professeur['Professeur']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Voir'), array('action' => 'view', $professeur['Professeur']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $professeur['Professeur']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $professeur['Professeur']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $professeur['Professeur']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('Nouveau Professeur'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau Cours'), array('controller' => 'cours', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel Etudiant'), array('controller' => 'etudiants', 'action' => 'add')); ?> </li>
	</ul>
</div>
