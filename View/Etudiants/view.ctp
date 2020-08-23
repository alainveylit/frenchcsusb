<div class="fatty view">
	<?php //debug($etudiant);?>
	<h2><?php echo __('Etudiant'); ?>
		<small class="pull-right">
		<span class="glyphicon glyphicon-envelope"> </span>
		<?php echo $this->Html->link('Contacter cet étudiant', array('action'=>'courriel', $etudiant['Etudiant']['id']));?>
		</small>

	</h2>
	<div class="cartouche bordered">
		<dl class="dl-horizontal">
			<dt><?php echo __('Nom'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['nom']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Prenom'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['prenom']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Classe'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['class']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Major'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['major']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Enrolled'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['enrolled']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('User'); ?></dt>
			<dd>
				<?php echo $this->Html->link($etudiant['User']['name'], 
					array('controller' => 'users', 'action' => 'view', $etudiant['User']['id'])); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Attendance'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['attendance']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Final Grade'); ?></dt>
			<dd>
				<?php echo h($etudiant['Etudiant']['grade']); ?>
				&nbsp;
			</dd>
		</dl>
	</div>

	<h3>Tests</h3>
	<table class="table table-striped">
		<tr><th>Title</th><th>Category</th><th>Grade</th><th>Date</th><th>Lesson</th></tr>
		<?php foreach($etudiant['Resultat'] as $resultat) :?>
			<tr>
				<td><?php echo $this->Html->link($resultat['Test']['title'], array('controller'=>'tests', 'action'=>'view', $resultat['Test']['id'])); ?></td>
				<td><?php echo h($resultat['Test']['category']); ?></td>
				<td><?php echo h($resultat['grade']); ?></td>
				<td><?php echo h($resultat['created']); ?></td>
				<td><?php echo $this->Html->link($resultat['Test']['lesson_id'], 
				array('controller' => 'lessons', 'action' => 'view', $resultat['Test']['lesson_id'])); ?></td>
			</tr>
		<?php endforeach;?>
	</table>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $etudiant['Etudiant']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer cet Etudiant'), array('action' => 'delete', $etudiant['Etudiant']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $etudiant['Etudiant']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Etudiants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvel Etudiant'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter un resultat'), array('controller'=>'resultats', 'action' => 'add', $etudiant['Etudiant']['id'])); ?></li>
	</ul>
</div>
</div>
