<?php echo $this->element('tinymce');?>

<div class="fatty">

	<div class="documents form">
	<?php echo $this->Form->create('Document', array('type' => 'file')); ?>
		<fieldset>
			<legend><?php echo __('Ajouter un document'); ?>
					<?php 
						if(isset($project)) { echo ' au dossier: ' . $project['Project']['title']; } 		
					?>

			</legend>
		<?php
			echo $this->Form->input('title', array('style'=>'width: 500px'));
			echo $this->Form->input('description', array('style'=>'width: 500px'));
			echo $this->Form->input('category', array('type'=>'select', 'options'=>$categories));
			echo $this->Form->input('cours_id');
			echo $this->Form->input('document', array('type' => 'file')); 
			
			if(isset($project)) {
				echo $this->Form->hidden('model');
				echo $this->Form->hidden('foreign_key');
			}
			
			echo $this->Form->input('notes');
			echo '<i>Allowed types: ', join(', ' , $allowed_types), '</i>';
		?>
		</fieldset>
	<?php echo $this->Form->end(__('Enregistrer')); ?>
	</div>

	<div class="actions">
		<h3><?php echo __('Actions'); ?></h3>
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Liste des Documents'), array('action' => 'index')); ?></li>
		</ul>
	</div>
</div>
