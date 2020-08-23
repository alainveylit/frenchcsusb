<?php echo $this->element('tinymce');?>
<?php //debug($this->request->data);
$type = strtolower($this->request->data['Quiz']['type']);
?>
<div class="fatty form">
<?php echo $this->Form->create('Question', ['type' => 'file']); ?>
	<fieldset>
		<legend><?php echo __('Editer cette question'); ?>
		<small class="pull-right">Quiz type: <?php echo $type;?></small>
		</legend>
	<?php
		echo $this->Form->input('id');
		
	if($type=='questions') {
		echo $this->Form->input('text');
		echo $this->Form->input('note', array('style'=>'width: 700px'));
	} else {
		
		echo $this->Form->input('note', array('label'=>'Reponse', 'style'=>'width: 700px'));
		echo $this->Form->input('text', array('label'=>'Definition'));
		
	}
		echo $this->Form->hidden('index');
		echo $this->Form->hidden('quiz_id');
	?>
	
	<div class="cartouche bordered">
		<?php echo $this->Form->input('image_url', ['type' => 'url']);?>
		<?php echo $this->Form->input('image', ['type' => 'file']); ?>
		<?php echo $this->Form->input('image_dir', ['type' => 'hidden']); ?>
	</div>
	
	</fieldset>
	
<?php echo $this->Form->end(__('Enregistrer')); ?>

<?php if($type=='questions'):?>
	<table class="table table-striped">
		<thead>
				<caption>Options for this question:</caption>

			<tr><th>Texte</th><th>Correct</th><th>Modifier</th></tr>
		</thead>

		<tbody>
	<?php 
		$options = $this->request->data['Option']; 
		foreach ($options as $option):?>
		<tr>
			<td class="option-title" title="Edit this option">
				<!--a href="javascript:" id="<?php //echo $option['id'];?>"-->
					<?php echo $option['title'];?><!--/a-->
			</td>
			<td><?php echo $option['correct_answer'] ? 
				$this->Html->image('/css/images/check.png', array('alt'=>'Reponse correcte', 'title'=>'Reponse correcte')) : 
				$this->Html->image('/css/images/error.png', array('alt'=>'Reponse fausse', 'title'=>'Reponse fausse'));?>
				
			</td>
			
			<td>
				
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'options', 'action'=>'edit', $option['id']), ['class'=>'edit']);?>
				 | <?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'options', 
						'action' => 'delete', 
						$option['id']), 
						array('class'=>'erase'),
						__('Are you sure you want to delete # %s?', $option['id'])); ?>
			</td>
			
		</tr>
	<?php endforeach;	?>
	</tbody>

	</table>
		
		<p><span class="glyphicon glyphicon-plus"> </span>
		<a href="javascript:" id="<?php echo $this->request['data']['Question']['id'];?>" class="add-option">Ajouter une option</a>
		<div id="add-form"></div>
</p>
<?php endif;?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $this->Form->value('Question.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Questions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Liste des Quizzes'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau Quiz'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
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
		
			$('.add-option').click( function() {
				//alert($(this).attr('id'));
			$.post('/options/add_option/', { question_id: $(this).attr('id') }, function( data ) { 
				//alert(data);
				$('#add-form').html(data);
			});
			
		});

	});
</script>
