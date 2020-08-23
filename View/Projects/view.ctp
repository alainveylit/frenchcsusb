<style>
	h2 { border-bottom: 1px solid lightgray; padding: 12px 24px;}
	div.col-lg-9 { border-left: 1px solid lightgray; }
	#pdf-menu { min-height: 300px; max-height:800px; overflow: hidden; overflow-y:scroll; padding: 0; list-style-position: inside; }
</style>

<div style="clear-fix" style="margin: 1em 2em; width: 100%;">
	<h2> <span class="glyphicon glyphicon-th-large"> </span> <?php echo $project['Project']['title'];?>
		<small class="pull-right"><?php echo $this->Crud->view_crud('Project', $project['Project']);?></small>

	</h2>
	<div class="row"  id="showcase" style="margin: 2em;">
		<?php 
			$document_root = 'document' . DS . 'document';
			//debug($project);
		?>
		<div class="col-lg-3">
			<h4>Documents available:</h4>
				<ol id="pdf-menu"> 
						<?php foreach ($project['Document'] as $document): ?>
							<li id="pdf_<?php echo $document['id'];?>">
								<a href="javascript:" 
									rel="<?php echo $document_root . DS .$document['document_dir'] . DS . $document['document'];?>" 
									title="<?php echo $document['description'];?>
									">
									<?php echo $document['title'];?>
								</a>
							</li>
						<?php endforeach;?>
				</ol>	

			</div>
			<div class="col-lg-9">
				<div id="text"></div>
			</div>	
			
			<div class="long-text"><?php echo $project['Project']['description'];?></div>
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
