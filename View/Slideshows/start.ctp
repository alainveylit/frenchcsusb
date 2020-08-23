<div class="fatty view">
	<h2><?php echo __('Diaporama'); ?></h2>
		<small class="pull-right">
		<ul class="list-inline">
				<li><span class="glyphicon glyphicon-film"> </span> 
					<?php echo $this->Html->link('Commencer le Diaporama', array('action'=>'view', 'admin'=>false,  $slideshow['Slideshow']['id']));?></li>
				</ul>		
		</small>	
	<h2><?php echo $slideshow['Slideshow']['title']; ?></h2>
	<?php if(!empty($slideshow['Slideshow']['image'])) {
		echo $this->Crud->show_upload_image('Slideshow', $slideshow['Slideshow']);
	}?>
	
	
	<div class="long-text">
			<?php echo $slideshow['Slideshow']['description']; ?>
	</div>	
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Liste des diaporamas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Retourner au cours'), array('controller'=>'cours', 'action' => 'display')); ?> </li>
	</ul>
</div>


