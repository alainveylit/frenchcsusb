
<?php 
$model = $this->request->data['TileGroup']['model'];
//$model_data =  $this->request->data[$model];
//$displayField = $displayFields[$model];
//debug($this->request->data);
$owner_title = reset($owner_model);
//debug($owner_model);
$controller=strtolower($model).'s';
?>	
<h4>
		<span>Nouveau groupe appartenant à:  <?php echo $this->Html->link($owner_title, 
				array('controller'=>$controller, 'action'=>'view', $this->request->data['TileGroup']['foreign_key'])) ;?> </span> 
		<small class="pull-right">[Model: <?php echo $model;?> ]</small>
</h4>
<div class="tileGroups form">
<?php echo $this->Form->create('TileGroup'); ?>
	<fieldset>
		<legend><?php echo __('Ajouter un Groupe de tuiles'); ?></legend>
	<?php
		echo $this->Form->input('title', ['style'=>'width: 700px']);
		echo $this->Form->input('header',  ['style'=>'width: 700px']);
		echo $this->Form->input('columns');
		echo $this->Form->hidden('index', ['value'=>$index]);
		echo $this->Form->input('actif');

		echo $this->Form->hidden('model');
		echo $this->Form->hidden('foreign_key');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('Liste des Groupes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Tuiles'), array('controller' => 'tiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Tuile'), array('controller' => 'tiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
