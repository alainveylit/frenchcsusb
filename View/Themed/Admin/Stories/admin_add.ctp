<?php echo $this->element('tinymce');?>
<div class="fatty form">
	<?php echo $this->Form->create('Story', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Ajouter une histoire'); ?></legend>
		<?php
			echo $this->Form->input('title', ['label'=>'Titre', 'style'=>'width: 700px']);
			echo $this->Form->input('credit', ['style'=>'width: 500px']);
			echo $this->Form->input('histoire');
							echo $this->Form->input('image', ['type' => 'file']); 
					echo $this->Form->input('image_dir', ['type' => 'hidden']); 

			echo $this->Form->hidden('professeur_id', ['value'=>$professeur_id,'type'=>'text']);
			echo $this->Form->input('cours_id');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inlline">

		<li><?php echo $this->Html->link(__('Liste des histoires'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
