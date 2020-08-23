<?php //debug($User);?>
<div class="fatty">
	

<h3>Bonjour, <?php echo $User['name'];?>
<small class="pull-right">
	<?php if($User['professor']) :?>
		Professeur
	<?php else:?>
		Etudiant au cours de <?php echo $User['cours'];?>
	<?php endif;?>
	</small>
</h3>

<?php echo $this->element('aujourdhui');?>
	<ul class="list-inline">
			<li>Liens utiles: </li>
			<li><a href="http://csusb.kanopystreaming.com.libproxy.lib.csusb.edu/category/languages/french" target="_blank">Films fran&ccedil;ais sur Kanopy</a></li>
			<li><a href="http://wikipedia.fr/index.php" target="_blank">Wikipedia en fran&ccedil;ais</a></li>
			<li><a href="https://www.google.fr/maps" target="_blank">Google maps en fran&ccedil;ais</a></li>
			<li><a href="http://www.europe1.fr" target="_blank">Europe 1 (radio fran&ccedil;aise)</a></li>
	</ul>
	
<?php echo $this->element('display_tilegroup', ['group_title'=>'home_page']);?>



<?php if($User['role']=='Admin'):?>
	<div class="admin">
		<small class="pull-right">
			<?php echo $this->Html->link('Ajouter une tuile', array('controller'=>'tile_groups', 'admin'=>true, 'action'=>'add', 'Page', 0));?>
		</small>
	</div>
<?php endif;?>

</div>

<script>
	$( document ).ready(function() {
	
			//$("#devoirs").load('/devoirs/latest');
			//$("#chanson").load('/chansons/latest');
			//$('h4 a').attr('target', '_blank');
			$('video').attr('autoplay', false);
			
});
</script>

