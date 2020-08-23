<?php //debug($question);?>
<style>
	#QuestionNote { width: 200px; }
	#question-text { width: 100%; }
</style>
	<?php 
		$image_url = $this->Crud->get_upload_image('question', $question['Question']);
		//debug($image_url);
	?>
	<div class="cartouche ">
		<div id="question-text">	
			<?php 
					if(!preg_match("/\[ \.\.\. \]/", $question['Question']['text'])) {
						 $question['Question']['text'] .= " [ ... ]"; 
					 }
			?>
		<div class="row-fluid">
			<form id="fillin-blank" >
				<input type="hidden" id="QuestionId" name="QuestionId" value="<?php echo $question['Question']['id'];?>">
				<?php 
					$input_box = '<input class="keyboardInput" type="text" lang="fr" id="QuestionNote" value="" maxlength="155" name="QuestionNote">';
					echo str_replace("[ ... ]", $input_box, $question['Question']['text']); 
				?>
					<button type="submit" id="check-answer">Vérifier</button>
			</form>
			</div>
		</div>


		<div id="question-wrapper" class="row">

			<?php if(!empty($image_url)) : ?>
				<div id="image-tip" class="inset"> <?php echo $image_url;?></div>
			<?php endif;?>
			
			<?php /*<p><a href="javascript:" id="show-options" style="display: none;">Montrer les options</a></p>*/?>
			
			<ol class="options">
				<?php foreach ($question['Option'] as $option): ?>
					<li class="option"><a href="javascript:" id="<?php echo $option['id'];?>"><?php echo $option['title']; ?></a></li>
				<?php endforeach; ?>
			</ol>
	</div>

	<?php if(!empty($question['Question']['note'])) echo '<h5>Note: ', $question['Question']['note'], '</h5>';?>
		
</div>


<script>
	
		function explode()
	{
		$('#question-wrapper').fadeOut(1000);
		$('#question-wrapper').removeClass('perdu');
		$('#question-wrapper').fadeIn(1000);
	}
	
	function wrong_answer()
	{
				$('#response').toggleClass('good-response glyphicon glyphicon-thumbs-up');
				$('#response').text("Mauvaise réponse - Ressayez!"); 
				$('#response').removeClass('good-response glyphicon glyphicon-thumbs-up'); 
				$('#response').addClass('bad-response glyphicon glyphicon-thumbs-down');
				$('#response').show();
				$('#question-wrapper').addClass('perdu');
				$('#option-wrapper').fadeIn('200');
				setTimeout(explode, 2000);
				update_score( false );
	}
	
	function right_answer()
	{
				$('#response').text("Bonne réponse: bravo!"); 
				$('#response').removeClass('bad-response glyphicon glyphicon-thumbs-down'); 
				$('#response').toggleClass('good-response glyphicon glyphicon-thumbs-up');
				$('#pass').hide();
				$('#response').show();
				$('#proceed').show();
				$('.options').css('visibility', 'hidden');
				$('#question-wrapper').addClass('cocorico');
				$('.next').addClass('blinking');
				$('.proceed').addClass('blinking');
				$('#check-answer').fadeOut('slow');		
				update_score( true );
		
	}

	$('document').ready( function() {
		
		var myInput = document.getElementById('QuestionNote');
		if (!myInput.VKI_attached) VKI_attach(QuestionNote);
		
		//console.log( $('#image-tip img').length );
		
		if( $('#image-tip img').length==0) {
			$('#show-tip').empty();
		} else {
			if(mode!=0) {
				 $('#show-tip').show(); 
				 if(mode==1) $('#image-tip').hide(); 
			}
		}
			
		//alert(mode);
		if(mode==2) { $('.options').hide();}
		
		$('.option a').click( function(e) {
			var option_id =  $(this).attr('id');
			var option_text = $(this).text();
			$('#question-wrapper').removeClass('cocorico').removeClass('perdu');
			var response = $.post('/options/check', { id: option_id}, function( data ) { 
					if(data==0) { 
						wrong_answer();
						}
					if(data==1) {  
						right_answer();
						$('#QuestionNote').val( option_text);
					}
				});
				e.preventDefault();
				e.stopPropagation();
		});

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
 
			 
	/*$('.option a').click( function() {	
		$('#QuestionNote').val( $(this).text());
		$('#fillin-blank').submit();		
	});*/
			 
	$('#fillin-blank').ajaxForm(form_options); 
 
	 function showRequest(formData, jqForm, options) { 
		var queryString = $.param(formData); 
		return true; 
	} 

	function showResponse(responseText, statusText, xhr, $form)  { 
		
		if(responseText!="Réponse correcte") {
			wrong_answer();
		} else {
			right_answer();
			}
		}

			
			$('#pass').show();
			$('#response').hide();
			$('#response').removeClass('good-response').removeClass('bad-response');
			$('#proceed').hide();
	
	
});

</script>
