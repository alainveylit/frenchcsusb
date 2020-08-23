<style>
.active { background: gainsboro; }
#pass { display: inline-block; }
#tips { display: inline; }
.options li { font-size: 120%; }
#fillin-blank { font-size: 120%; }

</style>
<div class="row-fluid">
	<?php //debug($quiz);?>
	<h3 class="centered">Exercice no. <?php echo $quiz['Quiz']['id'], ": ",
			$this->Html->link($quiz['Quiz']['title'], array('controller'=>'quizzes', 'action'=>'view', $quiz['Quiz']['id']), array('id'=>'quiz-title'));?>  
			<small >Niveau <?php echo $quiz['Quiz']['difficulty'];?></small>
	</h3>

	<div class="wide-margins" style="background: lavender; padding: 4px;">
		<h4><?php echo __('Question '); ?> <span id="question_id"> 1 </span> sur <span id="total-questions"> </span>	
			<small class="pull-right">	 <span class="glyphicon glyphicon-chevron-right"> </span>
				<a class="next-question" href="javascript:">Next question </a> | 
					<div class="btn-group">
					  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Mode
					  </button>
						  <ul id="mode" class="dropdown-menu">
							<li><a class="dropdown-item" href="javascript:" >Image</a></li>
							<li><a class="dropdown-item" href="javascript:" >Aveugle</a></li>
							<li><a class="dropdown-item" href="javascript:" >Clavier</a></li>
						  </ul>
					</div>
			</small>
			<hr>
		</h4>
		<div id="question"></div>
		
		
		<div class="row" style="padding: 0 24px;" >

		<p id="success">
			
			<span id="response" > </span>
			
			<span id="proceed" class="next-question no-display pull-right">  
				<span class="glyphicon glyphicon-chevron-right"> </span> <a href="javascript:">Next question</a></span>
			
				<span id="pass" class="pull-right"><a href="javascript:" >Je donne ma langue au chat </a></span>
		</p>
		


		<p class="tips">
				<div id="show-tip" style="display: none;">
					<span class="glyphicon glyphicon-question-sign"> </span> 
					<a href="javascript:" >Montrer un indice</a>
				</div>
			</p>	

				<div class="au-secours image-tip"></div>
				<div id="langue-au-chat" class="image-tip"></div>
		</div>

</div>



<?php if($User['role']=='Admin'):?>
	<div class="admin row-fluid">
		<ul class="list-inline">
			<li><a href="javascript:" class="add-option">Ajouter une option</a></li>
			<li><a href="javascript:" id="edit-question">Editer la question</a></li>
		</ul>
		<div id="add-form"></div>

	</div>
<?php endif;?>

</div>

<script>

var mode = <?php echo $quiz['Quiz']['mode'];?>

var quiz_player="<?php echo $User['name'];?>";

	
	function update_score( won )
	{
		var quiz_info = JSON.parse(localStorage.getItem('quiz_info'));
		quiz_info.score += (won) ? +1 : -1;
		quiz_info.answers++;
		console.log(quiz_info);
		localStorage.setItem('quiz_info', JSON.stringify(quiz_info));
	}

	$('document').ready( function() {
	
		var questions=<?php echo $question_ids;?>;
		var question_index=0;
		var quiz_id=<?php echo $quiz['Quiz']['id'];?>;
	
		$('#mode a').eq(mode).addClass('active');
		
		$('#mode li a').click( function() {
			$('#mode a').removeClass('active');
			mode = $(this).parent().index();
			$(this).addClass('active');
			$('#question').load('/questions/load/' + questions[question_index]);
			console.log(mode);
		});


		
		$('#question').load('/questions/load/' + questions[0]);
		
		$('#total-questions').text(questions.length);
		
		$('.next-question').click( function() {
			question_index++;
			if(question_index >= questions.length) { // end of quiz
				$('.wide-margins').load('/questions/fin/'+quiz_id);
			} else {
				var qid = questions[question_index];
				$('#question_id').text(question_index);
				$('#question').load('/questions/load/' + qid);
			}
		});
	
	
		$('.add-option').click( function() {
			$.post('/options/add_option/', { question_id: questions[question_index] }, function( data ) { 
				$('#add-form').html(data);
			});
			
		});

		$('#edit-question').click( function() {
			window.location="/admin/questions/edit/"+questions[question_index];
		});
		


		$('#show-tip').click( function() {		
			(mode==1) ? $('#image-tip').toggle('slow') : $('.options').show();
			$('#show-tip').hide();
		});
		
		$('#show-tip a').hover( 
			function() { $('.au-secours').show('slow'); }, 
			function() { $('.au-secours').hide('slow'); }
			
		);

		$('#pass a').hover( 			
				function() { $('#langue-au-chat').fadeIn('slow');  },
				function() { $('#langue-au-chat').hide('slow');} 
		);
		
		$('#pass').click( function() {
			$('.next-question').show(); 
			$('#question-wrapper').load('/options/answer/' + questions[question_index]);
			$(this).hide();
			$('#show-tip').hide();
			$('#response').hide();
			$('#check-answer').hide();
			update_score( false );
		});
		
		if(localStorage) {
			var quiz_title = $('#quiz-title').text();
			var quiz_info = { title:  quiz_title, player: quiz_player, questions: questions.length, score: 0, answers: 0 };
			localStorage.setItem('quiz_info', JSON.stringify(quiz_info));
		} else {
			alert("Sorry, your browser do not support local storage.");
		}

});


</script>
