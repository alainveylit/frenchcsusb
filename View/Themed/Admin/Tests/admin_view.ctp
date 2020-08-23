<div class="fatty view">
<?php //debug($test);?>
<div>
	<h2><?php echo __('Test'); ?>: <?php echo $test['Test']['title']; ?></h2>
	<hr>
	<dl class="dl-horizontal">
		<dt><?php echo __('Document'); ?></dt>
		<dd>
			<?php echo $this->Html->link($test['Document']['title'], array('controller' => 'documents', 'action' => 'view', $test['Document']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Createur'); ?></dt>
		<dd>
			<?php echo $this->Html->link($test['Document']['Creator']['name'],
				array('controller' => 'profiles', 'action' => 'view', 'admin'=>false, $test['Document']['Creator']['profile_id'])); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo h($test['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Test Date'); ?></dt>
		<dd>
			<?php echo $this->Time->niceShort($test['Test']['test_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lesson'); ?></dt>
		<dd>
			<?php echo $this->Html->link(html_entity_decode($test['Lesson']['titre']), array('controller' => 'lessons', 'action' => 'view', $test['Lesson']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->niceShort($test['Test']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	
	<h3><?php echo __('Resultats'); ?></h3>
	<?php if (!empty($test['Resultat'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Etudiant'); ?></th>
		<th><?php echo __('Taken'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($test['Resultat'] as $resultat): ?>
		<tr>
			<td><?php echo $this->Html->link($resultat['Etudiant']['nom'] . ", " . $resultat['Etudiant']['prenom'], array('controller'=>'etudiants', 'action'=>'view', $resultat['Etudiant']['id'])); ?></td>
			<td><?php echo $resultat['taken']; ?></td>
			<td><?php echo $resultat['grade']; ?></td>
			<td><?php echo $this->Time->niceShort($resultat['created']); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resultats', 'action' => 'view', $resultat['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resultats', 'action' => 'edit', $resultat['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resultats', 'action' => 'delete', $resultat['id']), array('confirm' => __('Are you sure you want to delete # %s?', $resultat['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Edit Test'), array('action' => 'edit', $test['Test']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Test'), array('action' => 'delete', $test['Test']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $test['Test']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Test'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lessons'), array('controller' => 'lessons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Deploy list'), array('controller' => 'resultats', 'action' => 'deploy', $test['Test']['id'])); ?> </li>
		</ul>
	</div>
</div>
</div>
