<div class="view">

	<h3><?php $this->FileIcon->show_avatar($profile['Icon']);?> <?php echo $profile['Profile']['name'];?></h3>
		<?php 
		//debug($crumbs);

		if( !empty($crumbs)) : ?>
		
				<h4>You have viewed the following files in the past hour:</h4>
		
				<ol>
				<?php foreach($crumbs as $label => $item) {
					//debug($item);
						$title = (empty($item['title'])) ? "[Untitled]" :  urldecode($item['title']);
							//if( $creator == $creator['User']['id']) { 
								$controller = strtolower($item['model']) . 's';
								echo '<li>', $this->Html->link($title, array('controller'=>$controller, 'action'=>'view', $item['id']) ), '</li>'; 	
							//}
						
					}
				?>	
				</ol>
				
	<?php endif;?>


</div>
