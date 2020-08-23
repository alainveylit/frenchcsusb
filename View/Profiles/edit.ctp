<?php echo $this->element('tinymce');?>
<style>
	
.fixed-input .checkbox  { width: 100%; }
.fixed-input .checkbox input { width: 100px; float: right; }
.fixed-input .checkbox label { width: 200px; float: left;}
.fixed-input select { margin-left: 2em; }
</style>
<div class="container-fluid">
	
	<div class="white cartouche">
	<?php //echo $this->Form->create('Profile', array('class'=>'form-horizontal')); ?>
	<?php echo $this->Form->create('Profile', array(
    'class' => 'form-horizontal',
	'role' => 'form',
	'type'=>'file'
    ));
    
    $statuses = array('Freshman'=>'Freshman', 'Sophomore'=>'Sophomore', 'Junior'=>'Junior', 'Senior'=>'Senior', 'Graduate'=>'Graduate', 'Post-Graduate'=>'Post-Graduate');
    if($User['role']!='etudiant') {
		$statuses = array('Professeur'=>'Professeur', 'Etudiant'=>'Etudiant', 'Visiteur'=>'Visiteur');
	}
?>
		
	<div class="well well-xs">
		<h2><?php echo $this->Form->value('name'); ?> <small class="pull-right">Mon profil</small></h2>
	</div>
	<div class="panel panel-default">
		
    
 
	<!--div class="panel-heading"><h3>Personal information</h3></div-->
		<div class="panel-body">
		<h4><strong>Remplissez au minimum les champs requis: </strong>: nom, ville et pays de résidence. Le reste est optionnel.
			Vous pouvez éditer votre profil quand vous le désirez, en cliquant sur le lien situé en haut de l'écran sous 
			le menu "Paramètres". 
			 
		</h4>
			<div class="col-lg-6">
				
				<fieldset class="fixed-input">
					<legend class="alert alert-info">Information Personnelle</legend>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name', array('label'=>'Nom'));
					echo $this->Form->input('occupation', array('label'=>'Statut', 'options'=>$statuses));
					echo $this->Form->input('major', array('label'=>'Sp&eacute;cialit&eacute;'));					
					echo $this->Form->input('minor', array('label'=>'Mineur'));
					
					echo $this->Form->input('birthday', array('type'=>'text', 'style'=>'width:250px', 'label'=>'Date de naissance'));
					echo $this->Form->input('avatar', array('type'=>'file', 'label'=>'avatar'));
					
					echo $this->Crud->show_avatar($this->request->data['Profile']);
					
					//echo $this->Form->input('notify', array('label'=>'Send me email notifications'));
					//echo $this->Form->input('public', array('label'=>'Make my profile public'));
			?>
				</fieldset>
			</div>

			<div class="col-lg-6">	
				<fieldset  class="fixed-input">
						<legend class="alert alert-info xs">Contact</legend>
					<?php 
						echo $this->Form->input('address', array('label'=>'Adresse'));
						echo $this->Form->input('city', array('label'=>'Ville'));
						echo $this->Form->input('region', array('label'=>'Region'));
						echo $this->Form->input('ZIP', array('label'=>'Code postal'));
						echo $this->Form->input('country', array('label'=>'Pays'));
						echo $this->Form->input('phone', array('label'=>'Telephone'));
						
					?>
				</fieldset>
			</div>
		</div>
		<fieldset class="fixed-input">
			
		<?php
				//echo $this->Form->input('notify', array('label'=>'Send me email notifications'));
				//echo $this->Form->input('public', array('label'=>'Make my profile public'));
		?>
		</fieldset>
	</div>

	<div class="panel panel-default">
	<div class="panel-heading"> Données personnelles </div>
		<div class="panel-body">
			<?php echo $this->Form->input('notes',array('label'=>false));?>
		</div>
	</div>

		<?php 
		//echo $this->Form->input('picture_id');
		//echo $this->Form->input('avatar');
		//echo $this->Form->input('user_id');		
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Valider')); ?>
</div>

<?php /*
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">

		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Instruments'), array('controller' => 'instruments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instrument'), array('controller' => 'instruments', 'action' => 'add')); ?> </li>
	</ul>
</div>
*/?>

<script>
	
	
	$(function() {
		$( "#ProfileBirthday" ).datepicker({
			defaultDate: '2000-01-01',
			dateFormat: 'yy-mm-dd', 
			changeMonth: true,
			changeYear: true,
			//minDate: '1930-01-01',
			//maxDate: '2010-01-00',
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			}
		});
		

		
		$('#add-portrait').click( function() {
				$('#image-form').load('/images/add_author_portrait');
				
		});

	});
</script>

