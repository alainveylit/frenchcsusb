<div class="container-fluid">
	<div class="panel panel-default">	
		<div class="panel-body">
			<h2>Showcase documents in PDF format:</h2>
				<table class="table table-striped">
					<tr>
						<th><?php echo $this->Paginator->sort('title');?></th>
						<th><?php echo $this->Paginator->sort('description'); ?></th>
						<?php //echo $this->Paginator->sort('created', 'Posted'); ?>
					</tr>
				<?php foreach ($documents as $document): ?>
				<tr>
					<td title="<?php echo h($document['Document']['document']); ?>">
						<?php echo $this->Html->link($document['Document']['title'],
							array('action'=>'preview',$document['Document']['id']), 
							array('title'=>$this->Time->niceShort($document['Document']['created']))); ?>
						</td>
						<td><?php echo $document['Document']['description'];?></td>				
				</tr>
			<?php endforeach; ?>
				</table>
			</div>
	</div>
	
	<p>After you <a href="/users/register/">register with an account</a> on this site you can view 
		more scores in the <a href="/collections">Collections area</a> on this site.</p>
</div>


<script>

</script>
