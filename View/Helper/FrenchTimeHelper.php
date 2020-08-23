<?php
       App::import( 'Helper', 'Time' );
            $time = new TimeHelper;
      
	class FrenchTimeHelper extends TimeHelper
{
		function display_french_date($date)
{
		$french = $this->niceShort($data);
		$months=array("January"=>"Janvier", "February"=>"Fevrier","March"=>"Mars","April"=>"Avril");
		foreach($months as $month=>$frenchmonth) {
			preg_replace("/{$month}/", $frenchmonth, $french);
		}
		return $french;
}
//--------------------------------------------------------------


}
