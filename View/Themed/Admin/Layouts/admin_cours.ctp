<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('Administrative area ', 'Dashboard');
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
									'write-leftbar',
									'controls',
									'admin'
								));

		echo $this->Html->script(
					array(	'libraries/jquery/js/jquery', 
							'bootstrap/bootstrap', 
							'libraries/jquery/js/jquery-ui.custom',
							'jquery.form',
							'libraries/gritter/jquery.gritter',
							'libraries/bPopup/jquery.bpopup.min.js',
							'respond.min',
							'controls',
							'jquery.crossword'
					
					));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	
<style>
.pink { background: pink; padding-top: 24px; }
</style>
	<div id="admin-container">
		
		<?php echo $this->element('nav-bar');?>
		
		<div class="row" id="content">

				<?php  if(isset($User) && isset($User['id'])) :?>
					<ul id="latest" class="list-inline pull-right">
							<li><span class="glyphicon glyphicon-download"> </span> 
							<?php echo $this->Html->link('Plan du cours', array('controller'=>'documents', 'action'=>'preview', 4));?></li>
							<li><span class="glyphicon glyphicon-book"> </span> 
							<?php echo $this->Html->link('Leçons', array('controller'=>'lessons', 'action'=>'index'));?></li>	
									
							<li><span class="glyphicon glyphicon-question-sign"> </span> 
							<?php echo $this->Html->link('Exercices', array('controller'=>'quizzes', 'action'=>'index'));?></li>	
									
							<li><span class="glyphicon glyphicon-link"> </span> 
							<?php echo $this->Html->link('Ressources', array('controller'=>'ressources', 'action'=>'index'));?></li>
							
							<li><span class="glyphicon glyphicon-user"> </span> 
							<?php echo $this->Html->link('Personnages', array('controller'=>'personnages', 'action'=>'index'));?></li>			

					</ul>
				<?php endif;?>

		<div class="row wrapper">
			
			<div class="col-lg-2 pink">
				<?php echo $this->element('left-menu');?>

			</div>
			<div class="col-lg-10">
				<div class="right">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
				</div>
			</div>
		</div>
		
		</div>
		
		<div id="footer" class="row">

		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>

