<?php 
	$cols = 2;
	$index = 0;
	$tile_groups = $this->requestAction('/tile_groups/get_tiles/' . $group_title);
?>


<?php $tile_group = $tile_groups[0];?>
<div class="row wide-margins tile-group" >
	<?php echo $this->element('tile_group', array('tile_group'=>$tile_groups[0],'cols'=>$cols, 'index'=>$index));?>
</div>
<script>
	/*
	$( document ).ready(function() {
				$('.tile-group > h2').prepend($('<span class="fleuron single-leaf"> </span>'));
				$('.tile-group  h4').prepend($('<span class="fleuron gerbe"> </span>'));
	});*/
	
</script>
