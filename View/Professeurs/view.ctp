<div class="fatty view">
	<?php //debug($professeur);?>
	<h2><?php echo __('Professeur'); ?>
	
		<small class="pull-right">
		<span class="glyphicon glyphicon-envelope"> </span>
		<?php echo $this->Html->link(	'Contacter ce professeur', array('controller'=>'profiles', 'action'=>'contact', $professeur['Creator']['profile_id']));?>
		</small>
	</h2>
	
	<dl class="dl-horizontal">
		<dt><?php echo __('Nom'); ?></dt>
		<dd>
			<?php echo $this->Crud->professor_name($professeur['Professeur']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Courriel'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['courriel']); ?>
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
				<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($professeur['Professeur']['phone']); ?>
		</dd>	

		<dt><?php echo __('Profil personnel'); ?></dt>
		<dd>
			<?php echo $this->Html->link($professeur['Creator']['name'], 
			array('controller' => 'profiles', 'action' => 'view', 'admin'=>false, $professeur['Creator']['profile_id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>


</div>

