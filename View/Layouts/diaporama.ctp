<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

$cakeDescription = __d('Classe de Français', 'Classe de Français 102 et 202');
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
									'keyboard' 
								));

		echo $this->Html->script(
					array(	'libraries/jquery/js/jquery', 
							'bootstrap/bootstrap', 
							'libraries/jquery/js/jquery-ui.custom',
							'jquery.form',
							'libraries/gritter/jquery.gritter',
							'keyboard',			
					));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<div id="container-fluid">
		<div class="row" id="_content">
				
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer" class="row">
			<p 
			<?php echo $this->Html->link(
					$this->Html->image('/css/images/paris-residence-etudiante-studelites-2.jpg', array('alt' => $cakeDescription, 'border' => '0', 'style'=>'width: 100%')),
					'/img/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>

</body>
</html>
