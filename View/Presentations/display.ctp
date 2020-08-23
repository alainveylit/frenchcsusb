<?php //debug($presentations);?>
<div class="fatty index">
	<h2><?php echo __('Mes Présentations'); ?>
	<small class="pull-right">	
		Focus: <?php echo $focus;?>
			<?php echo $this->Html->link(__('Ajouter une Présentation'), array('action' => 'add')); ?>
		</small>
	
	</h2>
	<table class="table table-striped">
	<thead>
		<tr>
			<th>Titre</th>
			<th>Media</th>
			<th>Public</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($presentations as $presentation): ?>
	<tr>
		<td><?php echo $this->Html->link($presentation['Presentation']['titre'], array('action'=>'view', $presentation['Presentation']['id'])); ?>&nbsp;</td>
		<td><?php echo h($presentation['Presentation']['medium']); ?>&nbsp;</td>
		<td><?php echo $presentation['Presentation']['public'] ? "Oui" : "Non";?></td>
		<td class="actions">
			<?php //echo $this->Html->link(__('Lire'), array('action' => 'view', $presentation['Presentation']['id'])); ?>
			
			<?php if($User['id']==$presentation['Presentation']['creator']) :?>
				<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $presentation['Presentation']['id']), ['class'=>'edit']); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $presentation['Presentation']['id']), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $presentation['Presentation']['id'])); ?>
			<?php endif;?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} de {:pages}, montrant {:current} presentations sur un total de {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __(' page precedente '), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__(' page suivante ') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>	
