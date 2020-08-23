			<header id="top" class="navbar navbar-default bs-docs-nav" role="banner">
				<nav class="navbar-default"> <?php /*navbar-fixed-top*/?>
					<div class="navbar-header ">
						<a class="navbar-brand" id="exit"> Accueil </a>
						<ul class="nav navbar-nav" id="main-menu">
							<?php if(isset($User)) : ?>
								<li class="trigger" id="cours"> <span class="glyphicon glyphicon-download"> </span> Mon cours</li>
								<li class="trigger" id="lessons"><span class="glyphicon glyphicon-book"> </span> Lecons</li>
								<li class="dropdown">
									<a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">Ressources<span class="caret"></span></a>
									<ul role="menu" class="dropdown-menu">
								<li class="trigger" id="exercices"><span class="glyphicon glyphicon-question-sign"> </span> Exercices</li>
								<li class="trigger" id="histoires"><span class="glyphicon glyphicon-book"> </span> Histoires</li>
										<li class="trigger" id="vocabulaires"><span class="glyphicon glyphicon-list"> </span> Vocabulaires</li>
											<li class="trigger" id="chansons"><span class="glyphicon glyphicon-music"> </span>Chansons</li>
											<li class="trigger" id="ressources"><span class="glyphicon glyphicon-link"> </span> Ressources</li>
											<!--li class="trigger" id="presentations"><span class="glyphicon glyphicon-film"> </span> Présentations</li-->
									</ul>
								</li>
								<li class="trigger" id="blog"><span class="glyphicon glyphicon-pencil"> </span>Mon cahier</li>
								
								<li class="trigger" id="presentations"><span class="glyphicon glyphicon-film"> </span> Présentations</li>
								
							<?php endif;?>
						</ul>
					</div>
				      <ul class="nav navbar-nav navbar-right" id="actions">
						 <?php if(isset($User)) : ?>
							<li id="profile"><a href="/profiles/view"><?php echo $User['name'], ": ",  $User['cours'];?></a> </li>
							<li  id="logout" style="padding-right: 24px"><a href="/users/logout" ><span class="glyphicon glyphicon-log-out"> </span>  Sortie </a> </li>
						  <?php else: ?>
							<li  id="login" style="padding-right: 24px"><a href="/users/login" > <span class="glyphicon glyphicon-log-in"> </span> Enregistrement</a> </li>
						<?php endif;?>
					</ul>
				</nav>
			</header>
			
			<?php //debug($User);?>
<script>
	
	var cours_id=<?php echo $User['cours_id'];?>;
	
			$( document ).ready(function() {
	
				var quiz_drive = new MenuDrive( { menu_id: "main-menu", dom_id: 'content', default_html: '/exercices', exit_url: '/landings/display' } );
							
				quiz_drive.set_functions ( 
					{
						"exercices": 		function() 	{ quiz_drive.redirectPage('/quizzes/display');  	},
						"cours":			function() 	{ quiz_drive.redirectPage('/cours/view'); /*$('#current_action').text( 'presentation');*/},
						"ressources":		function()  { quiz_drive.redirectPage('/ressources');  }, 
						"lessons": 			function() 	{ quiz_drive.redirectPage('/lessons'); },
						"chansons": 		function() 	{ quiz_drive.redirectPage('/chansons/tiled');	 },
						"blog": 			function() 	{ quiz_drive.redirectPage('/etudiant/blogs');	 },
						"login": 			function() 	{ quiz_drive.redirectPage('/users/login');	 },
						"logout": 			function() 	{ quiz_drive.redirectPage('/users/logout');	 },
						"profile": 			function() 	{ quiz_drive.redirectPage('/users/profiles/view');	 },						
						"presentations": 	function() 	{ quiz_drive.redirectPage('/etudiant/presentations');	 },	
						"histoires": 		function() 	{ quiz_drive.redirectPage('/stories');	 },
						"vocabulaires": 	function() 	{ quiz_drive.redirectPage('/vocabulaires');	 }
										
						//"videos": 		function() 	{ quiz_drive.openFile('/videos'); 	 }
					});
	
		$('.toggler').click( function() {
			$(this).parent().next().toggle();
		});

});
</script>
