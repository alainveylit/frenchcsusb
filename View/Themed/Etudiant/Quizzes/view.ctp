<style>
.inset { max-width: 150px; }

</style>
<div class="selfish fatty">
	<div class="selfish row"><?php echo $this->Crud->view_crud('Quiz', $quiz['Quiz']);?></div>

	<div class="row">
		<h2><?php echo __('Exercice no.'); ?><?php echo h($quiz['Quiz']['id']); ?>: <?php echo h($quiz['Quiz']['title']); ?>
		</h2>
			<p class="pull-right">			
				Catégorie: <?php echo $this->Html->link($quiz['Category']['title'], 
					array('controller' => 'categories', 'action' => 'view', $quiz['Category']['id'])); ?> 
					Type: <?php echo h($quiz['Quiz']['type']); ?>
			</p>

		<div class="cartouche">
			<?php if(!empty($quiz['Quiz']['image'])) {
				//echo $this->Crud->show_quiz_image('quiz', $quiz['Quiz']['image'], $quiz['Quiz']['image_dir']);
				echo $this->Crud->show_upload_image('quiz', $quiz['Quiz']);
			}?>
			
			<strong><?php echo __('Description'); ?></strong>: 		
				<?php echo $quiz['Quiz']['description']; ?>
		</div>

		<p><?php 
			if(!empty($quiz['Question'])) {
				$first_question = $quiz['Question'][0]['id'];
				echo $this->Html->link(__("Commencez le test!"), 
						array("controller"=>"questions", "action"=>"view", $first_question));
			} else {
				echo "No available questions for this quiz";
				}?>
		</p>
</div>

<?php if($User['role']=='Admin'):?>

	<div class="actions selfish">
		<ul>
			<li><?php echo $this->Html->link(__('Editer cet exercice'), array('action'=>'edit', $quiz['Quiz']['id']));?></li>
			<li><?php echo $this->Html->link(__('Ajouter une question à ce test'), array('controller' => 'questions', 'action' => 'add', $quiz['Quiz']['id'])); ?> </li>
		</ul>
	</div>
<?php endif;?>
</div>


