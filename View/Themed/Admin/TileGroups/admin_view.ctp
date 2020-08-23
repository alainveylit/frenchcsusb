<div class="cartouche view">
<h3><?php echo __('Tuile'); ?>: <?php echo h($tileGroup['TileGroup']['title']); ?>

</h3>
<h3>Banni&egrave;re: <?php echo h($tileGroup['TileGroup']['header']); ?>

<?php 
//debug($displayFields);
$model = $tileGroup['TileGroup']['model'];
//$model_data =  $this->request->data[$model];
$displayField = $displayFields[$model];
//debug($this->request->data);

?>	

<h4>
		<span>Tuile appartenant à: <?php echo $tileGroup[$model][$displayField];?></span> 
		<small class="pull-right">[Categorie: <?php echo $model;?> ]</small>
</h4>

<small class="pull-right">
	<?php echo $this->Html->link('Ajouter une colonne à ce groupe', 
		array('controller'=>'tiles', 'action'=>'add', $tileGroup['TileGroup']['id']));?>
	</small>
</h3>
<p>Nombre maximum de colonnes: <?php echo h($tileGroup['TileGroup']['columns']); ?></p>
<?php //debug($tileGroup);?>

	<div>
		<?php echo $this->element('tile_group', array('tile_group'=>$tileGroup, 'cols'=>1, 'index'=>1));?>
	</div>

<div class="fatty cartouche">
	<h3><?php echo __('Colonnes dans ce groupe'); ?></h3>
	<?php if (!empty($tileGroup['Tile'])): ?>
	<small class="pull-right">				
		<a href="javascript:" id="save-order" class=" green-gradient">Sauvegarder l'ordre des colonnes</a>
	</small>
	<table class="table table-striped" id="sort">
	<tr>
		<th><?php echo __('Titre'); ?></th>
		<th><?php echo __('Ajax'); ?></th>
		<th><?php echo __('Creator'); ?></th>
		<th><?php echo __('Index'); ?></th>
		<th><?php echo __('Couleur'); ?></th>
		<th><?php echo __('Full Row'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tileGroup['Tile'] as $tile): ?>
		<tr id="<?php echo $tile['id'];?>">
			<td><?php echo $tile['title']; ?></td>
			<td><?php echo $tile['ajax']; ?></td>
			<td><?php echo $tile['Creator']['name']; ?></td>
			<td><?php echo $tile['index']; ?></td>
			<td><?php echo $tile['Couleur']['title']; ?></td>
			<td><?php echo ($tile['full_row']) ? " &#10003; Yes" : "No"; ?></td>
			<td><?php echo ($tile['active']) ? " &#10003; Yes" : "No"; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Lire'), array('controller' => 'tiles', 'action' => 'view', $tile['id'])); ?>
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'tiles', 'action' => 'edit', $tile['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'tiles', 'action' => 'delete', $tile['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tile['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Editer cette tuile'), array('action' => 'edit', $tileGroup['TileGroup']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Effacer cette tuile'), array('action' => 'delete', $tileGroup['TileGroup']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tileGroup['TileGroup']['id']))); ?> </li>
				<li><?php echo $this->Html->link(__('Liste des tuiles'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Ajouter une tuile'), array('action' => 'add')); ?> </li>
			</ul>
		</div>
	</div>
	

</div>

<script>
	
	$('document').ready( function() {				
		<?php echo $this->element('sort_js', array('controller'=>'tiles'));?>
	
	});
</script>

