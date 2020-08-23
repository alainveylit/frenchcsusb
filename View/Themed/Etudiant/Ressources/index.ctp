<div class="fatty index">
	<h2><?php echo __('Ressources'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('focus'); ?></th>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
			<th><?php echo $this->Paginator->sort('medium'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ressources as $ressource): ?>
	<tr>
		<td><?php echo h($ressource['Ressource']['focus']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($ressource['Ressource']['titre'], array('action'=>'view', $ressource['Ressource']['id'])); ?>&nbsp;</td>
		<td><?php echo h($ressource['Ressource']['medium']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $ressource['Ressource']['id'])); ?>
			<?php if($User['role']=='Admin') :?>
				<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $ressource['Ressource']['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $ressource['Ressource']['id']), array(), __('Are you sure you want to delete # %s?', $ressource['Ressource']['id'])); ?>
			<?php endif;?>
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
		echo $this->Paginator->prev('< ' . __(' page precedente '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__(' page suivante ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ajouter une Ressource'), array('action' => 'add')); ?></li>
	</ul>
</div>
