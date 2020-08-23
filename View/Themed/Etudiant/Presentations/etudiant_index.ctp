<style>
.highlighted { background-color: #E2DED1; }
</style>
<div class="row">
	<div class="col-lg-2">
		<ul class="list-group">
			<li class="list-group-item"  style="background: lavender;"><strong>Catégories</strong></li>
			<?php foreach($focuses as $id=>$focus): ?>
				<li class="list-group-item" ><a id="<?php echo urlencode($focus);?>" href="javascript:"><?php echo $focus;?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	<?php //debug($cours);?>
	<div id="my-presentations" class="col-lg-10">
	
	</div>
		<?php //debug([$focuses,$foci]);?>
</div>

<script>
	
	var target="Composition";
	
	$('document').ready( function() {
		
		function highlight_target()
	{
			$('.list-group li').removeClass('highlighted');
			$('.list-group li a#'+target).parent().addClass('highlighted');
	}
	
	//$('li a#Composition').trigger('click');
	$('#my-presentations').load( '/etudiant/presentations/display/Composition' ); 
	highlight_target();		

	$('.list-group-item a').click( function() {
		target = $(this).attr('id');
		$('#my-presentations').load( '/etudiant/presentations/display/' + target );
		highlight_target();		
	});
	
	
});
</script>

