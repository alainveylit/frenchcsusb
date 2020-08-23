<div class="fatty view">
	<?php //debug($lesson);?>
		<div class="selfish row">
			<?php echo $this->Crud->view_crud('Lesson', $lesson['Lesson']);?>

		<?php if($User['role']=='Admin') :?>
		<?php 
			if(empty($lesson['Devoir']['lesson_id'])) {
				echo $this->Html->link('Ajouter les devoirs', array('controller'=>'devoirs', 'action'=>'add', $lesson['Lesson']['id']));
			} else {
				echo $this->Html->link('Editer les devoirs', array('controller'=>'devoirs', 'action'=>'edit', $lesson['Devoir']['id']));
			}
		?>
		<?php endif;?>
		</div>
	<div>
		<h2><?php echo $lesson['Cours']['titre'];?> : <?php echo $lesson['Lesson']['titre']; ?> 
		<small class="pull-right">
			<?php $englishdate = $this->Time->format($lesson['Lesson']['jour'],  'Le %e %B %Y à %H:%Mh');			
			 echo $this->Crud->display_french_date($englishdate);?>
			 </small>
		</h2>
		
	</div>
	
<div class="row">
	
		<div class="row" id="devoirs"></div>
	
			<div class="row category captioned orange">
			
			<h4>Synopsis
				<small class="pull-right">
					<?php echo $this->Html->link('Editer', array('action'=>'edit',$lesson['Lesson']['id'], 'synopsis'), ['class'=>'edit']);?> 
					<span class="glyphicon glyphicon-triangle-bottom"> </span> </small>
			</h4>
			<div>
				<?php echo $lesson['Lesson']['synopsis']; ?>
			</div>
		</div>
		<div class="row category captioned yellow">
			
			<h4>Civilisation
				<small class="pull-right">
					<?php echo $this->Html->link('Editer', array('action'=>'edit',$lesson['Lesson']['id'], 'civilisation'), ['class'=>'edit']);?> </small>
			</h4>
			<div>
				<?php echo $lesson['Lesson']['civilisation']; ?>
			</div>
		</div>

		<div class="row category captioned grenat">
			<h4>Grammaire
				<small class="pull-right">
					<?php echo $this->Html->link('Editer', array('action'=>'edit',$lesson['Lesson']['id'], 'grammaire'), ['class'=>'edit']);?> </small>
			</h4>
			<div>
				<?php echo $lesson['Lesson']['grammaire']; ?>
			</div>
		</div>

		<div class="row category captioned blue">
			<h4>Lecture
				<small class="pull-right"><?php echo $this->Html->link('Editer', array('action'=>'edit',$lesson['Lesson']['id'], 'lecture'), ['class'=>'edit']);?> </small>
			</h4>
			<div>
				<?php echo $lesson['Lesson']['lecture']; ?>
			</div>
		</div>

		<div class="row category captioned purple">
			<h4>Vocabulaire
				<small class="pull-right"><?php echo $this->Html->link('Editer', array('action'=>'edit',$lesson['Lesson']['id'], 'idiomes'), ['class'=>'edit']);?> </small>
			</h4>
			<div>
				<?php echo $lesson['Lesson']['idiomes']; ?>
			</div>
		</div>

		<div class="row category  captioned beige">
			<h4>Dict&eacute;e
				<small class="pull-right"><?php echo $this->Html->link('Editer', array('action'=>'edit',$lesson['Lesson']['id'], 'dictee'), ['class'=>'edit']);?> </small>
			</h4>
			<div>
				<?php echo $lesson['Lesson']['dictee']; ?>
			</div>
		</div>

		<div class="row category captioned blue">
			<h4><?php echo __('Exercices optionnels pour cette leçon: '); ?></h4>
			
			<?php if (!empty($lesson['Quiz'])): ?>
				<table class="table table-striped">
				<tr>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Type'); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php foreach ($lesson['Quiz'] as $quiz): ?>
					<tr>
						<td><?php echo $this->Html->link($quiz['title'],array('controller' => 'quizzes', 'action' => 'view', $quiz['id'])); ?></td>
						<td><?php echo $quiz['type']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('Lire'), array('controller' => 'quizzes', 'action' => 'view', $quiz['id'])); ?>
							<?php if($User['role']=='Admin'):?>
								<?php //echo $this->Html->link(__('Editer'), array('controller' => 'quizzes', 'action' => 'edit', $quiz['id'])); ?>
								<?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'quizzes', 'action' => 'delete', $quiz['id']), array(), __('Are you sure you want to delete # %s?', $quiz['id'])); ?>
							<?php endif;?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
		<?php endif; ?>
		
		
		</div>

		<div class="row category  captioned lavender">
			<h4>Diaporamas: </h4>
				<ul>
					<?php foreach ($lesson['Slideshow'] as $slideshow): ?>
						<li>Diaporama: <?php echo $this->Html->link($slideshow['title'],array('controller' => 'slideshows', 'action' => 'view', $slideshow['id'])); ?></li>
					<?php endforeach; ?>
				</ul>

			</ul>

</div>
		<?php if($User['role']=='Admin'):?>
			<div class="actions">
				<h3><?php echo __('Actions'); ?></h3>
				<ul class="list-inline">
					<li><?php echo $this->Html->link(__('Editer cette Leçon'), array('action' => 'edit', $lesson['Lesson']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Effacer cette Leçon'), array('action' => 'delete', $lesson['Lesson']['id']), array(), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('Liste des Leçons'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Nouvelle Leçon'), array('action' => 'add', $lesson['Cours']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add', $lesson['Cours']['id'])); ?> </li>
				</ul>
			</div>
		<?php endif;?>

</div>

<?php if(isset($lesson['Devoir']['id'])) :?>
<script>
	$( document ).ready(function() {	
			$("#devoirs").load('/devoirs/view/<?php echo $lesson['Devoir']['id'];?>');
			
			$(".captioned h4").click( function() {
				$(this).next().toggle();
			});
			
	});
</script>
<?php endif; ?>
