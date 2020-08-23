<style>
	.options { margin: 1em; border: 1px lightgray; padding: 24px 48px; background: rgba(235,235,230,.7); float: left; clear: right; }
	.answer { font-weight: bold; }
	.good-response { background: rgba(250, 180, 180, .8); border-radius: 12px; padding: 12px; }
	.bad-response { background: rgba(25, 180, 250, .8); border-radius: 12px; padding: 12px; }
	.inset { max-width: 150px; }
</style>

<div class="fatty view">
	<?php //debug($question['Question']);?>
	<h3 class="centered">Exercice no. <?php echo $question['Quiz']['id'], ": ",
			$this->Html->link($question['Quiz']['title'], array('controller'=>'quizzes', 'action'=>'view', $question['Quiz']['id']));?>  
	</h3>

	<div class="cartouche bordered">
	<h4><?php echo __('Question:'); ?>
	
	<?php if($User['role']=='Admin'):?>	<small class="pull-right">
		<span class="glyphicon glyphicon-plus"> </span>
		<a href="javascript:" id="<?php echo $question['Question']['id'];?>" class="add-option">Add a new option</a>
		
		| <span class="glyphicon glyphicon-chevron-right"> </span>
		<?php echo $this->Html->link("Question suivante", array("action"=>"next", $question['Question']['id']), array('class'=>'next'));?>
		</small>
		<?php endif;?>
			<hr>
	</h4>
		<div id="question">
			<?php echo str_replace("[ ... ]", "<span class='answer'>[ ... ]</span>", $question['Question']['text']); ?>
		</div>

<div id="question-wrapper" class="row">
		<?php echo $this->Crud->show_upload_image('question', $question['Question']);?>
		<ol class="options">
		<?php foreach ($question['Option'] as $option): ?>
			<li class="option"><a href="javascript:" id="<?php echo $option['id'];?>"><?php echo $option['title']; ?></a></li>
			<?php endforeach; ?>
		</ol>
</div>
		<?php if(!empty($question['Question']['note'])) echo '<h5>Note: ', $question['Question']['note'], '</h5>';?>

<div id="response"> </div>
	<p class="next-question no-display">
		<?php echo $this->Html->link("Question suivante", array("action"=>"next", $question['Question']['id']), array('class'=>'next'));?></p>

<div id="add-form"></div>
</div>
<?php if($User['role']=='Admin'):?>
<div class="actions">
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer cette Question'), array('action' => 'edit', $question['Question']['id'], 'admin'=>true)); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer cette Question'), array('action' => 'delete', $question['Question']['id'], 'admin'=>true), array(), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des questions du test'), array('action' => 'index', $question['Question']['quiz_id'], 'admin'=>true)); ?> </li>
		<li><?php echo $this->Html->link(__('Nouvelle Question'), array('action' => 'add', $question['Question']['quiz_id'], 'admin'=>true)); ?> </li>
		</ul>
</div>
<?php endif;?>


</div>
<script>
		$('document').ready( function() {
			
		$('.option a').click( function() {
			var option_id =  $(this).attr('id');
			var option_text = $(this).text();
			$('#question-wrapper').removeClass('cocorico').removeClass('perdu');
			var response = $.post('/options/check', { id: option_id}, function( data ) { 
					if(data==0) { 
							$('#response').text("Mauvaise réponse - Ressayez!"); 
							$('#response').removeClass('good-response glyphicon glyphicon-thumbs-up'); 
							$('#response').addClass('bad-response glyphicon glyphicon-thumbs-down');
							$('#question-wrapper').addClass('perdu');
						}
					if(data==1) {  
						$('#response').text("Bonne réponse: bravo!"); $('.next-question').show(); 
						$('#response').removeClass('bad-response glyphicon glyphicon-thumbs-down'); 
						$('#response').toggleClass('good-response glyphicon glyphicon-thumbs-up');
						$('.answer').text( option_text );
						$('#question-wrapper').addClass('cocorico');
					}
				});
				
		});
		
		// Add a comment feature
		$('.add-comment').click( function() {			
				var fkey = $(this).attr('id');
				var model= '<?php echo Inflector::classify( $this->request->params['controller']);?>';
			$("#comment").load(router + 'comments/add_comment', { foreign_key: fkey, model: model } );
				$("#comment").bPopup({
					easing: 'easeOutBack', //uses jQuery easing plugin
					speed: 450,
					transition: 'slideDown'
				});
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
