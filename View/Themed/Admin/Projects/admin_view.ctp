<div class="panel panel-default">

		<div class="panel-heading">
			<h2><?php echo __('Dossier'); ?>			
				<small class="pull-right"><?php echo $this->Crud->view_crud('Project', $project['Project']);?></small>
			</h2>
		</div>
		
<div class="panel-body">
	<h2><?php echo h($project['Project']['title']); ?></h2>
				<small>
					<ul class="nav nav-pills pull-right clearfix">
						<li  class="active">
						<?php echo $this->Html->link(__('Add a Document'), array('controller' => 'documents', 'action' => 'add', $project['Project']['id'])); ?> 
						</li>
						<li  class="active">
						<?php echo $this->Html->link(__('Preview'), array('action' => 'view', $project['Project']['id'], 'admin'=>false)); ?> 
						</li>

					</ul>
				</small>	

<div class="long-text"><?php echo $project['Project']['description']; ?></div>
<?php //echo h($project['Project']['creator']); ?>
<p><span class="pull-right">Created; <?php echo h($project['Project']['created']); ?> - Last modified: <?php echo h($project['Project']['modified']); ?></span>
</p>


<div class="related">
	<h3><?php echo __('Related Documents'); ?></h3>
	<?php if (!empty($project['Document'])): ?>
	<table class="table table-striped">
	<tr>
		<th><?php echo __('Titre'); ?></th>
		<th><?php echo __('Document'); ?></th>
		<th><?php echo __('Modifie'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($project['Document'] as $document): ?>
		<tr>
			<td><?php echo $document['title']; ?></td>
			<td><?php echo $this->Html->link( $document['document'], $this->Crud->get_document_url($document), ['target'=>'_new']); ?></td>
			<td><?php echo $document['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'documents', 'action' => 'view', $document['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'documents', 'action' => 'edit', $document['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'documents', 'action' => 'delete', $document['id']), array('confirm' => __('Are you sure you want to delete # %s?', $document['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Ajouter un Document au dossier'), array('controller' => 'documents', 'action' => 'add', $project['Project']['id'])); ?> </li>
		</ul>
	</div>
	
	<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Editer le dossier'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Effacer le dossier'), array('action' => 'delete', $project['Project']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $project['Project']['id']))); ?> </li>
			<li><?php echo $this->Html->link(__('Liste dossiers'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('Nouveau dossier'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('Liste des Documents'), array('controller' => 'documents', 'action' => 'index')); ?> </li>
		</ul>
	</div>
	
	</div>
</div>
