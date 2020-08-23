<div class="fatty">
	<div class="row">
		<h2>Professeur: <?php echo $user['Professeur']['nom'];?>,  <?php echo $user['Professeur']['prenom'];?>
						<span class="pull-right"><?php echo $this->Crud->show_avatar($user['Profile']);?></span>
		</h2>
		<p>Date de votre derni&egrave;re visite: <?php echo $this->Time->niceShort($user['User']['last_login']);?></p>
		<p>Courriel: <?php echo $user['Professeur']['courriel'];?></p>
		<p style="text-align: right;">
			<?php echo $this->Html->link('Editer ma fiche de professeur', 
			array('controller'=>'professeurs', 'action'=>'edit', $user['Professeur']['id']), array('class'=>'edit'));?> 
			<?php echo $this->Html->link('Editer mon profil personnel', array('controller'=>'profiles', 'action'=>'edit', 'admin'=>false, $user['Profile']['id']), array('class'=>'edit'));?> 
		</p>
	</div>
<div class="row captioned blue">
	<h4>Mes Cours:
	<small class="pull-right"><a href=javascript:">
		<?php echo $this->Html->link('Ajouter un nouveau cours', array('controller'=>'cours', 'action'=>'add'), ['class'=>'add']);?></a></small>
	</h4>

	<table class="table table-striped">
		<tr><th>Titre</th><th>Horaire</th></tr>
		<?php foreach($user['Professeur']['Cours'] as $cours) :?>
		<tr>
			<td><?php echo $this->Html->link($cours['titre'], array('controller'=>'cours', 'action'=>'view', $cours['id']));?></td>
			<td><?php echo $cours['horaire'];?></td>
			
		</tr>
		<?php endforeach;?>
	</table>
</div>

		<div class="row captioned green">
			<h4>Mes &Eacute;l&eacute;ments: </h4>
			<?php //debug($totals);?>
			<table class="table table-striped">
				
				<tr><th>Categorie</th><th>Nombre</th><th>Action</th></tr>
				<tr><th><?php echo $this->Html->link('Dossiers', array('controller'=>'projects', 'action'=>'index'), ['class'=>'list']);?> </th>
					<td><?php echo $totals['nb_projects'];?> </td>
					<td> <?php echo $this->Html->link(__('Ajouter un dossier'), 
					array('controller'=>'project', 'action'=>'add', 'admin'=>true), ['class'=>'add']);?></td>
				</tr>
	
				<tr><th><?php echo $this->Html->link('Documents', array('controller'=>'documents', 'action'=>'index'), ['class'=>'list']);?> </th>
					<td><?php echo $totals['nb_documents'];?> </td>
					<td> <?php echo $this->Html->link(__('Ajouter un document'), 
					array('controller'=>'documents', 'action'=>'add', 'admin'=>true), ['class'=>'add']);?></td>
				</tr>
				<tr>
					<th><?php echo $this->Html->link('Exercices', array('controller'=>'quizzes', 'action'=>'index'), ['class'=>'list']);?></th>
					<td><?php echo $totals['nb_quizzes'];?> </td>				
					<td><?php echo $this->Html->link('Ajouter un exercice', array('controller'=>'quizzes', 'action'=>'add'), ['class'=>'add']);?></td>
				</tr>
				<tr>
					<th><?php echo $this->Html->link('Ressources', array('controller'=>'ressources', 'action'=>'index'), ['class'=>'list']);?></th>
					<td><?php echo $totals['nb_ressources'];?> </td>
					<td><?php echo $this->Html->link('Ajouter une ressource', array('controller'=>'ressources', 'action'=>'add'), ['class'=>'add']);?></td>
				</tr>
				<tr>
					<th><?php echo $this->Html->link('Personnages', array('controller'=>'personnages', 'action'=>'index'), ['class'=>'list']);?></th>
					<td><?php echo $totals['nb_personnages'];?> </td>
					<td><?php echo $this->Html->link('Ajouter un personnage', array('controller'=>'personnages', 'action'=>'add'), ['class'=>'add']);?></td>
				</tr>
				<tr>
					<th><?php echo $this->Html->link('Chansons', array('controller'=>'chansons', 'action'=>'index'), ['class'=>'list']);?></th>
					<td><?php echo $totals['nb_chansons'];?> </td>
					<td><?php echo $this->Html->link('Ajouter une chanson', array('controller'=>'chansons', 'action'=>'add'), ['class'=>'add']);?></td>
				</tr>
				<tr>
					<th><?php echo $this->Html->link('Vocabulaires', array('controller'=>'vocabulaires', 'action'=>'index'), ['class'=>'list']);?></th>
					<td><?php echo $totals['nb_vocabulaires'];?> </td>
					<td><?php echo $this->Html->link('Ajouter une page de vocabulaire', array('controller'=>'vocabulaires', 'action'=>'add'), ['class'=>'add']);?></td>
				</tr>
				<tr>
					<th><?php echo $this->Html->link('Diaporama', array('controller'=>'slideshows', 'action'=>'index'), ['class'=>'list']);?></th>
					<td><?php echo $totals['nb_vocabulaires'];?> </td>
					<td><?php echo $this->Html->link('Ajouter un diaporama', array('controller'=>'slideshows', 'action'=>'add'), ['class'=>'add']);?></td>
				</tr>
				
			</table>
		</div>


	<?php //debug($user);?>
</div>
