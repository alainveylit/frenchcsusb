<div>
	<h3 class="green-diagonal">Documents
	
			<?php if($User['id']==$documents['Document']['creator']))):?>

				<span class="right-aligned black-crud small-text">

				<ul class="horz-list black-crud  no-border skinny">
					<li>
						<?php echo $this->Html->link(
									__('Add a document', true), 
									'javascript:', 
									array('rel'=>$foreign_key, 'id'=>'add-document', 'class'=>'pdf'));?>
									
					</li>
					
						<?php /*echo $this->Html->link(
								__('My documents', true), 
								array('controller'=>'documents', 'action'=>'index'),
								array('class'=>'list'));*/
						?>

				</span>
		<?php endif;?>

	
	</h3>

	<div class="document-links" style="position: relative;">
		
		<div id="document-form" class="expose"></div>

			<?php if(!empty($documents)) :?>
					<ul class="characters-list no-border">
						<?php foreach($documents as $document) :?>
							<li><?php echo $this->Html->link($document['title'], 
										array('controller'=>'documents', 'action'=>'download', 'write'=>false, $document['id']),
										array('target'=>'RESOURCE', 'title'=>$document['title'],
										 'class'=>'external'));?>
												 
								<span class="right-aligned">
									<?php echo $this->Crud->related_crud('documents', $document['id'], $User['id']);?>
								</span>			
												 
							</li>
						<?php endforeach;?>
					</ul>
			<?php endif;?>

	</div>
</div>

<script>

$('document').ready( function() {
					
	$('#add-document').click( function() {
		add_document('<?php echo $model;?>', $(this).attr('rel'), null);
		
	});
	
});

</script>
