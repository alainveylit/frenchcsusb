<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Story', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Edit Story'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', ['label'=>'Titre', 'style'=>'width: 700px']);
		echo $this->Form->input('credit', ['style'=>'width: 500px'] );

		echo $this->Form->input('histoire');
		echo $this->Form->input('image', ['type' => 'file']); 
		echo $this->Form->input('image_dir', ['type' => 'hidden']); 

		echo $this->Form->hidden('professeur_id');
		echo $this->Form->input('cours_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Story.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Story.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des histoires'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Professeurs'), array('controller' => 'professeurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('controller' => 'cours', 'action' => 'index')); ?> </li>
	</ul>
</div>
