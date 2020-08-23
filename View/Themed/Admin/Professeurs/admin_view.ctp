<div class="fatty view">
<h2><?php echo __('Professeur'); ?>

	<small class="pull-right">
	<span class="glyphicon glyphicon-envelope"> </span>
	<?php echo $this->Html->link(	'Contacter ce professeur', array('controller'=>'profiles', 'action'=>'contact', $professeur['Creator']['profile_id']));?>
	</small>

</h2>
<?php  //debug($professeur);?>
	<dl class="dl-horizontal">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo $this->Crud->professor_name($professeur['Professeur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courriel'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['courriel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Diplome'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['diplome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adresse'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['adresse']); ?>
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['phone']); ?>
		</dd>	
		<dt><?php echo __('Profil personnel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($professeur['Creator']['name'], 
						array('controller' => 'profiles', 'action' => 'view', 
						'admin'=>false, 
						$professeur['Creator']['profile_id'])); ?>
		</dd>
		<dt><?php echo __('Inscription'); ?></dt>
		<dd>
			<?php echo $this->Time->niceShort($professeur['Professeur']['created']); ?>
		</dd>
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['last_login']); ?>
		</dd>

	</dl>
</div>

<div class="fatty related">
	<h3><?php echo __('Cours enseignes'); ?>
	<small class="pull-right"><?php echo $this->Html->link(__('Ajouter un Cours'), array('controller' => 'cours', 'action' => 'add')); ?> </small>
	</h3>
	<?php if (!empty($professeur['Cours'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Titre'); ?></th>
		<th><?php echo __('Horaire'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($professeur['Cours'] as $cours): ?>
		<tr>
			<td><?php echo $cours['id']; ?></td>
			<td><?php echo $cours['titre']; ?></td>
			<td><?php echo $cours['horaire']; ?></td>
			<td><?php echo $cours['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Voir'), array('controller' => 'cours', 'action' => 'view', $cours['id'])); ?>
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'cours', 'action' => 'edit', $cours['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'cours', 'action' => 'delete', $cours['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cours['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>

<?php /*
<div class="fatty related">
	<h3><?php echo __('Etudiants inscrits'); ?></h3>
	<?php if (!empty($professeur['Etudiant'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Courriel'); ?></th>
		<th><?php echo __('Class'); ?></th>
		<th><?php echo __('Major'); ?></th>
		<th><?php echo __('Enrolled'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($professeur['Etudiant'] as $etudiant): ?>
		<tr>
			<td><?php echo $etudiant['nom'], ", ", $etudiant['prenom']; ?></td>
			<td><?php echo $etudiant['courriel']; ?></td>
			<td><?php echo $etudiant['class']; ?></td>
			<td><?php echo $etudiant['major']; ?></td>
			<td><?php echo $etudiant['enrolled']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Lire'), array('controller' => 'etudiants', 'action' => 'view', $etudiant['id'])); ?>
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'etudiants', 'action' => 'edit', $etudiant['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'etudiants', 'action' => 'delete', $etudiant['id']), array('confirm' => __('Are you sure you want to delete # %s?', $etudiant['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
*/?>
</div>
