<p>Nous sommes le: 
		<?php 
				$englishdate =  date('Y-m-d H:i:s');
				$fdate = $this->Time->format($englishdate,  '%A %e %B %Y - Il est %Hh:%M');
				echo $this->Crud->display_french_date($fdate);
		?>
</p>

