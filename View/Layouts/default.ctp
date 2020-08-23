<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('Classes de Français, Cal State University of San Bernardino ', 'Français, Printemps 2020');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap/css/bootstrap', 
									'jquery.gritter',									
									'jquery-ui',
									'core', 
									//'controls',
									'keyboard' 
								));

		echo $this->Html->script(
					array(	'libraries/jquery/js/jquery', 
							'bootstrap/bootstrap', 
							'libraries/jquery/js/jquery-ui.custom',
							'jquery.form',
							'libraries/gritter/jquery.gritter',
							'libraries/tinymce/js/tinymce/tinymce.min',
							//'libraries/bPopup/jquery.bpopup.min.js',
							'respond.min',
							//'controls',
							'jquery.crossword.js',
							'keyboard',
					
					));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container-fluid">
		
	<?php echo $this->element('nav-bar');?>
		
		<div class="row" id="content">

				<?php  if(isset($User) && isset($User['id'])) :?>
					<ul id="latest" class="list-inline pull-right">
						<li><?php echo $User['name'];?></li>
							<li><span class="glyphicon glyphicon-home"> </span> 
							<?php echo $this->Html->link('Rubriques', array('controller'=>'pages', 'action'=>'display', 'home'));?>
							</li>
							<li><span class="glyphicon glyphicon-download"> </span> 
							<?php echo $this->Html->link('Mon cours', array('controller'=>'cours', 'action'=>'view'));?></li>
							<li><span class="glyphicon glyphicon-book"> </span> 
							<?php echo $this->Html->link('Mes Leçons', array('controller'=>'lessons', 'action'=>'index'));?></li>	
									
							<li><span class="glyphicon glyphicon-question-sign"> </span> 
							<?php echo $this->Html->link('Mes Exercices', array('controller'=>'quizzes', 'action'=>'index'));?></li>	
									
							<li><span class="glyphicon glyphicon-link"> </span> 
							<?php echo $this->Html->link('Mes Ressources', array('controller'=>'ressources', 'action'=>'index'));?></li>
							
							<li><span class="glyphicon glyphicon-music"> </span> 
							<?php echo $this->Html->link('Mes Chansons', array('controller'=>'chansons', 'action'=>'tiled'));?></li>			

					</ul>
				<?php endif;?>


			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="row">
			<p 
			<?php echo $this->Html->link(
					$this->Html->image('bord-du-lac.png', array('alt' => $cakeDescription, 'border' => '0', 'style'=>'width: 100%')),
					'/img/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
		<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

