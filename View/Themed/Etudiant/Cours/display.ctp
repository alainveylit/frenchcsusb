<?php //debug($cours['Tuile']);?>

<div class="fatty">
	<h2><?php echo $cours['Cour']['banniere'];?>
	<small class="pull-right"><?php echo $this->Crud->professor_view($cours['Professeur']);?></small></h2>
	<h4><?php echo $cours['Cour']['horaire'];?></h4>

	<hr>
			
	<div id="devoirs"></div>
	<?php if(!isset($User)):?>
		<div class="centered">
			<p><?php echo $this->Html->link("Créez un compte sur ce site", array('controller'=>'users', 'action'=>'register'));?>			
			</p>
		</div>
	<?php return; endif;?>
<hr>
<div class="tuiles">
<?php 
	$i=0; 
	foreach ($cours['Tuile'] as $tuile) {
		echo $this->element('tuile', array('tuile'=>$tuile, 'index'=>$i++, 'count'=>count($cours['Tuile'])));
	}
?>
</div>

<?php /*

	<div class="course-description captioned green">
		<h4>Télécharger la <?php echo $this->Html->link('description du cours', array('controller'=>'documents', 'action'=>'preview', 11));?></h4>

		<h5>Note les liens ci-dessus ne marcheront que si vous vous êtes identifiés au préalable.</h5>
		<h3>Les livres du cours:</h3>
		<ul>
			<li>French for Oral and Written Review, 5th edition. Charles Carlut, Walter Meiden, Heinle & Heinle, Thomson Learning</li>
			<li>Candide, de Voltaire.  Petits Classiques Larousse, édité par Yves Bomati</li>
			<li>Huis Clos, de Jean-Paul Sartre. Edition Gallimard, collection Folio.</li>
		</ul>
	</div>
*/?>
</div>

<script>
	$( document ).ready(function() {	
			$("#devoirs").load('/devoirs/latest');
			$(".chanson").load('/chansons/latest');
			$(".ressource").load('/ressources/latest');
			$(".exercice").load('/quizzes/latest');
			$(".personnage").load('/personnages/latest');
			$(".vocabulaire").load('/vocabulaires/latest');
			
});
</script>

