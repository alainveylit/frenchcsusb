<?php echo $this->element('tinymce'); ?>
<div class="fatty form">
	<?php //debug($tilegroup);?>
	<div>
<?php echo $this->Form->create('Tile'); ?>
	<fieldset>
		<legend><span  class="check"><?php echo __('Ajouter une colonne au groupe: '), $tilegroup['TileGroup']['title']; ?></span></legend>
	<?php
		echo $this->Form->input('title', ['label'=>'Titre', 'style'=>'width: 600px']);
		echo $this->Form->input('title_link', ['label'=>'Lien du Titre',  'style'=>'width: 600px']);
		echo $this->Form->textarea('description');
		//echo $this->Form->input('tile_group_id',  ['options'=>$tile_groups, 'value'=>$tile_group_id]);
		echo $this->Form->hidden('tile_group_id', ['value'=>$tile_group_id]);
		//echo $this->Form->input('element');
		//echo $this->Form->input('ajax');
		echo $this->Form->hidden('creator', ['value'=>$creator]);
		?>
		</fieldset>
		<fieldset class="cartouche">
		<?php
			echo $this->Form->input('couleur_id');		
			echo '<p><span><strong>Index dans le groupe:</strong> </span> ', $this->Form->number('index', ['label'=>'Index', 'value'=>$index]), '</p>';
			echo '<p><strong>Options: </strong>', $this->Form->checkbox('full_row'), ' <span>Occupe la largeur de l\'&eacute;cran</span> ';
			echo $this->Form->checkbox('active'), ' <span>Active/Visible</span> </p>';
		?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Couleurs'), array('controller' => 'couleurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Couleur'), array('controller' => 'couleurs', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
