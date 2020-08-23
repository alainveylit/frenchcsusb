<div class="tileGroups form">

<?php 
$model = $this->request->data['TileGroup']['model'];
$model_data =  $this->request->data[$model];
$displayField = $displayFields[$model];
//debug($this->request->data);

?>	
<h4>
		<span>Tuile appartenant à: <?php echo $model_data[$displayField];?></span> 
		<small class="pull-right">[Categorie: <?php echo $categories[$model];?> ]</small>
</h4>
<hr>
<?php echo $this->Form->create('TileGroup'); ?>
<?php $tilegroup_id = $this->Form->value('id'); ?>

	<fieldset>
		<legend><?php echo __('Options'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', ['label'=>'Titre/Slug', 'style'=>'width: 400px']);
		echo $this->Form->input('header', ['label'=>'Bannière', 'style'=>'width: 600px']);
		echo $this->Form->input('columns', ['label'=>'Colonnes']);
		echo $this->Form->input('actif');
		
		
		//echo $this->Form->input('cours');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Form->postLink(__('Effacer ce groupe'), array('action' => 'delete', $this->Form->value('TileGroup.id')), array('confirm' => __('Are you sure you want to delete # %s?', $tilegroup_id))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des groupes de tuiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des tuiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter une tuile'), array('controller' => 'tiles', 'action' => 'add', $tilegroup_id)); ?> </li>
	</ul>
</div>
