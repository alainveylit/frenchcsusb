<?php 
$cols = 2;
$index = 0;
$tile_groups = $this->requestAction('/tile_groups/get_tiles');
?>

<div class="row wide-margins">
	
	<?php foreach($tile_groups as $group) :?>	

		<div class="row">
			<?php echo $this->element('tile_group', array('tile_group'=>$group));?>
		</div>

	<?php endforeach;?>


</div>
