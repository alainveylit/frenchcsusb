<style>
	div.col-lg-9 { border-left: 1px solid lightgray; }
	#pdf-menu { min-height: 500px; max-height:800px; overflow: hidden; overflow-y:scroll; padding: 0; list-style-position: inside; }
</style>

<div class="fatty">
<div style="margin: 0em;">
		<h2 style="border-bottom: 1px solid lightgray;"><?php echo $project['Project']['name'];?>
			<small class="pull-right">
				<?php echo $this->Html->link("View documents", array('action'=>'view', $project['Project']['id']));?>
			</small>
		</h2>

	<div class="row">		
			<?php echo $project['Project']['synopsis'];?>	
	</div>
</div>
</div>

<script>
	
	$('document').ready( function() {
	
	var current_document=0;
		
		$('#pdf-menu li a').click( function() {
			current_document = $(this).parent().attr('id');
			var document_id = current_document.replace("pdf_", "");
			$('#text').load('/documents/details/' + document_id );
		});
		
		$('#pdf-menu li:first a').trigger('click');
	});
	
</script>
