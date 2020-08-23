<?php echo $this->element('tinymce'); ?>
<div class="fatty form">
	<div><?php //debug($tile_groups);?>
	<?php echo $this->Form->create('Tile'); ?>
	<fieldset>
		<legend><?php echo __('Editer cette colonne'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('title_link');
		echo $this->Form->input('description');
		echo $this->Form->input('tile_group_id', ['options'=>$tile_groups]);
		//echo $this->Form->input('element');

		//echo $this->Form->input('ajax');
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		echo $this->Form->input('index');
		echo $this->Form->input('couleur_id');
		echo $this->Form->input('full_row');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Tile.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Tile.id')))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des colonnes'), array('action' => 'index')); ?></li>
	</ul>
</div>
</div>
