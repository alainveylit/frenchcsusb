<style>
.comment p { background: white; font-size: 90%; color: red; padding: 2px 1em; }
.comment div { background: whitesmoke; color: rgba(32, 32, 35, .9); padding: 2px 2em; }

</style>
<div class="skinny">
		
		<h3><?php echo $document['Document']['title']; ?></h3>
			<?php echo $document['Document']['description']; ?>
	
		<div style="width: 100%;">
			<?php echo $this->element('pdf_document', array('document'=>$document['Document']));?>
		</div>

		<?php echo $document['Document']['notes']; ?>

	</div>

	<hr>
<?php /*
	<h3>Comments on this PDF: 
	<?php if($User) :?>
		<small class="pull-right"><button class="add-comment" id="<?php echo $document['Document']['id'];?>">Add a comment</button></small>
		<?php else:?>
		<small class="pull-right">You must <a href="/users/register">have an account</a> and log in to add a comment</small>
	<?php endif;?>
	</h3>
		<div id="comment" style="width: 100%; display: none;">
		
		<div id="comment-form" class="cartouche bordered">
		<?php echo $this->Form->create('Comment', array('url'=>['controller'=>'comments', 'action'=>'project_comment']));?>
			<legend><?php echo __($User['name'] . ' comments:');?></legend>
				<fieldset class="light-gray">
				<?php
					echo $this->Form->input('comment', array('label'=>false, 'cols'=>80, 'rows'=>5));
					echo $this->Form->input('user_id', array('value'=>$User['id'], 'type'=>'hidden'));
					echo $this->Form->input('foreign_key', array('value'=>$document['Document']['id'], 'type'=>'hidden'));
					echo $this->Form->input('model', array('type'=>'hidden', 'value'=>'Document'));
					echo $this->Form->input('project_id', array('type'=>'hidden', 'value'=>$document['Document']['foreign_key']));
					echo $this->Form->hidden('name', array('value'=>$User['name']));
				?>
				</fieldset>
				<fieldset style="margin: 1em 10%;">
					<span class="pull-right">
					<button type="submit" class="btn btn-primary">Register comment</button></span>
				</fieldset>
				</form>
			</div>

		
		</div>

	<div id="view-comments">
	<div id="new-comment"></div>
	<?php foreach($document['Comment'] as $comment) :?>
		<div class="row comment">
			<p class="light-blue"><?php echo $comment['Creator']['name'];?> <small class="pull-right"><?php echo $comment['created'];?></small></p>
			<div><?php echo $comment['comment'];?></div>
		</div>
	<?php endforeach;?>
	*/?>
	<p><small class="pull-right">Created by: <?php echo $document['Creator']['name'];?> - <?php echo $this->Time->niceShort($document['Document']['created']); ?>	</span></p>

</div>



<script>
	
	$(document).ready( function() {
			 
			// pass options to ajaxForm 
            $('#CommentProjectCommentForm').ajaxForm( function(response) { 
				alert("Your comment was processed: ");
				$('#comment').hide();
				$('#new-comment').html( '<b>You wrote: </b></i>' + response + '</i>');
            }); 
            
		$('.add-comment').click( function() {
			if($('#comment').is(":visible")) {
				$('#comment').hide();
				$(this).text('Add a comment');
			} else {
				$(this).text('Cancel');
				$('#comment').show();
			}
			
		});
		
	});

</script>
