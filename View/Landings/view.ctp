<?php //debug($landing);  ?>
<div class="cartouche wide-margins">

	<h3><?php echo $landing['Cours']['titre'];  ?> 
		<small class="pull-right"><?php echo $landing['Cours']['horaire']; ?> -- <?php echo $landing['Cours']['salle'];?>
		</small>
	</h3>
	<h4>
			<small class="pull-right">Enseignant: <?php echo $this->Crud->professor_view($landing['Professeur']);?>
			<?php if(isset($landing['Syllabus']['id'])) :?>
				<span class="glyphicon glyphicon-list-alt"> </span>
					<?php echo $this->Html->link('Voir le plan du cours', array('controller'=>'documents', 'action'=>'view', $landing['Syllabus']['id']));?>
			<?php endif;?>
		</small>
	</h4>
	
	 <p class="pull-right"><?php echo $this->element('aujourdhui');?></p>

	<div class="cartouche row bordered">
		<h4><?php echo $landing['Landing']['title']; ?></h4>
		<div>
			<?php echo $landing['Landing']['description']; ?>
		</div>
	
	<div>
		<ul class="list-inline">
		<?php echo $this->Html->link('Ma leçon', array('controller'=>'cours', 'action'=>'view'));?>
	</div>

		<div class="">
			<?php //debug($landing['TileGroup']);?>
		<?php foreach($landing['TileGroup'] as $tile): ?>
			<?php //echo $this->element('display_tilegroup', array('group_title'=>$tile['title']));?>
			<?php echo $this->element('tile_group', array('tile_group'=>$tile, 'cols'=>$tile['columns'], 'index'=>$tile['index']));?>
			<?php endforeach;?>
		</div>
	</div>
	
		<p class="centered">
			<?php echo $this->Html->link('S\'identifier...', array('controller'=>'users', 'action'=>'login'));?> | 
			<?php echo $this->Html->link('Créer un compte étudiant...', 
					array('controller'=>'users', 'action'=>'enregistrement', $landing['Cours']['ccode']));?>
		</p>

</div>
