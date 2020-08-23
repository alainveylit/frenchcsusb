<?php echo $this->element('tinymce');?>
<div class="fatty form">
<?php echo $this->Form->create('Cour'); ?>
<?php //debug($professeur);?>
<h2>Professeur: <?php echo $professeur['nom'], ", ", $professeur['prenom'];?></h2>
<hr>

	<fieldset>
		<legend><?php echo __('Ajouter un Cours'); ?></legend>
	<?php
		echo $this->Form->input('ccode', ['label'=>'ccode', 'style'=>'width: 200px;', 'after'=>' <small><i>Code d\'acc&egrave;s au cours</i>. Exemple: csusb_fr_102</small>']);
		echo $this->Form->input('titre', ['style'=>'width: 600px;']);
		echo $this->Form->input('horaire', ['style'=>'width: 600px;']);
		echo $this->Form->input('salle', ['style'=>'width: 500px;']);
		echo $this->Form->input('banniere', ['style'=>'width: 600px;']);
		echo $this->Form->hidden('professeur_id', array('value'=>$professeur['id']));
		echo $this->Form->input('description', ['label'=>'Description du cours']);
		echo $this->Form->hidden('creator', array('value'=>$creator));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Mes Cours'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Etudiants'), array('controller' => 'etudiants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter un Etudiant'), array('controller' => 'etudiants', 'action' => 'add')); ?> </li>
	</ul>
</div>
