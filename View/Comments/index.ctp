<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2><?php echo __('Comments'); ?>
			</h2>							
		</div>

	<div class="panel-body">	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?></p>
		<table class="table table-striped table-bordered">
		<tr>
			<th><?php echo $this->Paginator->sort('creator');?></th>
			<th><?php echo $this->Paginator->sort('comment');?></th>
			<th><?php echo $this->Paginator->sort('model', 'Subject');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
		</tr>
			<?php
			$i = 0;
			foreach ($comments as $comment):

			//debug($comment);
			?>
				<tr>
					<td>
						<?php echo $comment['Creator']['name']; ?>
					</td>
					<td>
						<?php 
							$controller = strtolower($comment['Comment']['model']) . 's';
									echo $comment['Comment']['comment']; 
						?>
						<?php //debug($comment);
						?>
					</td>
					<td>
						<?php 
							$model = $comment['Comment']['model'];
							 echo $this->Html->link($comment[$model]['title'],
											array('controller'=>$controller, 'action'=>'view',
											 $comment['Comment']['foreign_key']),
											array('title'=>'View item')); 
						
							//$this->Html->link($comment['Piece']['title'], array('controller'=>'pieces', 'action'=>'view', $comment['Piece']['id'])),  
							
						 ?>
					</td>
					<td>
						<?php echo $comment['Comment']['created']; ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>


	<div class="pager">
		<?php echo $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
		<?php echo $this->Paginator->next(__('next').' >>', array(), null, array('class'=>'disabled'));?>
	</div>


</div>
</div>
</div>
