<div class="fatty index">
<div>
	<h2><?php echo __('Chansons'); ?></h2>
		<table class="table table-striped">
			<thead>
			<tr>
					<th><?php echo $this->Paginator->sort('auteur'); ?></th>
					<th><?php echo $this->Paginator->sort('titre'); ?></th>
					<th><?php echo $this->Paginator->sort('created', 'Ajoutee'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($chansons as $chanson): ?>
			<tr>
				<td><?php echo $chanson['Chanson']['auteur']; ?>&nbsp;</td>
				<td><?php echo $this->Html->link($chanson['Chanson']['titre'], array('action' => 'view', $chanson['Chanson']['id'])); ?>&nbsp;</td>
				<td><?php echo h($chanson['Chanson']['created']); ?> </td>
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
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' | '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</div>
	
	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline"
			<li><?php echo $this->Html->link(__('Ajouter une chanson'), array('action' => 'add', 'admin'=>true)); ?></li>
		</ul>*/?>
	</div>
</div>
