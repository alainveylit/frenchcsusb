<?php if(isset($public)) :?>

<?php return; endif;?>

<?php if(empty($SocialMediaLink)) : ?>
	<p>Aucun lien disponible</p>
<?php endif;?>
	
	<div id="media-link" class="expose"></div>

	<ul class="list-inline social-media">
		
		<?php foreach($SocialMediaLink as $link) : ?>
		
			<li>
				<a href="<?php echo $link['link'];?>" target="_blank">
					<span class="<?php echo $link['SocialMedia']['class'];?>"></span>
					<span title="<?php echo $link['link'];?>"> 
						<?php echo h($link['SocialMedia']['name']);?>	
					</span>
				</a>
					<?php if(isset($this->request->params['prefix'])):?>
						<span class="right-aligned wide-margins small-text black-crud">
							<?php echo $this->Html->link('Edit', 
								array('controller'=>'social_media_links', 'action'=>'edit', $link['id']), array('class'=>'edit'));?>
							<?php //echo $this->Crud->related_crud('social_media_links', $link['id'], $User['Profile.id']);?>
						</span>
					<?php endif;?>
			</li>

		<?php endforeach;?>

	</ul>
