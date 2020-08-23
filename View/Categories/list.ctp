<?php //debug($categories);?>
<ul class="list-group" >
	<li class="list-group-item" style="background: lavender;"><strong><a href="#" id="synopsis">Categories</a></strong></li>
	<?php foreach($categories as $id=>$category): ?>
		<li class="list-group-item" ><a id="<?php echo $id;?>" href="javascript:"><?php echo $category;?></a></li>
	<?php endforeach;?>
</ul>
<script>
$('document').ready( function() {
	
	$('#synopsis').click( function() {
		
		//alert(window.location.href );
	});
});

</script>
