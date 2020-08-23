<div class="row">
	<div class="col-lg-2">
		<ul class="list-group">
			<li class="list-group-item"  style="background: lavender;"><strong>Catégories</strong></li>
			<?php foreach($focuses as $id=>$focus): ?>
				<li class="list-group-item" ><a id="<?php echo urlencode($focus);?>" href="javascript:"><?php echo $focus;?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
	
	<div id="my-presentations" class="col-lg-10">
	
	</div>
			<?php //debug([$focuses,$foci]);?>
		


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ajouter une Présentation'), array('action' => 'add')); ?></li>
	</ul>
</div>

</div>

<script>
	
	$('document').ready( function() {
	
	$('#my-presentations').load( '/presentations/display/Composition' ); 
	
	$('.list-group-item a').click( function() {
		$('#my-presentations').load( '/presentations/display/' + $(this).attr('id') );
		
	});
	
	
});
</script>

