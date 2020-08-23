<div class="container-fluid">
<?php //debug($profiles);?>
	<div class="fatty white cartouche">
	
	<h2><?php echo __('Profils des participants');?></h2>
	
	<div class="panel panel-default">
	  <!-- Default panel contents -->
			  <div class="panel-heading"> <?php echo $this->Html->link(__("Editer mon profil"), array('action'=>'edit', $User['profile_id']));?> 
					
			  </div>

			<table class="table table-striped" >
					
					<tr>
						<th><?php echo $this->Paginator->sort('name', 'Nom');?></th>
						<th><?php echo $this->Paginator->sort('occupation');?></th>
						<th><?php echo $this->Paginator->sort('country', 'Pays');?></th>
						<!--th class="actions"><?php /* __('Actions');*/?></th-->
					</tr>		
				<?php
				//$i = 0;
				foreach ($profiles as $profile):
				if(empty($profile['Profile']['name'])) continue;
			?>

			<tr>
				
				<td>
					<?php echo $this->Html->link($profile['Profile']['name'], 
						array('action'=>'view', $profile['Profile']['id']),
						array('title'=>'View complete profile'));?>
					<?php /*echo $this->Html->link($profile['Profile']['name'], 
						'mailto:' . $profile['User']['email'], array('title'=>'Send an email')); */?>
				</td>
				<td><?php echo $profile['Profile']['occupation'];?></td>
				<td>
					<?php $location = $profile['Profile']['city'] . ' ' . 
							$profile['Profile']['region'] . ' ' . $profile['Profile']['country'];
							echo $location;
					?>
				</td>						
			</tr>
			<?php endforeach; ?>
			</table>
</div>

			<div class="row"></div>
				<p>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
				));
				?>	</p>

				<ul class="pager">
					<li><?php echo $this->Paginator->prev('<< ' . __('précédent '), array(), null, array('class'=>'disabled'));?></li>
					| <li><?php echo $this->Paginator->numbers();?></li>
					<li><?php echo $this->Paginator->next(__(' suivant') . ' >>', array(), null, array('class' => 'disabled'));?></li>
				</ul>
			</div>
			
		</div>
