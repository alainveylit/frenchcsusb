<div class="fatty index">
	<h2><?php echo __('Personnages'); ?></h2>
	<table class="table table-striped">
	<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('focus'); ?></th>

				<th><?php echo $this->Paginator->sort('nom'); ?></th>
				<th><?php echo $this->Paginator->sort('profession'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($personnages as $personnage): ?>
		<tr>
			<td><?php echo h($personnage['Personnage']['focus']); ?>&nbsp;</td>
			<td><?php echo $this->Html->link($personnage['Personnage']['nom'], array('action' => 'view', $personnage['Personnage']['id'])); ?>&nbsp;</td>
			<td><?php echo h($personnage['Personnage']['profession']); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $personnage['Personnage']['id'])); ?>
				<?php if($User['role']=='Admin'):?>
					<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $personnage['Personnage']['id'])); ?>
					<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $personnage['Personnage']['id']), array(), __('Are you sure you want to delete # %s?', $personnage['Personnage']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<?php if($User['role']=='Admin'):?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Personnage'), array('action' => 'add')); ?></li>
	</ul>
</div>
<?php endif;?>

