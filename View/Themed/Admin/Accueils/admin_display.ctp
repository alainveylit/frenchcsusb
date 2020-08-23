<div class="row view">
	<div >
		<?php echo $accueil['Accueil']['description']; ?>

		<?php if(!empty($accueil['Accueil']['image'])) {
				echo $this->Crud->show_upload_image('accueil', $accueil['Accueil']);
		}?>
	</div>
		<p class="centered"><span class="glyphicon glyphicon-hand-right"> </span> <a href='/users/login'>Entrez ici!</a></p>
</div>
