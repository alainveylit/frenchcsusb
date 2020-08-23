<style>
h4 { padding: 4px; background: gainsboro;}
</style>
<div class="row-fluid">
	<?php //debug($professeur);?>
	<div>
		<?php echo $professeur['Professeur']['presentation'];?>
	</div>
<div class="col-lg-4">

	<img class="inset" style="width: 350px;" src="/img/assemblage-statue-liberte-paris-17.jpg" />
</div>

<div id="contact-info" class="col-lg-8">

<?php //echo $this->Crud->professor_name($professeur['Professeur'])?>

<h4>Information et contact:</h4>
	<dl class="dl-horizontal">
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo $this->Crud->professor_name($professeur['Professeur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courriel'); ?></dt>
		<dd>
			<a href="mailto:<?php echo ($professeur['Professeur']['courriel']); ?>"><?php echo ($professeur['Professeur']['courriel']); ?></a>
			&nbsp;
		</dd>
		<dt><?php echo __('Diplome'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['diplome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adresse'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['adresse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Heures de bureau'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['bureau']); ?>
			&nbsp;
		</dd>
		<?php /*
		<dt><?php echo __('Profil personnel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($professeur['Creator']['name'], 
			array('controller' => 'profiles', 'action' => 'view', 'admin'=>false, $professeur['Creator']['profile_id'])); ?>
			&nbsp;
		</dd>
		* */?>
	</dl>

	<hr>
	<?php //debug($professeur['Cours']);?>
	<h4>Cours disponibles ce trimestre</h4>
	<table class="table table-striped">
		<tr>
			<th>Titre</th>
			<th>Horaire</th>
			<th>Salle de cours</th>
		</tr>
			<?php foreach ($professeur['Cours'] as $cours) :?>
			<?php if($cours['active']) :?>
		<tr>
			<td><?php echo $this->Html->link($cours['titre'], array('controller'=>'cours', 'action'=>'display', $cours['id']));?></td>
			<td><?php echo $cours['horaire'];?></td>
			<td><?php echo $cours['salle'];?></td>		
		</tr>
		<?php endif;?>
	<?php endforeach;?>
	</table>
<div>
<?php //debug($professeur);?>
</div>
