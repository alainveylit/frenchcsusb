<div class="fatty row view">
	<div>
		<div class="selfish row"><?php echo $this->Crud->view_crud('Personnage', $personnage['Personnage']);?></div>

		<h2><?php echo __('Personnage'); ?> : <?php echo h($personnage['Personnage']['nom']); ?></h2>
		<h3><strong>Profession: </strong><?php echo $personnage['Personnage']['profession']; ?>
			<small class="pull-right"><?php echo $personnage['Personnage']['focus'];?></small>
		</h3>
		<div class="text">
			<?php echo $this->Crud->show_upload_image('personnage', $personnage['Personnage']); ?>
		<?php echo $personnage['Personnage']['description']; ?>

		</div>
		<div class="row">

		</div>

	</div>

	<?php if($User['role']=='Admin') :?>
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Edit Personnage'), array('action' => 'edit', $personnage['Personnage']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Personnage'), array('action' => 'delete', $personnage['Personnage']['id']), array(), __('Are you sure you want to delete # %s?', $personnage['Personnage']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Personnages'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Personnage'), array('action' => 'add')); ?> </li>
			</ul>
		</div>
	<?php endif;?>
</div>
