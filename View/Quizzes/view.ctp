<div class="row-fluid wide">
	<?php /*
	<div class="pull-right">
		<span class="glyphicon glyphicon-list"> </span> 
		<?php echo $this->Html->link('Mon cours', array('controller'=>'cours', 'action'=>'display'));?>		
	</div>*/?>

	<div class="row" style="background: lavender; padding: 12px 12px;">
		<?php //debug($quiz);
			if(empty($quiz['Quiz']['id'])) {
				echo "<h3>Désolé: cet exercice n'est pas disponible pour ce cours</h3>";
				echo $this->Html->image('unavailable.jpg');
				return;
			}
		
		?>
		
		<h2><?php echo __('Exercice no.'); ?><?php echo h($quiz['Quiz']['id']); ?>: <?php echo h($quiz['Quiz']['title']); ?></h2>
			<p class="pull-right">			
				Catégorie: <?php echo $this->Html->link($quiz['Category']['title'], 
					array('controller' => 'categories', 'action' => 'view', $quiz['Category']['id'])); ?> 
					Type: <?php echo h($quiz['Quiz']['type']); ?>
			</p>

		<div class="cartouche" style="background: #fcfeff; min-height: 350px; font-size: 18px;">
			<?php if(!empty($quiz['Quiz']['image'])) {
				echo $this->Crud->show_upload_image('quiz', $quiz['Quiz']);
			}?>
			
			<?php if(!empty($quiz['Quiz']['image_url'])) {
				echo $this->Html->image($quiz['Quiz']['image_url'], array('alt'=>'Image', 'class'=>'inset'));
			}?>
			
			<strong><?php echo __('Description'); ?></strong>: 		
				<?php echo $quiz['Quiz']['description']; ?>
		</div>

		<p>		
			<?php if(!empty($quiz['Question'])) {
				
				echo '<p><span class="glyphicon glyphicon-th-list"> </span> ';
				echo $this->Html->link('Commencez l\'exercice', 
					array('controller'=>'quizzes', 'action'=>'run', $quiz['Quiz']['id']));
			} else {
					echo "No available questions for this quiz";
				}?>

		</p>
		
		
		<div>
		</div>
</div>

<?php if($User['role']=='Admin'):?>

	<div class="actions admin">
		<ul class="list-inline">
			<li><?php echo $this->Html->link(__('Editer cet exercice'), array('action'=>'edit', 'admin'=>true, $quiz['Quiz']['id']));?></li>
			<li><?php echo $this->Html->link(__('Ajouter une question à ce test'), array('controller' => 'questions', 'action' => 'add', 'admin'=>true, $quiz['Quiz']['id'])); ?> </li>
		</ul>
	</div>
<?php endif;?>
</div>


