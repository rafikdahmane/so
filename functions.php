<?php
function redirect($url){
    if (!headers_sent()){    
        header('Location: '.$url); exit;
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}


function drop_down_from_table($select_name, $int_id, $str_name, $table_name, $selected_id=null) {
  $output = "<select name=$select_name>\n";
	$query = "select $int_id, $str_name from $table_name";
	$result = mysql_query($query);	
	while($row = mysql_fetch_assoc($result)) {
		$int_id_field = $row["$int_id"];
		$str_name_field = $row["$str_name"];
		
		if ((isset($selected_id)) && ($selected_id === $row["$int_id"] ) ) {
		  $output .= "\t<option value=\"$int_id_field\" selected=\"selected\">$str_name_field</option>\n";
	  } else {
      $output .= "\t<option value=\"$int_id_field\">$str_name_field</option>\n";	    
	  }
	}	
	$output .= "\t</select>\n\n";	
	return $output;
}

?>