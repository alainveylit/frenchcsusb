<?php //debug($score);?>
<div class="fatty centered">

<?php $title=reset($quiz);?>
<h2><?php echo $title;?></h2>
<h4>Vous avez achev&eacute; ce test: Bravo!</h4>


<?php if(!empty($score) && isset($score['quiz_id'])) :?>
	<div>
		<ul style="color: red;" class="list-inline">
			<?php 
				$bad_answers = abs($score['points']-$score['questions']); 
				$percent = 100 - (($bad_answers/$score['questions'])*100);
			?>
			<li>Score final: <?php echo $score['points'];?> | </li> 
			<li>Questions: <?php echo $score['questions'];?> | </li> 
			<li>Mauvaises r&eacute;ponses: <?php echo $bad_answers;?> | </li>
			<li>Percentage: <?php echo $percent; ?>%</li>
		</ul>
	</div>
<?php endif;?>

<img src="/img/fin_du_film.jpeg">
<p>Si vous n'avez rien appris, vous n'avez rien gagn&eacute;!</p>
<p><?php echo $this->Html->link("Essayez un nouvel exercice", array('controller'=>'quizzes', 'action'=>'index'));?></p>
</div>
