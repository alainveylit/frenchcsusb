<?php echo $this->element('tinymce', array('_simple'=>true));?>
<style>
.half { width: 23%; float: left; margin: 0 1%; }
.comments { border: 1px solid lightgray; max-height: 300px; overflow-y: scroll; }
.comments h4 { background-color: lightgreen; margin: 0; padding: 4px 12px; }
.comments div { padding: 4px 12px; }
.2ui-dialog { font-size: 12px; }
#prof-comment { background: white; font-size: 11pt; margin: 4px; }
</style>
<div class="fatty form">
	<?php //debug($cours_id);?>
	<?php //debug($this->request->data);?>
<div>
	<?php echo $this->Form->create('Presentation', ['type' => 'file']); ?>
	<fieldset style="min-width: 100%;">
		<legend><?php echo __('Editer ma présentation'); ?>
			<small class="pull-right">Cours: <?php echo $cours['titre'];?></small>
		</legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('cours_id', ['type'=>'text', 'value'=>$cours_id]);

		echo $this->Form->input('titre', array('style'=>'width: 600px;'));
	?>

	<div class="row">	
					
		<?php echo $this->Form->input('description');?>

		<?php if(!empty($this->request->data['Presentation']['comments'])):?>
			<div class="comments">					
					<h4><a href="javascript:" id="popup">Commentaires du prof:</a></h4>
					<div id="prof-comment"><?php echo $this->request->data['Presentation']['comments'];?></div>
			</div>
		<?php endif;?>					
		</div>
		
		<div class="row">
			<?php echo $this->Form->input('vocabulaire', array('class'=>'vocabulary'));?>
		</div>

		<div class="row">
			<span class="half">
				<?php echo $this->Form->input('status', array('options'=>$statuses));?>
			</span>
			<span class="half">
				<?php echo $this->Form->input('medium', array('options'=>$media));?>
			</span>
			<span class="half">
				<?php echo $this->Form->input('focus', array('options'=>$focuses));?>
			</span>
			<span class="half">
				Public: <?php echo $this->Form->checkbox('public');?>
			</span>
		</div>
		
		</fieldset>
		
		<fieldset style="border-top: 1px solid blue; margin-top: 1em; padding-top: 1em;">
			
		<span>Téléchargez et publiez votre document: <i>( Formats autorisés: PDF, PowerPoint, Image )</i></span>
		<?php 
			echo $this->Form->input('document', ['type' => 'file']); 
			echo $this->Form->input('document_dir', ['type' => 'hidden']); 
			echo $this->Form->hidden('creator');
		?>
		<span></span>


	</fieldset>

	<div><?php echo $this->Form->end(__('Enregistrer')); ?></div>
	
	<?php echo $this->element('keyboard_shortcuts');?>

	<div id="comment-dialog"></div>
	</div>
		
	<hr>
	<div style="text-align: right;">
		<ul class="list-inline">
				<li><?php echo $this->Html->link(__('Mes Présentations'), array('action' => 'index'), ['class'=>'list']); ?></li>
				<li><?php echo $this->Form->postLink(__('Effacer cette présentation'), array('action' => 'delete', $this->Form->value('Presentation.id')), array('class'=>'erase'), __('Are you sure you want to delete # %s?', $this->Form->value('Presentation.id'))); ?></li>	
		</ul>
	</div>
</div>
<?php echo $this->element('keyboard');?>
<script>
$(document).ready( function() {

	$('#popup').click( function() {
		var div = $('<div></div>');
		div.html($('#prof-comment').html());
		$('body').append(div);
		//$('#comment-dialog').html($('#prof-comment').html());
		div.dialog( { title: "Corrections", Height: 300, Width: 500, maxHeight: 500 });
		
	});
});


</script>
