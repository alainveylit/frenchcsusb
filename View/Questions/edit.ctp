<?php echo $this->element('tinymce');?>
<?php //debug($this->request->data);?>
<div class="fatty form">
<?php echo $this->Form->create('Question', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Edit Question'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('text');
		echo $this->Form->input('note', array('style'=>'width: 700px'));
		echo $this->Form->hidden('index');
		echo $this->Form->hidden('quiz_id');
	?>
	<div class="cartouche bordered">
		<?php echo $this->Form->input('image_url');?>
		<?php echo $this->Form->input('image', ['type' => 'file', 'label'=>'Fichier']); ?>
		<?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>
	</div>
	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>


	<table class="table table-striped">
	<tr><th>Title</th><th>Correct</th><th>Index</th><th>Edit</th></tr>
	<caption>Options for this question:</caption>
	<?php 
		$options = $this->request->data['Option']; 
		foreach ($options as $option):?>
		<tr>
			<td class="option-title" title="Edit this option">
				<!--a href="javascript:" id="<?php //echo $option['id'];?>"-->
					<?php echo $option['title'];?><!--/a-->
			</td>
			<td><?php echo $option['correct_answer'] ? "true" : "false";?></td>
			<td><?php echo $option['index'];?></td>
			
			<td>
				
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'options', 'action'=>'edit', $option['id']));?>
				<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Question.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?>
			</td>
			
		</tr>
	<?php endforeach;	?>
	
	</table>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Question.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
	</ul>
</div>

<script>
		$('document').ready( function() {
			
		$('.option-title a').click( function() {
				var option =  $(this).attr('id');
				//alert(option);
				var url = '/options/edit_title/' + $(this).attr('id'); 

				// show a spinner or something via css
				var dialog = $('<div style="display:block" class="loading"></div>').appendTo('body');
				// open the dialog
				var target = $(this);//.parent().parent();
							
				dialog.dialog({
					// add a close listener to prevent adding multiple divs to the document
					close: function(event, ui) {
						var new_title = $(this).find('#OptionTitle').val();
						var correct = $(this).find('#OptionCorrectAnswer').val();
						//alert(correct);
						var index = $(this).find('#OptionIndex').val();
						target.text(new_title);
						target = target.parent().next();
						target.text(correct ? 'true' : 'false');
						target.next().text(index);
						/*var new_author = $(this).find('#PieceAuthor').val();
						target.find('i').text(new_author);
						*/
						// remove div with all data and events
						dialog.remove();
					},
					title: 'Edit option',
					width: 500,
					modal: true
				});
				// load remote content
				dialog.load(
					url,
					{}, // omit this param object to issue a GET request instead a POST request, otherwise you may provide post parameters within the object
					function (responseText, textStatus, XMLHttpRequest) {
						// remove the loading class
						dialog.removeClass('loading');
					}
				);
				//prevent the browser to follow the link
				return false;			
 
		});
	});
</script>
