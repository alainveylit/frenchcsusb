<?php

    ob_end_clean();

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: ".gmdate("D, d M Y H:i:s", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y")))." GMT");
    header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
    header("Content-Length: ".$document['Document']['size']);
    //header("Content-Disposition: inline; filename=".(string)$document['Download']['filename']);
    header("Content-Transfer-Encoding: binary\n");

  // Set the MIME type header and file name.
  	header('Content-type: ' . $document['Document']['type'] . '; charset=utf-8');
  	header('Content-Disposition: attachment; filename="' . $document['Document']['document'] . '"');

    echo $content_for_layout;

?>
