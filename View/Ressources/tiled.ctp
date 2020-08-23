<style>
	div.tile { width: 23%; margin: 1%; border: 1px solid gray; border-radius: 7px; background: white; float: left; }
	.focus { text-align: center; clear: both; margin: 0; border-bottom: 1px solid gray; padding: 12px 0; background: beige; border-radius: 7px 7px 0 0 ;}
	div.tile h5 { text-align: center; border-top: 1px solid gray; margin-top: 12px; padding-top: 1em; }
	div.tile .illustration { margin: 8px auto; background: inherit; overflow: auto; text-align: center; height: 200px; }
	div.tile .illustration img { max-height: 160px; margin: auto; float: none; }
</style>
<div class="fatty index">
	<h2><?php echo __('Ressources'); ?>
		<small class="pull-right"><?php echo $this->Html->link('Toutes les ressources', array('action'=>'tiled'));?></small>
	</h2>
		<?php if(isset($medium) && $medium=="Film"):?>
			<ul class="list-inline">
				<li><a href="http://csusb.kanopystreaming.com.libproxy.lib.csusb.edu/category/languages/french" target="_new">Films français sur Kanopy</a>	</li>
				<li><a href="https://cal.csusb.edu/world-languages-and-literatures/resources/multimedia-language-center/movie-lists/french-movies"  target="_new">Films fran&ccedil;ais au Multimedia language center</a></li></ul>
	<?php endif;?>
	
	<?php //debug($cours);?>

	<?php foreach ($ressources as $ressource): ?>
	<div class="tile">
		<h4 class="focus" title="Filtrer par ce sujet"><?php echo $this->Html->link($ressource['Ressource']['focus'], array('action'=>'tiled', $ressource['Ressource']['focus'])); ?></h4> 
		<div class="illustration">
			<?php 
				$url = $this->Html->url(array('action'=>'view', $ressource['Ressource']['id']));
				$img =  $this->Crud->show_upload_image('ressource', $ressource['Ressource'], $url); 
				//echo $this->Html->link( $img, array('action'=>'view', $ressource['Ressource']['id']));
			?>
			
			</div>
		<h5><?php echo $this->Html->link($ressource['Ressource']['titre'], array('action'=>'view', $ressource['Ressource']['id'])); ?></h5>
	</div>
	<?php endforeach;?>
	
</div>
