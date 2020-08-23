<script src="/js/keyboard.js"></script>
<style>
	.answer { font-weight: bold; }
	.good-response { background: rgba(250, 180, 180, .8); border-radius: 12px; padding: 12px; }
	.bad-response { background: rgba(25, 180, 250, .8); border-radius: 12px; padding: 12px; }
	.inset { max-width: 150px; border: 1px dotted gray; }
	.fatty { margin-top: 0; }
	#question { margin-bottom: 30px; overflow: auto; }
	
	.blinking {
		animation: blinker 1s linear infinite;
	}
	.option { text-decoration: underline; }
	@keyframes blinker {  
		50% { opacity: 0.0; }
	}
	
</style>

<div class="fatty view">
	<?php 
		$image_url = $this->Crud->get_upload_image('question', $question['Question']);
	?>
	<h3 class="centered">Exercice no. <?php echo $question['Quiz']['id'], ": ",
			$this->Html->link($question['Quiz']['title'], array('controller'=>'quizzes', 'action'=>'view', $question['Quiz']['id']));?>  
	</h3>

	<div class="cartouche bordered">
	<h4><?php echo __('Question:'); ?>
	
	<?php if($User['role']=='Admin'):?>	
			<small class="pull-right">
				<span class="glyphicon glyphicon-plus"> </span>
					<a href="javascript:" id="<?php echo $question['Question']['id'];?>" class="add-option">Add a new option</a>
				
				 <span class="glyphicon glyphicon-chevron-right"> </span>
					<?php echo $this->Html->link("Question suivante", 
									array("action"=>"next", $question['Question']['id'], "fillin"), array('class'=>'next'));?>
			</small>
		<?php endif;?>
		<hr>
	</h4>
	
		<div id="question">		
			<?php if(!empty($image_url)) : ?>
				<?php echo $image_url;?>
			<?php endif;?>
			
			<form id="fillin-blank" >
			<?php 
					$input_box = '<input type="text" lang="fr" id="QuestionNote" value="" maxlength="255" style="width: 200px" name="QuestionNote">';
					echo str_replace("[ ... ]", $input_box, $question['Question']['text']); ?>
					<input type="hidden" id="QuestionId" name="QuestionId"queryquery value="<?php echo $question['Question']['id'];?>">
					<button type="submit" id="check-answer">V&eacute;rifier</button>
			</form>
		</div>

		<div id="option-wrapper" class="row no-display">			
			<ol class="options list-inline">
				<li>Options possibles: </li>
				<?php foreach ($question['Option'] as $option): ?>
					<li class="option"><?php echo $option['title']; ?></li>
				<?php endforeach; ?>
			</ol>		
		</div>
		
	<?php if($question['Quiz']['show_tips']) :?>
		<div class="row selfish">
			<ul class="tips list-inline">
				<li><span class="glyphicon glyphicon-question-sign"> </span> <a id="show-tip"  href="javascript:" >Montrer un indice</a><div class="au-secours"></div></li>
				<li id="pass" class="pull-right"><a  href="javascript:" >Je donne ma langue au chat <div class="langue-au-chat"></div></a></li>
			</ul>
		</div>
	<?php endif;?>


		<?php if(!empty($question['Question']['note'])) echo '<h5>Note: ', $question['Question']['note'], '</h5>';?>

		<div id="response"> </div>

			<p class="next-question no-display">
				<?php echo $this->Html->link("Question suivante", 
									array("action"=>"next", $question['Question']['id'], "fillin"), 
									array('class'=>'next'));?>
			</p>

		<div id="add-form"></div>

</div>
<?php if($User['role']=='Admin'):?>
	<div class="actions">
		<ul class="list-inline">
			<li><?php echo $this->Html->link('Retour &agrave; la page d\'accueil', array('controller'=>'pages', 'action'=>'display', 'home'), array('escape'=>false));?></li>
		</ul>
	</div>
<?php endif;?>
</div>

<script>
	
	function explode()
	{
		$('#question-wrapper').fadeOut(1000);
		$('#question-wrapper').removeClass('perdu');
		$('#question-wrapper').fadeIn(1000);
		
	}
	
		$('document').ready( function() {
			
	//$('input[type="text"]').addClass("keyboardInput");
	//$('input[type="text"]').attr('lang', "fr"); 
	//$('img.keyboardInputInitiator').attr('src', '/css/keyboard.png');

		if($('#image-tip > img').length==0) {
			$('#show-tip').hide();
		}
		
		
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
			$('.next-question').show(); 
			$('#question-wrapper').html('<div class="centered"><h3>Vous avez perdu!</h3><img src="/css/images/pleurnichard.jpeg"></div>');
			$(this).hide();
			$('#show-tip').hide();
		});
		
		$('img.inset').css('max-width', '200px');
		
   var form_options = { 
        target:        '#response',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,   // pre-submit callback 
        success:       showResponse,  // post-submit callback 
 
        // other available options: 
        url:       "/options/check_fillin" ,        // override for form's 'action' attribute 
        type:      "post"        			// 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        			// 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        			// clear all form fields after successful submit 
        //resetForm: true        			// reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    $('#fillin-blank').ajaxForm(form_options); 
 
		
});

function showRequest(formData, jqForm, options) { 

    var queryString = $.param(formData); 
    return true; 
} 

function showResponse(responseText, statusText, xhr, $form)  { 
	//alert(responseText);
	
	if(responseText!="Réponse correcte") {
			$('#response').toggleClass('good-response glyphicon glyphicon-thumbs-up');
			$('#response').text("Mauvaise réponse - Ressayez!"); 
			$('#response').removeClass('good-response glyphicon glyphicon-thumbs-up'); 
			$('#response').addClass('bad-response glyphicon glyphicon-thumbs-down');
			$('#question-wrapper').addClass('perdu');
			$('#option-wrapper').fadeIn('200');
			setTimeout(explode, 2000);
	} else {
			$('#response').text("Bonne réponse: bravo!"); $('.next-question').show(); 
			$('#response').removeClass('bad-response glyphicon glyphicon-thumbs-down'); 
			$('#response').toggleClass('good-response glyphicon glyphicon-thumbs-up');
			$('#pass').hide();
			$('#question-wrapper').addClass('cocorico');
			$('.next').addClass('blinking');
			$('#check-answer').fadeOut('slow');
		}
	}

</script>
