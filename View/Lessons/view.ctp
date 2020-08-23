<style>
.list-group-item.active a, .list-group-item.active:hover a, .list-group-item.active:focus { color: #fff; }
</style>
<?php //debug($lesson);?>
<div class="row">
	<div class="col-lg-2">
		<ul id="my-lesson-menu"class="list-group" >
			<li class="list-group-item" style="background: lavender;"><strong><a href="javascript:" id="collapse">Categories</a></strong></li>
				<li class="list-group-item trigger" id="synopsis">Synopsis</li>
				<li class="list-group-item trigger" id="civilisation">Civilisation</li>
				<li class="list-group-item trigger" id="grammaire">Grammaire</li>
				<li class="list-group-item trigger" id="lecture">Lecture</li>
				<li class="list-group-item trigger" id="idiomes">Vocabulaire</li>
				<li class="list-group-item trigger" id="dictee">Dictee</li>
				<li class="list-group-item trigger" id="mes_devoirs">Devoirs</li>			
		</ul>
	</div>
	<div class="col-lg-10">
	<h3><?php echo $lesson['Lesson']['titre'];?>
		<small class="pull-right">
		<?php 
			$englishdate = $this->Time->format($lesson['Lesson']['jour'],  '%A %e %B %Y à %H:%M');
			echo $this->Crud->display_french_date($englishdate);
		 ?>
		</small>
	</h3>
		<div id="lesson-content" class="cartouche"></div>
			<hr>
			<h4>Les exercices:</h4>
			<ul>
				<?php foreach($lesson['Quiz'] as $quiz):?>
					<li><?php echo $this->Html->link($quiz['title'], array('controller'=>'quizzes', 'action'=>'view', $quiz['id']));?></li>
				<?php endforeach;?>
			</ul>
			<?php //debug($lesson['Quiz']); ?>
			<div class="row category  captioned lavender">
			<h4>Diaporamas: </h4>
				<ul>
					<?php foreach ($lesson['Slideshow'] as $slideshow): ?>
						<li>Diaporama: <?php echo $this->Html->link($slideshow['title'],array('controller' => 'slideshows', 'action' => 'view', $slideshow['id'])); ?></li>
					<?php endforeach; ?>
				</ul>
		</div>
	</div>
</div>


<script>
	
	$( document ).ready(function() {
		
		var lesson_id=<?php echo $lesson['Lesson']['id'];?>;
		var devoir_id = <?php echo ($lesson['Devoir']['id']==null) ? 0 : $lesson['Devoir']['id'];?>;
		var default_url = '/lessons/load/'+lesson_id;

		// side menu display
		$('#collapse').click( function() {
			$('.trigger').toggle();
			
		});
		
		function check_screen() {
			var w = $('#my-lesson-menu').width();
			var win_w = $(window).width();
			if(w==win_w) { $('.trigger').hide(); }
			else { $('.trigger').show(); }			
			
		}
		
		$( window ).resize(function() {
			check_screen();
			
		});
				var lesson_drive = new MenuDrive( { menu_id: "my-lesson-menu", dom_id: 'lesson-content', default_html: default_url, history: true, exit_url: '/cours/view' } );

				lesson_drive.set_functions ( 
				{
						"synopsis"	  : function()  { lesson_drive.jget( { url:default_url }); },
						"civilisation": function() 	{ lesson_drive.jget( { url:'/lessons/load', params: { id: lesson_id, category: 'civilisation'} } );  	},
						"grammaire":	function() 	{ lesson_drive.jget( { url:'/lessons/load', params: { id: lesson_id, category: 'grammaire'} } ); },
						"lecture":		function()  { lesson_drive.jget( { url:'/lessons/load', params: { id: lesson_id, category: 'lecture'} } );   }, 
						"idiomes": 		function() 	{ lesson_drive.jget( { url:'/lessons/load', params: { id: lesson_id, category: 'idiomes'} } );  },
						"dictee": 		function() 	{ lesson_drive.jget( { url:'/lessons/load', params: { id: lesson_id, category: 'dictee'} } ); 	 },
						"mes_devoirs": 	function() 	{ lesson_drive.jget( { url:'/devoirs/view', params: { id: devoir_id} } ); 	 }
				});


/*
			<?php if(isset($lesson['Devoir']['id'])) :?>
						$("#devoirs").load('/devoirs/view/<?php echo $lesson['Devoir']['id'];?>');
			<?php endif; ?>			
			$(".category h4").click( function() {
				$(this).next().toggle();
			});
*/			
});
</script>

