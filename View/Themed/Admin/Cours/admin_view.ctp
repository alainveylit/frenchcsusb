<?php 
//debug($cour);
//echo $this->Crud->view_crud('Cour', $cour['Cour']);?>
<div class="fatty view">
<h2><span ><?php echo __('Cours'); ?>: <?php echo $cour['Cour']['titre']; ?> </span>
<small class="pull-right">Enseignant: <?php echo sprintf("%s, %s", $cour['Professeur']['nom'], $cour['Professeur']['prenom']); ?></small>


</h2>
	<dl class="dl-horizontal cartouche">
		<dt><?php echo __('Atterissage'); ?></dt>
		<dd>
			<?php 
				if(!empty($cour['Landing']['id'])) {
					echo $this->Html->link($cour['Landing']['title'], 
							array('controller'=>'cours', 'action'=>'view', 'admin'=>false, $cour['Cour']['id']));
				} else {
					echo $this->Html->link('Créer une page d\'accueil pour ce cours', 
							array('controller'=>'landings', 'action'=>'add',  $cour['Cour']['id']));
				}
			?>
		</dd>
		<dt><?php echo __('Adresse WEB'); ?></dt>
		<dd>
			<?php echo $this->Html->url(array('controller'=>'cours', 'action'=>'view', 'admin'=>false, 'full_base'=>true)); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Bannière'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['banniere']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Horaire'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['horaire']); ?> 
		</dd>
		<dt><?php echo __('Salle de classe'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['salle']); ?> 
			&nbsp;
		</dd>
		<dt><?php echo __('Professeur'); ?></dt>
		<dd>
			<?php echo sprintf("%s, %s", $cour['Professeur']['nom'], $cour['Professeur']['prenom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo $cour['Cour']['description']; ?>
			&nbsp;
		</dd>
		<?php /*
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['slug']); ?>
			&nbsp;
		</dd>*/?>
		<dt><?php echo __('Code du cours'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['ccode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifié'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Créé'); ?></dt>
		<dd>
			<?php echo h($cour['Cour']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	
	
</div>
<?php //debug($cour['Landing']);?>
	<div class="row-fluid">
		<?php 
			$i=0; 
			foreach ($cour['TileGroup'] as $tuile) {
				echo $this->element('tile_group', array('tile_group'=>$tuile, 'cols'=>$tuile['columns'], 'index'=>$i++));
			}
		?>
	</div>


<?php //debug($cour['Lesson']);?>

	<?php //echo $this->element('lessons_list', array('lessons'=>$cour['Lesson']));?>

<?php if (!empty($cour['Etudiant'])): ?>
		<?php //echo $this->element('etudiants_list', array('etudiants'=>$cour['Etudiant']));?>
<?php endif; ?>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer ce Cours'), array('action' => 'edit', $cour['Cour']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer ce Cours'), array('action' => 'delete', $cour['Cour']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cour['Cour']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('Liste des Cours'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nouveau Cours'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter un groupe de tuiles'), array('controller'=>'tile_groups', 'action'=>'add', 'Cour', $cour['Cour']['id']));?></li>
	</ul>
</div>
</div>
