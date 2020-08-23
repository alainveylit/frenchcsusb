<div class="fatty index">
	<h2><?php echo __('Etudiants'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nom'); ?></th>
			<th><?php echo $this->Paginator->sort('prenom'); ?></th>
			<th><?php echo $this->Paginator->sort('courriel'); ?></th>
			<th><?php echo $this->Paginator->sort('major'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($etudiants as $etudiant): ?>
	<tr>
		<td><?php echo h($etudiant['Etudiant']['id']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['nom']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['prenom']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['courriel']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['Etudiant']['major']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($etudiant['User']['name'], array('controller' => 'users', 'action' => 'view', $etudiant['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $etudiant['Etudiant']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $etudiant['Etudiant']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $etudiant['Etudiant']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $etudiant['Etudiant']['id']))); ?>
		</td>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ajouter un Etudiant'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des usagers'), array('controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
