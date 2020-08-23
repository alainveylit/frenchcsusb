<div class="fatty">

<h2>			
	<?php echo $story['Story']['title']; ?>
	<small class="pull-right">
	<?php //echo $this->Crud->Professor_view($story['Professeur']);?>
	 Cours: <?php echo $this->Html->link($story['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $story['Cours']['id'])); ?>
	</small>
	<h4><?php echo $story['Story']['credit'];?></h4>
</h2>

	<div>
			<div class="cartouche">
				<?php if(!empty($story['Story']['image'])) {
					//echo $this->Crud->show_quiz_image('quiz', $quiz['Quiz']['image'], $quiz['Quiz']['image_dir']);
					echo $this->Crud->show_upload_image('story', $story['Story']);
				}?>
			</div>

			<div id="lecture"  style="font-size: 120%">
				<?php echo $story['Story']['histoire']; ?>
			</div>
	</div>
	<div>
		<hr>
		<h4></h4>
		<a href="javascript:" id="extract-links">Voir vocabulaire</a>
		<ul id="vocabulaire-extraction"></ul>
	</div>
	
<script>

//var category="#lecture a";

	$( document ).ready(function() {
		
		$("#extract-links").click( function() {
			$.each($("#lecture a"),function(){
				//console.log($(this).attr('href'));
				//if($(this).attr('href')=='#') {
					$(this).addClass("tip");
					var li = '<li><strong>'+$(this).text()+'</strong>: ' + $(this).attr("title")+'</li>';
					$("#vocabulaire-extraction").append(li);
				//}
			});
		});
		

});
</script>


</div>
