<div class="accueils index">
	<h2><?php echo __('Accueils'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th><?php echo $this->Paginator->sort('image_dir'); ?></th>
			<th><?php echo $this->Paginator->sort('image_size'); ?></th>
			<th><?php echo $this->Paginator->sort('creator'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($accueils as $accueil): ?>
	<tr>
		<td><?php echo h($accueil['Accueil']['id']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['title']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['description']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['image']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['image_dir']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['image_size']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['creator']); ?>&nbsp;</td>
		<td><?php echo h($accueil['Accueil']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accueil['Accueil']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accueil['Accueil']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accueil['Accueil']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $accueil['Accueil']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Accueil'), array('action' => 'add')); ?></li>
	</ul>
</div>
