<?php
$action = $this->request->controller . '_' . $this->request->action;
//debug($User);
?>
<nav class="navbar navbar-inverse navbar-top">
      <div class="row-fluid">
		  <div class="navbar-header"> 
			  <button data-target=".bs-navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle collapsed">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand <?php if($action=='pages_display') echo ' active';?>" href="/">
				<span class="fcsusb-logo">Français 350 - Printemps 2020 - CSUSB</span> 
			  </a>
		</div>
    
    <div class="navbar-collapse collapse" id="navbar">		
 
      <ul class="nav navbar-nav navbar-right">

				<?php if(isset($User)):?>
						<?php if($User['role']=='Admin' && isset($User['Professeur']['id'])):?>
							<li><a href="/dashboard"><span aria-hidden="true" class="glyphicon glyphicon-wrench"> </span> 
								Tableau de bord</a>
							</li>
							<?php endif;?>
							
							<li class="dropdown">
								  <a aria-expanded="false" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
									  <span aria-hidden="true" class="glyphicon glyphicon-heart-empty"> </span> 
									  Mes param&egrave;tres<span class="caret"></span></a>
								  <ul role="menu" class="dropdown-menu">
									<li class="dropdown-header">Settings</li>				 
										<li><a id="login-name" href="/users/edit/<?php echo $User['id'];?>">Mes identifiants</a></li>
										<li><a title="Manage my profile" id="profile" href="/profiles/edit/">Mon profil</a></li>
									</ul>
							</li>
							<li><a href="/profiles"><span aria-hidden="true" class="glyphicon glyphicon-user"> </span> Communaut&eacute;</a></li>
							<li><a href="/users/logout"><span aria-hidden="true" class="glyphicon glyphicon-log-out"> </span>Sortie</a></li>
							<li>&nbsp;</li>
						<?php else:?>
							<li><a href="/users/login"><span class="glyphicon glyphicon-log-in"> </span> S'identifier</a></li>
							<li>&nbsp;</li>
						<?php endif;?>
			</ul>
	</div>
  </div>
</nav>


