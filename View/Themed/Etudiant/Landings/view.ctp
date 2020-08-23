<div class="fatty view">
<?php //debug($landing);?>
	<h2><?php echo $landing['Cours']['titre'];  ?>
	<small class="pull-right"><?php echo $this->Crud->professor_view($landing['Professeur']);?></small>
	</h2>
	<?php //debug($landing['Professeur']);?>
	<h3><?php echo $landing['Cours']['horaire']; ?></h3>

	<h4><?php echo $landing['Landing']['title']; ?></h4>

	<div class="row">
		<?php echo $landing['Landing']['description']; ?>
	</div>

	<p class="centered">
		<?php echo $this->Html->link('S\'identifier...', array('controller'=>'users', 'action'=>'login'));?> | 
		<?php echo $this->Html->link('Créer un compte étudiant...', array('controller'=>'users', 'action'=>'register', $landing['Landing']['id']));?>
	</p>
</div>
