<div class="container-fluid">
	
<div class="fatty white cartouche">
<h2><?php echo __('Profil'); ?>

<small class="pull-right">
	<ul class="list-inline">
	<?php if($owner==true) : ?>
	<li><span class="glyphicon glyphicon-edit"> </span>
		<?php echo $this->Html->link('Editer mon profil', array('action'=>'edit'));?>
	</li>
	<li>
	<span class="glyphicon glyphicon-user"> </span>
		<?php echo $this->Html->link('Editer mes identifiants', array('controller'=>'users', 'action'=>'edit'));?>
	</li>
		<?php endif?>
	<li>
	<span class="glyphicon glyphicon-envelope"> </span>
		<?php echo $this->Html->link('Contacter cette personne', array('action'=>'contact', $profile['Profile']['id']));?>
	</li>
	</ul>
	</small>
</h2>
<?php //debug($profile);?>
	<div class="panel panel-default">
		<div class="panel-heading">Information personnelle
		<small class="pull-right">Status: <strong><?php echo $profile['User']['role'];?></strong></small>
		</div>
			<div class="panel-body">				
				<div class="col-lg-6">
					<?php echo $this->Crud->show_avatar($profile['Profile']);?>
						<dl class="dl-horizontal">
							<dt><?php echo __('Nom'); ?></dt>
							<dd>
								<?php echo h($profile['Profile']['name']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Occupation'); ?></dt>
							<dd>
								<?php echo h($profile['Profile']['occupation']); ?>
								&nbsp;
							</dd>
							<dt><?php echo __('Date de naissance'); ?></dt>
							<dd>
								<?php echo h($profile['Profile']['birthday']); ?>
								&nbsp;
							</dd>
						</dl>
					</div>
					
					
			<div class="col-lg-6">		
					<dl class="dl-horizontal">
						<dt><?php echo __('Adresse'); ?></dt>
						<dd>
							<?php echo h($profile['Profile']['address']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Ville'); ?></dt>
						<dd>
							<?php echo h($profile['Profile']['city']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Region'); ?></dt>
						<dd>
							<?php echo h($profile['Profile']['region']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Code postal'); ?></dt>
						<dd>
							<?php echo h($profile['Profile']['ZIP']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Pays'); ?></dt>
						<dd>
							<?php echo h($profile['Profile']['country']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Telephone'); ?></dt>
						<dd>
							<?php echo h($profile['Profile']['phone']); ?>
							&nbsp;
						</dd>
					</dl>
				</div>
			</div>
	</div>

	<div class="panel panel-default">			
		<div class="panel-heading"><h3 class="panel-title">Données personnelles</h3></div>
			<div class="panel-body">
				<?php echo $profile['Profile']['notes']; ?>
			</div>
		</div>
	<div class="panel panel-default">			
		<div class="panel-heading"><h3 class="panel-title">Medias sociaux
		
			<?php 
			if($User['Profile']['id']==$profile['Profile']['id']):?>
				<small class="pull-right">
					<ul class="nav nav-pills">
						<li title="Liens vers Facebook, page WEB, etc.">		
							<a href="javascript:" id="add_social_media_link" class="social-link"> 
								<span class="glyphicon glyphicon-link"> </span> 
								Ajouter un lien</a>
							<?php //echo $this->Html->link('Add a social media link', array('controller'=>'social_media_links', 'action'=>'add'));?>
						</li>			
					</ul>
				</small>
			<?php endif;?>
		</h3></div>
			<div class="panel-body" >
				<div id="media-link" style="position: relative"></div>
				<?php //debug($profile['SocialMediaLink']);?>
				
				<?php echo $this->element('social_media', array('SocialMediaLink'=>$profile['SocialMediaLink']));?>
			</div>
		</div>

<?php /*
	<div class="panel panel-default">
			
		<div class="panel-heading"><h3 class="panel-title">Settings</h3></div>
			<div class="panel-body">
				<div class="col-lg-6">
					<ul class="list-inline">
						<li><?php echo ($profile['Profile']['notify']) ? 'Accepts email notifications' : 'Does not accept email notifications'; ?>
						</li>
						<li><?php echo ($profile['Profile']['public']) ? 'Profile is accessible to the members of the group' : 'Profile is private'; ?>
						</li>
						<li>Last modified: <?php echo $this->Time->niceShort($profile['Profile']['modified']); ?>
						</li>
					</ul>
	
					
					
				</div>

				<div class="col-lg-6">
					
					
				</div>
			</div>
			* */?>
		</div>


		<div class="actions">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-inline">
				<li><span class="glyphicon glyphicon-list"> </span> <?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?> </li>

			<?php if($owner==true) : ?>
					<li><span class="glyphicon glyphicon-edit"> </span> <?php echo $this->Html->link(__('Edit my profile'), array('action' => 'edit', $profile['Profile']['id'])); ?> </li>
					
					<li><span class="glyphicon glyphicon-trash"> </span> 
					<?php echo $this->Form->postLink(__('Delete my account'), 
					array('controller'=>'users', 'action'=>'delete', $User['id']), array('class'=>'cut'), __('Are you sure you want to delete your account on this site?'));?></li>
					<?php //echo $this->Html->link(__('List Instruments'), array('controller' => 'instruments', 'action' => 'index')); ?>
					<?php //echo $this->Html->link(__('New Instrument'), array('controller' => 'instruments', 'action' => 'add')); ?>
				<?php endif;?>
			</ul>
		</div>

</div>

</div>

<script>
	
	
	$('document').ready( function() {

			$('#add_social_media_link').click( function() {
				$('#media-link').load(router + "social_media_links/add");
				$('#media-link').bPopup({
					easing: 'easeOutBack', //uses jQuery easing plugin
					speed: 450,
					transition: 'slideDown'
				});
				//$('.expose').trigger('click');
			});
		
			
			
	});

</script>
