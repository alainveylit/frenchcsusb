<style>
	.options { margin: 1em; border: 1px lightgray; padding: 24px 48px; background: rgba(235,235,230,.7); float: left; clear: right; }
	.answer { font-weight: bold; }
	.good-response { background: rgba(250, 180, 180, .8); border-radius: 12px; padding: 12px; }
	.bad-response { background: rgba(25, 180, 250, .8); border-radius: 12px; padding: 12px; }
	.inset { max-width: 150px; }
	.fatty { margin-top: 0; }
	.reponse { color: red; }
	.blinking {
		animation: blinker 1s linear infinite;
	}

	@keyframes blinker {  
		50% { opacity: 0.0; }
	}
</style>

<div class="wide-margins view">
	<?php 
		$image_url = $this->Crud->get_upload_image('question', $question['Question']);
		//debug($image_url);
	?>
	<h3 class="centered">Exercice no. <?php echo $question['Quiz']['id'], ": ",
			$this->Html->link($question['Quiz']['title'], array('controller'=>'quizzes', 'action'=>'view', $question['Quiz']['id']));?>  
	</h3>

	<div class="cartouche bordered">
	<h4><?php echo __('Question:'); ?>
	
		<small class="pull-right">
		<?php if($User['role']=='Admin'):?>	
			<span class="glyphicon glyphicon-plus"> </span>
				<a href="javascript:" id="<?php echo $question['Question']['id'];?>" class="add-option">Add a new option</a>
		<?php endif;?>
			
			 <span class="glyphicon glyphicon-chevron-right"> </span>
				<?php echo $this->Html->link("Question suivante", 
								array("action"=>"next", $question['Question']['id']), array('class'=>'next'));?>
		</small>
			<hr>
	</h4>
		<div id="question">
			<?php echo str_replace("[ ... ]", "<span class='answer'>[ ... ]</span>", $question['Question']['text']); ?>
		</div>

	<div id="question-wrapper" class="row">
	<?php //debug($image_url);?>
	<?php if(!empty($image_url)) : ?>
		<?php if($show_tips) : ?>		
			<div id="image-tip" class="no-display inset">			
				<?php else: ?>
			<div class="inset">
			<?php endif;?>
				<?php echo $image_url;?>
			</div>
		<?php endif;?>
		
			<ol class="options">
			<?php foreach ($question['Option'] as $option): ?>
				<li class="option"><a href="javascript:" id="<?php echo $option['id'];?>"><?php echo $option['title']; ?></a></li>
				<?php endforeach; ?>
			</ol>		
		</div>
		
	<?php if($show_tips) :?>
		<div class="row selfish">
			<ul class="tips list-inline">
				<li><span class="glyphicon glyphicon-question-sign"> </span> 
				<a id="show-tip"  href="javascript:" >Montrer un indice</a><div class="au-secours"></div></li>
				<li id="pass" class="pull-right"><a  href="javascript:" >Je donne ma langue au chat <div class="langue-au-chat"></div></a></li>
			</ul>
		</div>
	<?php endif;?>


		<?php if(!empty($question['Question']['note'])) echo '<h5>Note: ', $question['Question']['note'], '</h5>';?>

		<div id="response"> </div>

			<p class="next-question no-display">
				<?php echo $this->Html->link("Question suivante", 
									array("action"=>"next", $question['Question']['id']),
									array('class'=>'next'));?>
			</p>

		<div id="add-form"></div>

		<div id="reponse" class="no-display">
			<?php foreach ($question['Option'] as $option) {
				if($option['correct_answer']==true) echo ' ', $option['title'];
			}?>
		</div>
		
		
</div>
<?php if($User['role']=='Admin'):?>
	<div class="actions admin">
		<ul class="list-inline">
			<li><?php echo $this->Html->link('Retour &agrave; la page d\'accueil', array('controller'=>'pages', 'action'=>'home'), array('escape'=>false));?></li>
		</ul>
	</div>
<?php endif;?>
</div>

<script>
	
var correcte = "<?php foreach ($question['Option'] as $option) {
			if($option['correct_answer']==true) echo $option['title'] . '; ';
		}?>";

	function explode()
	{
		$('#question-wrapper').fadeOut(1000);
		$('#question-wrapper').removeClass('perdu');
		$('#question-wrapper').fadeIn(1000);
		
	}
		$('document').ready( function() {
			
		// Add a comment ... 
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

		if($('#image-tip > img').length==0) {
			$('#show-tip').hide();
		}
		
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
							setTimeout(explode, 2000);
						}
					if(data==1) {  
						$('#response').text("Bonne réponse: bravo!"); $('.next-question').show(); 
						$('#response').removeClass('bad-response glyphicon glyphicon-thumbs-down'); 
						$('#response').toggleClass('good-response glyphicon glyphicon-thumbs-up');
						$('.answer').text( option_text );
						$('#pass').hide();
						$('#question-wrapper').addClass('cocorico');
						$('.next').addClass('blinking');
					}
				});
				
		});
		
		
		$('.add-option').click( function() {
			$.post('/options/add_option/', { question_id: $(this).attr('id') }, function( data ) { 
				$('#add-form').html(data);
			});
			
		});
		
		$('#show-tip').click( function() {
			$('#image-tip').toggle('slow');
			$('#show-tip').hide();
		});
		
		$('#show-tip').hover( 
			function() { $('.au-secours').show('slow')}, 
			function() { $('.au-secours').hide('slow')}
			
		);

		$('#pass').hover( 
			function() { $('.langue-au-chat').show('slow')}, 
			function() { $('.langue-au-chat').hide('slow')}
			
		);
		
		$('#pass').click( function() {
			$('span.answer').text( $('#reponse').text());
			$('.next-question').show(); 
			$('#question-wrapper').html('<div class="centered"><h3>Vous avez perdu!</h3><img src="/css/images/pleurnichard.jpeg"><p class="reponse">La bonne r&eacute;ponse est:' + $('#reponse').html() + ' </p></div>');
			$(this).hide();
			$('#show-tip').hide();
		});
		
});

</script>
