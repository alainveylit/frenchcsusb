<style>
	h2 { margin-left: 3em; text-shadow: 1px 1px 0 white;}
	ul { list-style:none; }
	div.round { display: block; }
	div.columns-wrapper {
		width: 900px;
		margin: auto;
	}
</style>

<div class="favorites view">
<?php //debug($types); ?>

<div class="columns-wrapper">
	
		<div class="column-left" style="border-right: 1px solid lightgray;">
			<h2><?php echo __('Favorites');?></h2>
			<div class="round">
			<ul>
				<?php /* foreach($types as $type=>$param) :?>
					<li>			
						<?php echo $this->Html->link(__("My favorite " . $type . "s"), 
								array('action'=>'list_all', $type),
								array('class'=>'controllers ' . $type, 'id'=>$type)
							); 
						?>
					</li>
				<?php endforeach;*/?>
				<li>
					<?php echo $this->Html->link(	__('My login'), 
										array('controller'=>'users', 'action'=>'edit', $User['id']), 
										array('class'=>"my-login controllers"));?>
				</li>
				<li><?php echo $this->Html->link(__('My profile'),
										array('controller'=>'profiles', 'action'=>'edit', $User['profile_id']), 
										array('class'=>"my-profile controllers"));?>
				</li>
				<li><?php echo $this->Html->link(__('My instruments'), 
										array('controller'=>'instruments', 'action'=>'my_instruments'), 
										array('class'=>"my-instruments controllers"));?>
				</li>
			
				</ul>
			</div>
		</div>
		<div class="column-right">
			<h2>My features</h2>
			<div class="round">
			<ul>
				<li><?php echo $this->Html->link(__('My comments'), 
										array('controller'=>'comments', 'action'=>'index'), 
										array('class'=>"annotations controllers"));?>
				</li>
				<li>
					<?php echo $this->Html->link(__('My footsteps'), 
										array('controller'=>'profiles', 'actions'=>'footsteps'), 
										array('class'=>"footsteps controllers"));?>
				</li>			
				<li>
					<?php echo $this->Html->link(__('My donations'), 
										array('controller'=>'profiles', 'actions'=>'thankyou'), 
										array('class'=>"donations controllers"));?>
				</li>
			</ul>	
			</div>
		</div>		
	</div>
</div>
