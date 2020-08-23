<div class="fatty">
	<?php //debug($cours);?>
	<div>
		<h2><?php echo $cours['Cour']['banniere'];?>
			<small class="pull-right"><?php echo $this->Crud->professor_view($cours['Professeur']);?></small>			
		</h2>
		<h4><?php echo $cours['Cour']['horaire'];?></h4>
		<h4>Salle de classe: <?php echo $cours['Cour']['salle'];?></h4>
		<hr>
		
	<div>
		<div>
			<?php echo $cours['Cour']['description'];?>
		</div>

		<div>
		<?php echo $cours['Cour']['weekly_comments'];?>
		</div>
		<ul class="list-inline">
			<li>Les leçons de la semaine: </li>
				<?php foreach($cours['CurrentLesson'] as $lesson) :?>
					<li><?php echo $this->Html->link(html_entity_decode($lesson['titre']), array('controller'=>'lessons', 'action'=>'view', $lesson['id']));?></li>
				<?php endforeach;?>
			</ul>
	</div>
		<hr>
	</div>
	
	<?php
	
	//debug($cours['Landing']);
		foreach($cours['TileGroup'] as $tile_group) {
		//if(!empty($cours['TileGroup']))  {
			echo $this->element('display_tilegroup', array('group_title'=>$tile_group['title']));
		}
	?>

	<div>
		<?php echo $this->Html->link('Toutes les leçons dans ce cours', array('controller'=>'lessons', 'action'=>'index', 'admin'=>false));?>
		<?php if($User['role']=='Admin') {	
				//echo ' | ', $this->Html->link('Vue étudiant', array('action'=>'view', 'admin'=>false));
				
				echo $this->Crud->view_crud('Cour', $cours['Cour']);	
		}?>

	

	</div>
</div>

<script>
	$( document ).ready(function() {	
		/*
			//$("#devoirs").load('/devoirs/latest');
			$(".chanson").load('/chansons/latest');
			$(".ressource").load('/ressources/latest');
			$(".exercice").load('/quizzes/latest');
			$(".personnage").load('/personnages/latest');
			$(".vocabulaire").load('/vocabulaires/latest');
		*/
	});
</script>

