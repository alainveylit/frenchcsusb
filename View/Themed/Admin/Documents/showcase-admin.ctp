<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2><?php echo __('PDF Show case'); ?>
			
			</p>
			<?php if($User['role']=='Admin') :?>
				<small>
					<ul class="nav nav-pills pull-right clearfix">
						<li class="active">
						<?php echo $this->Html->link(__('Add a document'), array('action'=>'add'));?>								
						</li>
						<!--li><?php //echo $this->Html->link(__('My URL links'), array('controller'=>'links', 'action'=>'index'), array('class'=>'list'));?></li-->
					</ul>
				</small>
				<?php endif;?>
			</h2>	
			<p>PDF documents created with DjangoTab that showcase some of the features of the software.</p>
						
		</div>

	<div class="panel-body">
		
			<table class="table table-striped">
				<tr>
					<th><?php echo $this->Paginator->sort('title');?></th>
					<th><?php echo $this->Paginator->sort('description'); ?></th>
					<?php //echo $this->Paginator->sort('created', 'Posted'); ?>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			<?php foreach ($documents as $document): ?>
			<tr>
				<td title="<?php echo h($document['Document']['document']); ?>">
					<?php echo $this->Html->link($document['Document']['title'],
						array('action'=>'preview',$document['Document']['id']), 
						array('title'=>$this->Time->niceShort($document['Document']['created']))); ?>
					</td>
					<td><?php echo $document['Document']['description'];?></td>				
	
				
				<td class="actions">
					<ul class="list-inline">
					<li>
						<span class="glyphicon glyphicon-circle-arrow-down"> </span> 
						<?php echo $this->Html->link(__('Download'),
								array('action'=>'download', $document['Document']['id'], 'write'=>false) ); ?>
					
					</li>
					<?php if($User['id']==$document['Document']['creator']) :?>
					<li><span class="glyphicon glyphicon-edit"> </span>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $document['Document']['id'])); ?>
					</li>
					<li>
					<span class="glyphicon glyphicon-remove"> </span>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $document['Document']['id']), array(), __('Are you sure you want to delete document # %s?', $document['Document']['id'])); ?>
					</li>
					<?php endif;?>
					</ul>				
				</td>
			</tr>
		<?php endforeach; ?>
			</table>
	</div>				
	
</div>
</div>

<script>

</script>
