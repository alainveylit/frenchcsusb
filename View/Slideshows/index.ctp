<div class="fatty index">
	<h2><?php echo __('Slideshows'); ?></h2>
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($slideshows as $slideshow): ?>
	<tr>
		<td><?php echo h($slideshow['Slideshow']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($slideshow['Slideshow']['title'], array('action'=>'start',$slideshow['Slideshow']['id'] )); ?>&nbsp;</td>
		<td><?php echo h($slideshow['Slideshow']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lancer'), array('action' => 'view', $slideshow['Slideshow']['id'])); ?>
			<?php if($User['role']!='Admin') :?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $slideshow['Slideshow']['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $slideshow['Slideshow']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $slideshow['Slideshow']['id']))); ?>
			<?php endif;?>
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
		<li><?php echo $this->Html->link(__('Les diaporamas'), array('action' => 'index')); ?></li>
	</ul>
</div>
