<div class="fatty row view">
	<h2><?php echo $ressource['Ressource']['titre']; ?>
		<small class="pull-right">
			<?php echo $this->Html->link(__('Liste des Ressources'), array('action' => 'index')); ?> 
		</small>
	</h2>
	<div class="fatty">
		<h3><strong>Medium: </strong><?php echo $ressource['Ressource']['medium']; ?>
			<small class="pull-right"><?php echo $ressource['Ressource']['focus'];?></small>
		</h3>
		<div class="text">
			<?php echo $this->Crud->show_upload_image('ressource', $ressource['Ressource']); ?>
			<?php echo $ressource['Ressource']['description']; ?>
		</div>
		<div class="row">


		</div>

	</div>

	<?php if($User['role']=='Admin') :?>
		<div class="actions">
			<?php echo $this->Crud->view_crud('Ressource', $ressource['Ressource']);?>
		</div>
	<?php endif;?>
</div>
