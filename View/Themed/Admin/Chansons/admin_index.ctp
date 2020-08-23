<div class="fatty index">
<div>
	<h2>
		<?php echo __('Chansons'); ?>
			<small class="pull-right"><?php echo $this->Html->link(__('Ajouter une Chanson'), array('action' => 'add'), ['class'=>'add']); ?></small>
	</h2>
<h4>		<small class="pull-right">				
		<a href="javascript:" id="save-order" class=" green-gradient">Sauvegarder l'ordre des chansons</a>
	</small>
</h4>
		<table class="table table-striped" id="sort">
			<thead>
				
			<tr>
					<th><?php echo $this->Paginator->sort('cours'); ?></th>
					<th><?php echo $this->Paginator->sort('titre'); ?></th>
					<th><?php echo $this->Paginator->sort('auteur'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($chansons as $chanson): ?>
			<tr id="<?php echo $chanson['Chanson']['id'];?>">
				<td><?php echo $this->Html->link($chanson['Cours']['titre'], 
				array('action' => 'view', $chanson['Cours']['id'])); ?>&nbsp;</td>
			
				<td><?php echo $this->Html->link($chanson['Chanson']['titre'], array('action' => 'view', $chanson['Chanson']['id'])); ?>&nbsp;</td>
				<td><?php echo h($chanson['Chanson']['auteur']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Voir'), array('action' => 'view', $chanson['Chanson']['id'])); ?>
					<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $chanson['Chanson']['id'])); ?>
					<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $chanson['Chanson']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $chanson['Chanson']['id']))); ?>
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
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>*/?>
	
	</div>
	
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline"
			<li><?php echo $this->Html->link(__('Ajouter une chanson'), array('action' => 'add')); ?></li>
		</ul>
	</div>

<script>
	
	$('document').ready( function() {
					
		<?php echo $this->element('sort_js', array('controller'=>'chansons'));?>
	
	});
</script>
