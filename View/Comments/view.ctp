<div class="comments view">
	
	<?php //debug($comment);?>
	
		<h2><?php echo __('User annotation');?></h2>

			
			<div class="long-text">

				<p><?php echo $this->Html->link( $comment['User']['name'], 'mailto:'.$comment['User']['email'], array('class'=>'email')); ?> commented 
				

				on 		<?php 
							$model = $comment['Comment']['model']; 
							$controller=strtolower($model) .'s';
							$item = $comment[$model];
							echo $this->Html->link($item['title'], array('controller'=>$controller, 'action'=>'view', $comment['Comment']['foreign_key']));				
						?>
				</p>
					
				<blockquote>
						<?php echo $comment['Comment']['comment']; ?>
				</blockquote>

				<p>This comment was added <?php echo $this->Time->niceShort($comment['Comment']['created']);?> :</p>

			<?php echo $this->FileIcon->list_crud($comment['Comment'], true);?>
			
		</div>


</div>
