<?php //debug($answer);?>
<div class="centered">
	<h3>Vous avez perdu!</h3>
		<img src="/css/images/pleurnichard.jpeg">
	<p class="cartouche">La bonne r&eacute;ponse est: <span class="reponse" id="answer"><?php echo $answer['Option']['title'];?></span></p>
</div>

<script>

$('document').ready( function() {
	$('#QuestionNote').val($('#answer').text() );
});
</script>
