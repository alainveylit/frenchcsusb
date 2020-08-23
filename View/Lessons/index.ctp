<div class="fatty index">
	<div class="fatty cartouche">
	<h2><?php echo __('Liste des Leçons'); ?></h2>
	<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
			<th><?php echo $this->Paginator->sort('jour'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($lessons as $lesson): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($lesson['Lesson']['titre'], array('action'=>'view', $lesson['Lesson']['id']),  array('escape' => false)); ?>&nbsp;</td>
		<td>
		<?php 
			$englishdate = $this->Time->format($lesson['Lesson']['jour'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
		&nbsp;</td>
		<td class="actions">
			<?php if($User['role']=='Admin'):?>
				<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', 'admin'=>true, $lesson['Lesson']['id']), ['class'=>'edit']); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', 'admin'=>true, $lesson['Lesson']['id']), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?>
			<?php else:?>
						<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $lesson['Lesson']['id'])); ?>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<p>
</div>

	<?php if($User['role']=='Admin'):?>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Nouvelle Lesson'), array('action' => 'add', 'admin'=>true)); ?></li>
				<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add', 'admin'=>true)); ?> </li>
			</ul>
		</div>
	<?php endif;?>
</div>
