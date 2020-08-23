<?php echo $this->element('tinymce');?>

<div class="fatty form">
	<div class="cartouche bordered">
<?php echo $this->Form->create('Crossword'); ?>
	<fieldset class="-input">
		<legend><?php echo __('Ajouter un problème de mots-croisés'); ?></legend>
	<?php
		echo $this->Form->input('title', ['style'=>'width: 500px;']);
		echo $this->Form->input('description');
		echo $this->Form->input('cours_id');
		//echo $this->Form->input('creator');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Liste des mots-croisés'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>
