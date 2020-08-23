<?php $home_url = Router::url('/', true);?>

<div class="container">
	<div class="panel cartouche centered">
		<div class="col-lg-4">
			<img src="/img/musiciens.jpg">
		</div>
		
		<div class="col-lg-8">

<div class="tall white">
			
	<h3 class="centered">Please register DjangoTab and become an active contributor!</h3>
		
	<div >
		<p>Developing Django represents enormous work and unfortunately the number of lutenists worldwide is very limited. 
			Registering now can help move the programming along and will save you  money and time in the long run. 
			The registration price,  unchanged since 2000,  is 80 US dollars.
			
		</p>
		
		<div class="row centered">
				<p><strong>Thank you <?php echo $User['name'];?> for registering: </strong></p>

<?php /*
			<div class="col-md-6">	
				<div class="cartouche bordered">	
					<h4>If you are a Django registered user already, click the link below</h4>		
					<form class="centered" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input name="cmd" value="_xclick" type="hidden">
						<input name="business" value="xxx@musickshandmade.com" type="hidden">
						<input name="item_name" value="DjangoTab development donation" type="hidden">
						<input name="item_number" value="DjangoTab_registration" type="hidden">
						<input name="amount" value="50" type="hidden">
						<input name="image_url" value="http://lute.musickshandmade.com/img/Django-logo-transparent.png" type="hidden">
						<input name="no_shipping" value="1" type="hidden">
						<input type="hidden" name="custom" value="<?php echo $User['id'];?>">
						<input name="return" value="<?php echo $home_url;?>users/thankyou/<?php echo $User['id'];?>" type="hidden">
						<input name="cancel_return" value="<?php echo $home_url;?>" type="hidden">
						<input src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="width:110px;" border="0" type="image">
					</form>
					</div>
			</div>
*/?>
			<div class="cartouche bordered fatty">
				<div >	
					<h4>Click the link below to access your PayPal account and make your payment</h4>		
						<form class="centered" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input name="cmd" value="_xclick" type="hidden">
						<input name="business" value="lute@musickshandmade.com" type="hidden">
						<input name="item_name" value="DjangoTab development donation" type="hidden">
						<input name="item_number" value="DjangoTab_registration" type="hidden">
						<input name="amount" value="80" type="hidden">
						<input name="image_url" value="http://lute.musickshandmade.com/img/Django-logo-transparent.png" type="hidden">
						<input name="no_shipping" value="1" type="hidden">
						<input type="hidden" name="custom" value="<?php echo $User['id'];?>">
						<input name="return" value="<?php echo $home_url;?>users/thankyou/<?php echo $User['id'];?>" type="hidden">
						<input name="cancel_return" value="<?php echo $home_url;?>" type="hidden">
						<input src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="width:110px;" border="0" type="image">
					</form>
					</div>
			</div>
		</div>
		
			<div>
				<p class="tall">You will be redirected to your profile page after you make your donation. 
					Once PayPal processes the transaction, you will be notified by email that your contributor 
					 status has been activated. 
				</p>
			</div>

	</div>
	
</div>		
</div>
</div>
</div>
