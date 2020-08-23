<?php
	$controller = $this->request->params['controller'];
	$action = $this->request->params['action'];
	//debug($controller);
?>

	<div class="left captioned blue">	
			 
		 <?php if(!empty($cours)):?>
		 
			 <h4 class="skinny centered">
				 <span class="glyphicon glyphicon-duplicate"> </span> 
				 <?php echo $this->Html->link('Mes cours', array('controller'=>'cours','action'=>'index'));?></h4>
			 <ul class="vertical-menu">

			<li>
				 <?php echo $this->Html->link('Page d\'accueil', 
					array('controller'=>'cours', 'action'=>'view', 'admin'=>true, $cours['id']), array('class'=>'active'));?></li>
				<li><?php echo $this->Html->link('Ma page prof', array('controller'=>'dashboard', 'admin'=>false));?></li>
				<li><?php echo $this->Html->link('Les etudiants', array('controller'=>'etudiants', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Les leçons', array('controller'=>'lessons', 'action'=>'index', 'admin'=>true));?></li>
				<li><?php echo $this->Html->link('Exercices', array('controller'=>'quizzes', 'action'=>'index',  $cours['id']));?></li>
				<li><?php echo $this->Html->link('Les tests', array('controller'=>'tests', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Les Blogs', array('controller'=>'blogs', 'action'=>'review'));?></li>
				<li><?php echo $this->Html->link('Histoires', array('controller'=>'stories', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Presentations', array('controller'=>'presentations', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Documents', array('controller'=>'documents', 'action'=>'index',  $cours['id']));?></li>
				<li><?php echo $this->Html->link('Les tuiles', array('controller'=>'tile_groups', 'action'=>'index'));?></li>
				<li><?php echo $this->Html->link('Atterissage', array('controller'=>'landings', 'action'=>'view',  $cours['id']));?></li>
				
			</ul>
		<?php else: ?>
			<h4>Liens</h4>
			<ul class="nav nav-pills nav-stacked vertical-menu">	
				<li><?php echo $this->Html->link('Mon profil', array('controller'=>'professeurs', 'action'=>'edit',  'admin'=>true, $User['professeur_id']));?></li>		
				<li><?php echo $this->Html->link('Ressources', array('controller'=>'dashboard', 'admin'=>false));?></li>
				<li><?php echo $this->Html->link('Mes cours', array('controller'=>'cours', 'action'=>'index'));?></li>
				 <?php if($User['role']=='Admin'):?>
				<li><?php echo $this->Html->link('Accueil du site', array('controller'=>'accueils', 'action'=>'view'));?>
				</li>
				<?php endif;?>
				<li><?php echo $this->Html->link('Aide', array('controller'=>'pages', 'action'=>'display', 'admin'=>false, 'aide'));?></li>
				
			</ul>
			<?php endif;?>
	</div>

