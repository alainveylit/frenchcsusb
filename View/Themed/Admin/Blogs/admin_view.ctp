<style>
.long-text { min-height: 200px; border: 1px dotted lightgray; }
.actions { margin-top: 2em; border-top: 1px gray solid; }
.comments {  margin-top: 1em; }
.comments div { background: #f9f9f4;  border-top: 1px solid gray; }
.comments p.actions { width: 100%; float: none; font-size: 75%; text-align: right; border: none; margin: 4px 24px 1em 1em; padding-right: 36px; }
#comment-form { width: 100%; display: none; float: none; }
.inset { max-width: 200px; }
</style>
<?php echo $this->element('tinymce');?>
<div class="cartouche bordered">
	
	<?php //debug($blog);?>
	<?php //debug($cours);?>
	
<h3><?php echo $this->Html->link( __('Ma vie en France'), array('action'=>'index'));  ?>
	<small class="pull-right">
		Date:  <?php 
			$englishdate = $this->Time->format($blog['Blog']['created'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
	</small>
</h3>

<hr>
	<h4><?php echo $this->Html->link("Journal de: " . $blog['Creator']['name'], array('action'=>'journal', $blog['Creator']['id']));?>
				<small class="pull-right">Sujet: <?php echo h($blog['Blog']['title']); ?></small>
	</h4>

<div class="long-text">
	
	<?php 
	if(!empty($blog['Blog']['image'])):?> 
	<?php
		//debug($blog['Blog']);
		$path = '/files/blog/image/' . $blog['Blog']['image_dir'] . DS . $blog['Blog']['image'];
	?>
		<img class="inset" src="<?php echo $path;?>" alt="mon image">
	<?php endif;?>
	
	<?php echo $blog['Blog']['text']; ?>


		<p>Dernière modification: <?php 
			$englishdate = $this->Time->format($blog['Blog']['modified'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
		</p>
</div>


<div class="row">
	
	<p ><strong>Commentaires:</strong>
		<span class="pull-right"><a class="show-comment" href="javascript:">Ajouter un commentaire </a></span>
	</p>
</div>

	<div id="comment-form" class="row">
		<?php
				$foreign_key = $blog['Blog']['id'];
				$model_name='Blog';
				$owner = $blog['Blog']['creator'];
				$user_id=$User['id'];
		?>
		<?php echo $this->Form->create('Comment', array('url'=>array('controller'=>'comments', 'action'=>'add_comment', 'admin'=>true)));?>
		<fieldset>
			<?php
				echo $this->Form->input('comment', array('type'=>'textarea', 'label'=>false));
				echo $this->Form->hidden('user_id', array('value'=>$user_id));
				echo $this->Form->hidden('foreign_key', array('value'=>$foreign_key));
				echo $this->Form->hidden('model', array('value'=>$model_name));
				echo $this->Form->hidden('owner', array('value'=>$owner));
			?>			
		</fieldset>

		<div style="text-align: right;"><?php echo $this->Form->end('Submit');?></div>	
</div>

	<div id="new-comment"></div>
		<div>
			<?php //debug($blog['Comment']);?>
			<?php if(!empty($blog['Comment'])):?>
				<div class="comments">
					<?php foreach($blog['Comment'] as $comment) :?>
						<div><?php echo $comment['comment'];?></div>
						<p class="actions">
							<?php echo $this->Time->niceShort($comment['created']);?> | 
							<?php echo $this->Html->link('Editer', array('controller'=>'comments', 'action'=>'edit', $comment['id']));?> | 

							<?php echo $this->Html->link('Effacer', array('controller'=>'comments', 'action'=>'delete', $comment['id']));?>
						</p>
					<?php endforeach;?>
				</div>
			<?php endif;?>
		</div>
</div>


<script>
	
	$('document').ready( function() {
		
		var owner = <?php echo $blog['Creator']['id'];?>;
		
		$('#CommentAddCommentForm').submit( function() {
			alert("submitting");
			//$('#CommentAddCommentForm').submit();
			return true;
		});
		
		// pass options to ajaxForm 
        /*    $('#CommentAddCommentForm').ajaxForm( function(response) { 
				alert("Your comment was processed: ");
				$('#comment-form').hide();
				$('#new-comment').html( '<b>You wrote: </b></i>' + response + '</i>');
				
            }); */
            
		/*$('.show-comment').click( function() {
			if($('#comment').is(":visible")) {
				$('#comment').hide();
				$(this).text('Add a comment');
			} else {
				$(this).text('Cancel');
				$('#comment').show();
			}*/
			
		//$("#comment-form").hide('slow');

		// Add a comment feature
		$('.show-comment').click( function() {	
			$("#comment-form").toggle('slow');		
		});
			
	});

</script>

