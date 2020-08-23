<div class="accueils view">
<h2><?php echo __('Elements de la page d\'accueil du site'); ?>
<small class="pull-right">		
	<ul class="list-inline">
		<li><?php echo $this->Html->link("Vue étudiant", array('action'=>'display', 'admin'=>false));?></li>
		<li><?php echo $this->Html->link("Editer", array('action'=>'edit', 'admin'=>true));?></li>
	</ul>	
</small>
</h2>
<hr>
	<dl>
		<dt><?php echo __('Titre'); ?></dt>
		<dd>
			<?php echo h($accueil['Accueil']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo $accueil['Accueil']['description']; ?>
		</dd>
	</dl>

<div class="row cartouche">
	<h4>Image</h4>
	<?php if(!empty($accueil['Accueil']['image'])) {
			echo $this->Crud->show_upload_image('accueil', $accueil['Accueil']);
	}?>
</div>

<div>
	<ul class="list-inline">
		<li>Site cr&eacute;&eacute; par : <?php echo $accueil['Creator']['name'];?></li>
		<li>Modifi&eacute;: <?php echo $accueil['Accueil']['modified'];?></li>
	</ul>
</div>	

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul class="list-inline">
		<li><?php echo $this->Html->link(__('Editer '), array('action' => 'edit', $accueil['Accueil']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Effacer'), array('action' => 'delete', $accueil['Accueil']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $accueil['Accueil']['id']))); ?> </li>
	</ul>
</div>

</div>
