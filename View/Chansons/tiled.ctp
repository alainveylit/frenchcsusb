<style>
	div.tile { width: 23%; margin: 1%; border: 1px solid gray; border-radius: 7px; background: white; float: left; height: 400px; }
	div.tile div img { width: 90%; margin: auto; float: none; max-height: 300px; }
	.focus { text-align: center; clear: both; margin: 0; border-bottom: 1px solid gray; padding: 12px 0; background: beige; border-radius: 7px 7px 0 0 ;}
	div.tile h5 { text-align: center; border-top: 1px solid gray; margin-top: 12px; padding-top: 1em; }
	div.tile .illustration { margin: 8px auto; background: inherit; overflow: auto; text-align: center;  }
</style>

<div class="fatty index">
	
	<h2><?php echo __('Chansons'); ?>
	<small class="pull-right"><?php //echo $this->Html->link('Toutes les chansons', array('action'=>'tiled'));?></small>
	</h2>
	
	<?php foreach ($chansons as $chanson): ?>
	<div class="tile">
		<h4 class="focus" title="Filtrer par ce sujet">
			<?php 
				$url = $this->Html->url(array('action'=>'view', $chanson['Chanson']['id']));
				echo $this->Html->link($chanson['Chanson']['auteur'], array('action'=>'view', $chanson['Chanson']['id'])); 
			 ?>
			</h4> 
		<div class="illustration">
			<?php 
				$img =  $this->Crud->show_upload_image('chanson', $chanson['Chanson'], $url); 
				//echo $this->Html->link( $img, array('action'=>'view', $ressource['Ressource']['id']));
			?>
			
			</div>
		<h5><?php echo $this->Html->link($chanson['Chanson']['titre'], array('action'=>'view', $chanson['Chanson']['id'])); ?></h5>
	</div>
	<?php endforeach;?>
	
</div>
