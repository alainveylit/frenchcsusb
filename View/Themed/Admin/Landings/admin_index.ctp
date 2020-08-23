<div class="fatty index">
	<h2><?php echo __('Landing pages'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('cour_id'); ?></th>
			<th><?php echo $this->Paginator->sort('professeur_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($landings as $landing): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($landing['Landing']['title'], array('controller' => 'landings', 'action' => 'view', $landing['Cours']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($landing['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $landing['Cours']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($landing['Professeur']['nom'], array('controller' => 'professeurs', 'action' => 'view', $landing['Professeur']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Details'), array('action' => 'view', $landing['Landing']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $landing['Landing']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $landing['Landing']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $landing['Landing']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<?php /*
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
	</div>*/?>
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nouvel atterissage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
