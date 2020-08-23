<div class="vocabulaires fatty">
<h3><?php echo __('Page de Vocabulaire'); ?>
<small class="pull-right">Cours: 
			<?php echo $this->Html->link($vocabulaire['Cours']['titre'], array('controller' => 'cours', 'action' => 'view', $vocabulaire['Cours']['id'])); ?>
</small>
</h3>
<div>
			<div class="cartouche">
				<?php if(!empty($vocabulaire['Vocabulaire']['image'])) {
					//echo $this->Crud->show_quiz_image('quiz', $quiz['Quiz']['image'], $quiz['Quiz']['image_dir']);
					echo $this->Crud->show_upload_image('vocabulaire', $vocabulaire['Vocabulaire']);
				}?>
			</div>

	<?php echo $vocabulaire['Vocabulaire']['vocables']; ?>
</div>

</div>
