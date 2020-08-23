<div class="row">
	<div class="col-lg-2">
		<?php $categories = array('Film', 'Video', 'WEB', 'Télévision', 'Wikipedia');?>
		<ul class="list-group" style="background: lavender;">
			<li class="list-group-item" style="background: lavender;"><strong>Categories</strong></li>
			<?php foreach($categories as $category): ?>
				<li class="list-group-item" ><a id="<?php echo urlencode($category);?>" href="javascript:"><?php echo $category;?></a></li>
			<?php endforeach;?>
		</ul>

	</div>
	<div id="my-ressources" class="col-lg-10"></div>

</div>

<script>
	$('document').ready( function() {
	
	$('#my-ressources').load( '/ressources/display/Film' ); 
	
	$('.list-group-item a').click( function() {
		$('#my-ressources').load( '/ressources/display/' + $(this).attr('id') );
		
	});
	
	
});
</script>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Ajouter une Ressource'), array('action' => 'add')); ?></li>
	</ul>
</div>
