<div class="captioned blue">
	<h4><?php echo __('Liste des Leçons'); ?>
	<small class="pull-right"><?php echo $this->Html->link('Ajouter une lecon', array('controller'=>'lessons', 'action'=>'add'), ['class'=>'add']);?></small>
	</h4>
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
			<?php echo $this->Html->link($lesson['titre'], array('controller'=>'lessons', 'action'=>'view', $lesson['id']),  array('escape' => false)); ?>&nbsp;</td>
		<td>
		<?php $englishdate = $this->Time->format($lesson['jour'],  '%A %e %B %Y à %H:%M');

		echo $this->Crud->display_french_date($englishdate);
		 ?>
		&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('controller'=>'lessons', 'action' => 'view', $lesson['id'])); ?>
			<?php if($User['role']=='Admin'):?>
				<?php echo $this->Html->link(__('Editer'), array('controller'=>'lessons', 'action' => 'edit', $lesson['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('controller'=>'lessons', 'action' => 'delete', $lesson['id']), array(), __('Are you sure you want to delete # %s?', $lesson['id'])); ?>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
</div>
