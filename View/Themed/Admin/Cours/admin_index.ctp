<div class="skinny index">
	<h2><?php echo __('Mes Cours'); ?>
		<small class="pull-right">
			<span class="glyphicon glyphicon-plus"> </span>
			<?php echo $this->Html->link(__('Ajouter un Cour'), array('action' => 'add'), ['class'=>'add']); ?></small>
	</h2>
	<?php //debug($cours);?>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('titre'); ?></th>
			<th><?php echo $this->Paginator->sort('horaire'); ?></th>
			<th><?php echo $this->Paginator->sort('professeur'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cours as $cour): ?>
	 	<tr>
			<td>
					<?php $active_class = $cour['Cour']['active'] ? 'checked' : 'unchecked';?>
					<a class="activate <?php echo $active_class;?>" href="javascript:" rel="<?php echo $cour['Cour']['id'];?>">
					<?php echo ($active_class=="checked") ? "Active" : "Inactive"?>
					</a> 
			</td>

		<td title="<?php echo h($cour['Cour']['banniere']); ?>" class="<?php $active_class == $cour['Cour']['active'] ? 'checked' : 'unchecked';?>">
		
		<?php echo $this->Html->link($cour['Cour']['titre'], array('controller'=>'cours', 'action'=>'view',$cour['Cour']['id']) ); ?>&nbsp;</td>
		<td><?php echo h($cour['Cour']['horaire']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($cour['Professeur']['nom']. ", ". $cour['Professeur']['prenom'],
			array('controller'=>'professeurs', 'action'=>'view', $cour['Professeur']['id']));?>
		</td>
		<td><?php echo $this->Time->niceShort($cour['Cour']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $cour['Cour']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), 
				array('action' => 'delete', $cour['Cour']['id']), 
				array('confirm' => __('Are you sure you want to delete # %s?', $cour['Cour']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php /*
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?> */?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Ajouter un Cour'), array('action' => 'add'), ['class'=>'add']); ?></li>
	</ul>
</div>
