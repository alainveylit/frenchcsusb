<style>
.category { border: 1px dotted gray;  margin-bottom: 24px; }
.category h4 { background: rgba(200,150,150, .78); padding: 12px 24px; margin: 0 0 20px 0;}
.category div { padding: 12px 24px; }
.inset { max-width: auto; }
</style>

<div class="fatty view">
	<?php //debug($lesson);?>
		<div class="selfish row"><?php echo $this->Crud->view_crud('Lesson', $lesson['Lesson']);?>
		<?php if($User['role']=='Admin') :?>
		<?php 
			if(empty($lesson['Devoir']['lesson_id'])) {
			echo $this->Html->link('Ajouter les devoirs', array('controller'=>'devoirs', 'action'=>'add'));
		} else {
			//echo $this->Html->link('Editer les devoirs', array('controller'=>'devoirs', 'action'=>'edit', $lesson['Devoir']['id']));
		}
		?>
		<?php endif;?>
		</div>

		<h2><?php echo utf8_encode($lesson['Lesson']['titre']); ?>: 
		<small class="pull-right">
			<?php $englishdate = $this->Time->format($lesson['Lesson']['jour'],  'Le %e %B %Y à %H:%Mh');			
			 echo $this->Crud->display_french_date($englishdate);?>
			 </small>
		</h2>


		<div class="row category">
			<h4>Grammaire</h4>
			<div>
				<?php echo $lesson['Lesson']['grammaire']; ?>
			</div>
		</div>

		<div class="row category">
			<h4>Lecture</h4>
			<div>
				<?php echo $lesson['Lesson']['lecture']; ?>
			</div>
		</div>

		<div class="row category">
			<h4>Idiomes</h4>
			<div>
				<?php echo $lesson['Lesson']['idiomes']; ?>
			</div>
		</div>

		<div class="row category">
			<h4>Dict&eacute;e</h4>
			<div>
				<?php echo $lesson['Lesson']['dictee']; ?>
			</div>
		</div>

			<div id="devoirs"></div>

<div class="fatty related">
	<h3><?php echo __('Exercices optionnels pour cette leçon: '); ?></h3>
	
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
				<?php echo $this->Html->link(__('Editer'), array('controller' => 'quizzes', 'action' => 'edit', $quiz['id'])); ?>
				<?php echo $this->Form->postLink(__('Effacer'), array('controller' => 'quizzes', 'action' => 'delete', $quiz['id']), array(), __('Are you sure you want to delete # %s?', $quiz['id'])); ?>
				<?php endif;?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


		<?php if($User['role']=='Admin'):?>
			<div class="actions">
				<h3><?php echo __('Actions'); ?></h3>
				<ul class="list-inline">
					<li><?php echo $this->Html->link(__('Editer cette Leçon'), array('action' => 'edit', $lesson['Lesson']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Effacer cette Leçon'), array('action' => 'delete', $lesson['Lesson']['id']), array(), __('Are you sure you want to delete # %s?', $lesson['Lesson']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('Liste des Leçons'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Nouvelle Leçon'), array('action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('Liste des exercices'), array('controller' => 'quizzes', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Nouvel exercice'), array('controller' => 'quizzes', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		<?php endif;?>

		</div>
</div>

<?php if(isset($lesson['Devoir']['id'])) :?>
<script>
	$( document ).ready(function() {
	
			$("#devoirs").load('/devoirs/view/<?php echo $lesson['Devoir']['id'];?>');
			
});
</script>
<?php endif; ?>
