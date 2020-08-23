	<?php //debug($documents);?>	
			<table class="table table-striped">
				<tr>
					<th><?php echo $this->Paginator->sort('title', 'Titre'); ?></th>
					<th><?php echo $this->Paginator->sort('cours_id', 'Cours'); ?></th>
					<th><?php echo $this->Paginator->sort('category', 'Categorie'); ?></th>
					<th><?php echo $this->Paginator->sort('showcase', 'Public'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			<?php foreach ($documents as $document): ?>
			<tr>
				<td title="<?php echo h($document['Document']['document']); ?>">
					<?php echo $this->Html->link($document['Document']['title'],
					 array('action'=>'view',$document['Document']['id']) ); ?>
					</td>
				<td title="<?php echo h($document['Document']['created']); ?>"><?php						
						echo $this->Html->link($document['Cours']['titre'], 
							array('controller'=>'cours', 'action'=>'view', $document['Cours']['id']));
				 ?></td>

				<td><?php echo h($document['Document']['category']); ?>&nbsp;</td>
				<td><?php echo ($document['Document']['showcase']) ? "Public" : "Private";?></td>
				<td class="actions">
					<ul class="list-inline">
					<li>
						<span class="glyphicon glyphicon-circle-arrow-down"> </span> 
						<?php echo $this->Html->link(__('Telecharger'),
								array('action'=>'download', $document['Document']['id'], 'admin'=>false) ); ?>
					
					</li>
					<?php if($User['id']==$document['Document']['creator']) :?>
					<li><span class="glyphicon glyphicon-edit"> </span>
						<?php echo $this->Html->link(__('Editer'), array('action' => 'edit', 'admin'=>true, $document['Document']['id'])); ?>
					</li>
					<li>
					<span class="glyphicon glyphicon-remove"> </span>
					<?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', 'admin'=>true, $document['Document']['id']), array(), __('Are you sure you want to delete document # %s?', $document['Document']['id'])); ?>
					</li>
					<?php endif;?>
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
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
