<div class="container-fluid">
	<h2><?php echo __('My Available Images'); ?></h2>
	
	<div class="fatty cartouche">
		
	<table class="table table-bordered table-striped">
	<tr>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			
			<th><?php echo $this->Paginator->sort('width', 'Size'); ?></th>
			
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($images as $image): ?>
	<tr>
		
		<td><?php echo $this->Crud->view_image($image['Image']); ?>&nbsp;</td>
		
		<td><?php 
					$controller = Inflector::underscore(Inflector::pluralize($image['Image']['model']));
					echo $this->Crud->link_to_model(
									$image['Image']['model'], 
									$image['Image']['foreign_key'],
									$image['Image']['title']); ?>&nbsp;</td>
									
		<td><?php echo h($image['Image']['width']), ' x ', h($image['Image']['height']); ?>px</td>
		<?php //echo h($image['Image']['position']); echo h($image['Image']['alignment']); ?>
				
		<td><?php echo h($image['Image']['modified']); ?>&nbsp;</td>

		<td class="actions">
			<ul class="list-inline">
			<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $image['Image']['id'])); ?></li>
			<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', 'write'=>true, $image['Image']['id'])); ?></li>
			<li><?php echo $this->Form->postLink(__('Delete'), 
					array('action' => 'delete', $image['Image']['id']), null,
					 __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?>
			</li>
			 </ul>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pager">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
	</div>
</div>

