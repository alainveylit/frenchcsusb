<div class="captioned grenat">
	<h4>Mes &eacute;tudiants<small class="pull-right">
		<?php echo $this->Html->link('Contacter tous les etudiants', array('controller'=>'etudiants', 'action'=>'contact'), ['class'=>'mail']);?>
		</small></h4>
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
		<td><?php echo h($etudiant['id']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['nom']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['prenom']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['courriel']); ?>&nbsp;</td>
		<td><?php echo h($etudiant['major']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('controller'=>'etudiants', 'action' => 'view', $etudiant['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('controller'=>'etudiants', 'action' => 'edit', $etudiant['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('controller'=>'etudiants', 'action' => 'delete', $etudiant['id']), 
							array('confirm' => __('Are you sure you want to delete # %s?', $etudiant['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
</div>
