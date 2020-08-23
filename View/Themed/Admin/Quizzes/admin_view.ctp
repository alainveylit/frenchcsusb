<div class="selfish fatty">
	<div class="selfish row"><?php echo $this->Crud->view_crud('Quiz', $quiz['Quiz']);?></div>
		<div class="row">
			<h2><?php echo __('Exercice no.'); ?><?php echo h($quiz['Quiz']['id']); ?>: <?php echo h($quiz['Quiz']['title']); ?>
			<small class="pull-right"><?php echo $quiz['Cours']['titre'];?></small>
			</h2>
			<?php //debug($quiz);?>
				<p class="pull-right">			
					Catégorie: <?php echo $this->Html->link($quiz['Category']['title'], 
						array('controller' => 'categories', 'action' => 'view', $quiz['Category']['id'])); ?> 
						Type: <?php echo h($quiz['Quiz']['type']); ?>
				</p>

	<div class="row">
			<div class="cartouche row">
				<?php if(!empty($quiz['Quiz']['image'])) {
					echo $this->Crud->show_upload_image('quiz', $quiz['Quiz']);
				}?>
				
				<strong><?php echo __('Description'); ?></strong>: 		
					<?php echo $quiz['Quiz']['description']; ?>
			</div>

			<p>			

			<?php if(!empty($quiz['Question'])) {
				//$first_question = $quiz['Question'][0]['id'];
				echo '<p><span class="glyphicon glyphicon-th-list"> </span> ';
				echo $this->Html->link('Commencez l\'exercice en mode images', array('controller'=>'quizzes', 'action'=>'startquiz', $quiz['Quiz']['id'], 0));

				echo '</p><p></p><span class="glyphicon glyphicon-sunglasses"> </span> ';
				echo $this->Html->link('Commencez l\'exercice en mode aveugle', array('controller'=>'quizzes', 'action'=>'startquiz', $quiz['Quiz']['id'], 1));

				echo '</p><p></p><span class="glyphicon glyphicon-pencil"> </span> ';
				
				echo $this->Html->link('Commencez l\'exercice en mode clavier', array('controller'=>'quizzes', 'action'=>'startquiz', $quiz['Quiz']['id'], 2));
				echo '</p>';
			} else {
				echo "No available questions for this quiz";
				}?>
</p>
</div>

<div class="row fatty bordered">
	
	<h4>Questions dans cet exercice</h4>
		<?php //debug($quiz['Question']);?>
		<small class="pull-right">
				<?php echo $this->Html->link(__('Questions dans ce test'), array('controller'=>'questions', 'action' => 'index', $quiz['Quiz']['id']), ['class'=>'list']); ?> | 
	
			<a href="javascript:" id="save-order" class=" green-gradient">Sauvegarder l'ordre des questions</a>
		</small>

		<table class="table table-striped" id="sort">
			<?php foreach($quiz['Question'] as $question) :?>
				<tr id="<?php echo $question['id'];?>">
					<td><?php echo $question['index'];?></td>
					<td><?php echo $question['text'];?>
					<span class="pull-right checked response">
						<?php 
						foreach($question['Response'] as $response) {
							echo $response['title'], "&nbsp;";
						}?>
							</span>
					</td>
				</tr>
			<?php endforeach;?>
		</table>
</div>

	</div>

<?php if($User['role']=='Admin'):?>

	<div class="actions selfish">
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Questions dans ce test'), array('controller'=>'questions', 'action' => 'index', $quiz['Quiz']['id']), ['class'=>'list']); ?> </li>
			<li><?php echo $this->Html->link(__('Editer cet exercice'), array('action'=>'edit', $quiz['Quiz']['id']), ['class'=>'edit']);?></li>
			<li><?php echo $this->Html->link(__('Ajouter une question à ce test'), array('controller' => 'questions', 'action' => 'add', $quiz['Quiz']['id']), ['class'=>'add']); ?> </li>
			<li><?php echo $this->Html->link(__('Resultats de ce test'), array('controller'=>'quiz_instances', 'action' => 'index', $quiz['Quiz']['id']), ['class'=>'list']); ?> </li>
		</ul>
	</div>
<?php endif;?>
</div>

<script>
	
	$('document').ready( function() {				
		<?php echo $this->element('sort_js', array('controller'=>'questions'));?>
	
	});
	
</script>

