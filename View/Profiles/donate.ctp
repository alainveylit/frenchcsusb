<style>
input[type="image"] {
	width: auto;
}
hr {
	margin: 2em;
}
.cartouche { border: 1px solid gray; }
</style>
<?php //debug($profile);?>

<div class="view" style="padding:50px;">

	<h2><?php 
	//debug($crumbs);
			$downloads=1; 
			$last_collection = $crumbs[$item_id]; 
			//debug($last_collection); 
			$last_item_title = urldecode($last_collection['title']);
			$controller=strtolower($last_collection['model']) .'s';
			$custom_id = substr($last_collection['model'], 0, 1) . $last_collection['id'];
			
			echo $this->Html->link( $last_item_title, 
						array('controller'=>$controller, 'action'=>'view', $last_collection['id']));
	?></h2>
	
		<h3>Thank you for making a donation to <?php echo $creator['User']['Name'];?> for this document.</h3>
	

		<p>
			This donation goes directly to the creator of the file, without further intervention from the owner of the site.
		</p>
		<p>
			The suggested donation amount by <?php echo $creator['User']['Name'];?> is: 
					<strong>$<?php echo $last_collection['suggested_donation'];?></strong> 
		</p>

		
		<hr/>

		<div class="centered">
			
			<p >Click on the <i>Make a donation</i> button below to proceed with this transaction: </p>
			
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_donations">
						<input type="hidden" name="business" value="<?php echo $creator['User']['email']; ?>">
						<input type="hidden" name="item_name" value="<?php echo $last_item_title;?>">
						<input type="hidden" name "quantity" value="">
						<input name="amount" value="<?php echo $last_collection['suggested_donation'];?>" type="hidden">
						<input type="hidden" name="item_number" value="MusicFileDonation.<?php echo $custom_id;?>">
						<input name="image_url" value="http://musickshandmade.com/lute/img/Django-logo-transparent.png" type="hidden">
						<input type="hidden" name="no_shipping" value="0">
						<input type="hidden" name="no_note" value="1">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="tax" value="0">
						<input type="hidden" name="lc" value="US">
						<input type="hidden" name="bn" value="PP-DonationsBF">	
						<input type="hidden" maxlength="255" size="30" value="<?php echo $custom_id;?>" name="custom" id="custom" class="textBox">					
						<input name="return" value="http://musickshandmade.com/lute/collections/thankyou/<?php echo $custom_id;?>" type="hidden">
						<input name="cancel_return" value="http://musickshandmade.com/lute/" type="hidden">
						<input type="hidden" name="notify_url" value="http://musickshandmade.com/lute/profiles/process_ipn" />
						<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" border="0"  style="width:110px;" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
						<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" style="width:auto;">
				</form>

		</div>
</div>

	<?php 
		//debug($crumbs);

		if( !empty($crumbs)) : ?>
		
				<h4>You have recently viewed the following files by <?php echo $creator['User']['Name'];?>:</h4>
		
				<ol>
				<?php foreach($crumbs as $label => $item) {
					//debug($item);
						$title = (empty($item['title'])) ? "[Untitled]" :  urldecode($item['title']);
							if( $item['creator'] == $creator['User']['id']) { 
								$controller = strtolower($item['model']) . 's';
								echo '<li>', $this->Html->link($title, array('controller'=>$controller, 'action'=>'view', $item['id']) ), '</li>'; 	
							}
						$downloads+=1;
					}
				?>	
				</ol>
				
	<?php endif;?>



<?php // debug($cookie);?>
