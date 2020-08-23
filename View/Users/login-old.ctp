<style>
.input-group { padding: 12px 0; margin: auto; }
img { width: 70%; margin: auto; float: right; }
.cartouche { border: 1px dotted lightgray; overflow: auto; padding: 1em; }
#logo  img { width: 200px; margin: auto; float: none; }
#logo { text-align: center; width: inherit; }
</style>

<div class="container">
	<div class="panel cartouche centered">
		<div class="col-lg-6">
			<img src="/img/musiciens.jpg">
		</div>
		
		<div class="col-lg-6">
			<div class="input-group centered __input-sm">
			<h2><?php echo __d('users', 'Identifiants'); ?></h2>
				<?php echo $this->Session->flash('auth');?>
				
					<h4 class="text"><i class="glyphicon glyphicon-log-in"> </i>
						Enter username and password to continue.
					</h4>
	    		<hr>

				<fieldset>				
					<?php echo $this->Form->create('User', array('action'=>'login'));?>
					
                 <div class="input-group __input-sm">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input class="form-control" type="text" id="username" name="username"  placeholder="User name" />
                    </div>
                   <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input class="form-control" type="password" id="plain_password" name="plain_password" placeholder="Password" />
                    </div>

					<?php echo $this->Form->end("Login");?>
				</fieldset>

				<ul class="list-inline centered text">
					<li><?php echo $this->Html->link(__('Or create an account ... '), array('action'=>'register'));?></li>
					<li><?php echo $this->Html->link(__('I forgot my password ... '), array('action'=>'renew_password'));?></li>
				</ul>
						
				<div id="logo">
					<img src="/css/images/LeroyLute_small.png" alt="" />
				</div>
			</div>
		</div>
	</div>
</div>




