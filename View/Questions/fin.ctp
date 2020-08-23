<?php 
//$score['quiz_id']=11;
//debug($score);?>
<div class="fatty centered">

<h4>Vous avez achevé ce test: Bravo!</h4>

	<div>
	<?php /*if(!empty($score) && isset($score['quiz_id'])) :?>

		<ul style="color: red;" class="list-inline">
			<?php 
				$bad_answers = abs($score['points']-$score['questions']); 
				$percent = 100 - (($bad_answers/$score['questions'])*100);
			?>
			<li>Score final: <?php echo $score['points'];?> | </li> 
			<li>Questions: <?php echo $score['questions'];?> | </li> 
			<li>Mauvaises réponses: <?php echo $bad_answers;?> | </li>
			<li>Pourcentage: <?php echo $percent; ?>%</li>
		</ul>
		<?php endif; */?>
		<ul style="color: red;" class="list-inline">
			<li id="points"></li>
			<li id="answers"></li>
			<li id="bad-answers"></li>
			<li id="percent"></li>
		</ul>
	</div>


<img src="/img/fin_du_film.jpeg">
<p>Si vous n'avez rien appris, vous n'avez rien gagné!</p>
<p><?php echo $this->Html->link("Essayez un nouvel exercice", array('controller'=>'quizzes', 'action'=>'display'));?></p>
</div>

<script>
		$("document").ready( function() {
			
			var quiz_info = JSON.parse(localStorage.getItem('quiz_info'));
			console.log(quiz_info);

			$('#quiz-title').text(quiz_info.title);
			
			var points = quiz_info.score;
			var bad_answers = quiz_info.answers - quiz_info.questions;
			$("#bad-answers").text("Bad answers:" + Math.abs(bad_answers));

			bad_answers = Math.abs(points-quiz_info.questions); 

			var percent_score = 100 - ((bad_answers/ quiz_info.questions)*100);
			percent_score = Math.round(percent_score*100)/100;
			
			$("#points").text("Points:" +points);
			$("#percent").text("Percent score:" + percent_score);
			$("#answers").text(quiz_info.answers + " out of " + quiz_info.questions);
			
	
});


</script>
