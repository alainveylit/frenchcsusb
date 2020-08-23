<div class="fatty">
				<?php 
					echo $this->Form->create('User', array('action'=>'soft_login'));
					echo $this->Form->input('username');
					echo $this->Form->end('Submit');
				
				?>

</div>
