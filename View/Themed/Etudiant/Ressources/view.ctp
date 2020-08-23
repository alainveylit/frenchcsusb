<div class="fatty row view">
	<h2><?php echo __('Ressource'); ?> : <?php echo h($ressource['Ressource']['titre']); ?>
		<small class="small"><?php echo $this->Crud->view_crud('Ressource', $ressource['Ressource']);?></small>
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
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Editer la Ressource'), array('action' => 'edit', $ressource['Ressource']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Effacer la Ressource'), array('action' => 'delete', $ressource['Ressource']['id']), array(), __('Are you sure you want to delete # %s?', $ressource['Ressource']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('Liste des Ressources'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Nouvelle Ressource'), array('action' => 'add')); ?> </li>
			</ul>
		</div>
	<?php endif;?>
</div>
