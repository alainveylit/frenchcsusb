<div class="slideshows fatty">
	<h2><?php echo __('Slideshows'); ?></h2>
	<?php //debug($slideshows);?>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('cours_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Modifié'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($slideshows as $slideshow): ?>
	<tr>
		<td><?php echo $this->Html->link($slideshow['Cours']['titre'], array('controller'=>'cours', 'action'=>'view', $slideshow['Cours']['id'])); ?>&nbsp;</td>
		
		<td><span class="glyphicon glyphicon-film"> </span> <?php echo $this->Html->link($slideshow['Slideshow']['title'], 
			array('action' => 'view', 'admin'=>false, $slideshow['Slideshow']['id']), ['title'=>'Diaporama']); ?></td>
		<td><?php echo h($slideshow['Slideshow']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<span class="glyphicon glyphicon-search"> </span>
			<?php echo $this->Html->link(__('Detail'), array('action' => 'view', $slideshow['Slideshow']['id'])); ?>
			<span class="glyphicon glyphicon-edit"> </span>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $slideshow['Slideshow']['id'])); ?>
			<span class="glyphicon glyphicon-erase"> </span>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $slideshow['Slideshow']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $slideshow['Slideshow']['id']))); ?>
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
	</div>
</div>
* 	* */?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class=list-inline">
		<li><span class="glyphicon glyphicon-plus"> </span><?php echo $this->Html->link(__('Ajouter un diaporama'), array('action' => 'add')); ?></li>
	</ul>

</div>
</div>
