<div class="cours view">
<h2><?php echo __('Cour'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['titre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horaire'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['horaire']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Professeur'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['professeur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courriel'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['courriel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cour['User']['name'], array('controller' => 'users', 'action' => 'view', $cour['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banniere'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['banniere']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cour'), array('action' => 'edit', $cour['Cour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cour'), array('action' => 'delete', $cour['Cour']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cour['Cour']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cour'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Etudiant'), array('controller' => 'etudiants', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Etudiants'); ?></h3>
	<?php if (!empty($cour['Etudiant'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nom'); ?></th>
		<th><?php echo __('Prenom'); ?></th>
		<th><?php echo __('Courriel'); ?></th>
		<th><?php echo __('Class'); ?></th>
		<th><?php echo __('Major'); ?></th>
		<th><?php echo __('Classe Id'); ?></th>
		<th><?php echo __('Origine'); ?></th>
		<th><?php echo __('Enrolled'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Attendance'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Notify'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cour['Etudiant'] as $etudiant): ?>
		<tr>
			<td><?php echo $etudiant['id']; ?></td>
			<td><?php echo $etudiant['nom']; ?></td>
			<td><?php echo $etudiant['prenom']; ?></td>
			<td><?php echo $etudiant['courriel']; ?></td>
			<td><?php echo $etudiant['class']; ?></td>
			<td><?php echo $etudiant['major']; ?></td>
			<td><?php echo $etudiant['classe_id']; ?></td>
			<td><?php echo $etudiant['origine']; ?></td>
			<td><?php echo $etudiant['enrolled']; ?></td>
			<td><?php echo $etudiant['user_id']; ?></td>
			<td><?php echo $etudiant['attendance']; ?></td>
			<td><?php echo $etudiant['grade']; ?></td>
			<td><?php echo $etudiant['notify']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'etudiants', 'action' => 'view', $etudiant['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'etudiants', 'action' => 'edit', $etudiant['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'etudiants', 'action' => 'delete', $etudiant['id']), array('confirm' => __('Are you sure you want to delete # %s?', $etudiant['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Etudiant'), array('controller' => 'etudiants', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
