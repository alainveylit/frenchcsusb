<div class="fatty index">
	<div>
	<h3><?php echo __('Tuiles'); ?>
	<small class="pull-right">				
		<a href="javascript:" id="save-order" class=" green-gradient">Sauvegarder l'ordre des tuiles</a>
	</small>
	</h3>
	<table class="table table-striped grid" id="sort" >
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('cours_id'); ?></th>
			<th><?php echo $this->Paginator->sort('professeur_id'); ?></th>
			<th><?php echo $this->Paginator->sort('actif', 'Active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tuiles as $tuile): ?>
	<tr id="<?php echo $tuile['Tuile']['id'];?>">
		<td><?php echo $this->Html->link($tuile['Tuile']['title'], array('action'=>'view',$tuile['Tuile']['id'])); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tuile['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $tuile['Cours']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($tuile['Professeur']['nom'], array('controller' => 'professeurs', 'action' => 'view', $tuile['Professeur']['id'])); ?>
		</td>
		<td><?php echo ($tuile['Tuile']['actif']) ? $this->Html->image('/css/images/check.png') : "&nbsp;" ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tuile['Tuile']['id']), ['class'=>'edit']); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tuile['Tuile']['id']), array('class'=>'erase', 'confirm' => __('Are you sure you want to delete # %s?', $tuile['Tuile']['id']))); ?>
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
	?>
	</div>
	* */?>
</div>
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Nouvelle Tuile'), array('action' => 'add'), ['class'=>'add']); ?></li>
			<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index'), ['class'=>'list']); ?> </li>
		</ul>
	</div>
</div>


<script>
	
	$('document').ready( function() {
					
		<?php echo $this->element('sort_js', array('controller'=>'tuiles'));?>
	
	});
</script>

