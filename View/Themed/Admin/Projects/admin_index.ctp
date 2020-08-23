	<div class="panel panel-default">
		<div class="panel-heading">
			<h2><?php echo __('Dossiers'); ?>
				<small>
					<ul class="nav nav-pills pull-right clearfix">
						<li  class="active"><?php echo $this->Crud->navbar_link('add', 'Ajouter un dossier', null, 'list', null, false);?></li>
					</ul>
				</small>	
			</h2>
		</div>
	<div class="panel-body">
<?php //debug($projects);?>		
	<table class="table table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('title', 'Titre'); ?></th>
			<th><?php echo $this->Paginator->sort('creator', 'Createur'); ?></th>
			<th><?php echo $this->Paginator->sort('public'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($projects as $project): ?>
	<tr>
		<td><?php echo $this->Html->link($project['Project']['title'],  array('action' => 'view', $project['Project']['id'], 'admin'=>false)); ?>&nbsp;</td>
		<td><?php echo h($project['Creator']['name']); ?>&nbsp;</td>
		<td><?php echo ($project['Project']['public']==false) ? "Non" : "Oui"; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Lire'), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $project['Project']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $project['Project']['id']))); ?>
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
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Nouveau dossier'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('New Owner'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
	</ul>
</div>
</div>
