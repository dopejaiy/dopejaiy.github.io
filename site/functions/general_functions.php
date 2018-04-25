<?php
function pr($val)
{
    echo '<pre>';
    print_r($val);
    echo '</pre>';
}

function prx($val)
{
    echo '<pre>';
    print_r($val);
    echo '</pre>';
    exit;
}

function getFileExtension($str)
{
    $i = strrpos($str,".");
    if (!$i) { return ""; }

    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

function dt_format($dtVal,$format = 'dateonly')
{
    if($dtVal == '000-00-00' || $dtVal == '0000-00-00 00:00:00')
    {
        return 'N/A';
    }
    
    if($format == 'dateonly')
    return date("F d, Y", strtotime($dtVal));

    else
    if($format == 'dateonly_short')
    return date("M d, Y", strtotime($dtVal));

	else
    if($format == 'date_time')
    return date("F d, Y h:i A", strtotime($dtVal));
	
	else
    if($format == 'date_time_seconds')
    return date("F d, Y h:i:s A", strtotime($dtVal));

    else
    if($format == 'date_dashboard')
    return date("F d, Y", strtotime($dtVal));

    else
    if($format == 'date_short')
    return date("jS M Y", strtotime($dtVal));

	else
    if($format == 'tournament_start_end_date_format')
    return date("M d", strtotime($dtVal));

	else
    if($format == 'tournament_start_end_date_format_with_year')
    return date("M d, Y", strtotime($dtVal));

	else
    if($format == 'tournament_time_format')
    return date('h:i A', strtotime($dtVal));

	else
    if($format == '24h_format')
    return date('H:i', strtotime($dtVal));

	else
    if($format == 'calendar_date')
    return date("Y-m-d", strtotime($dtVal));

} //end function

function number_format_money($amountVal) {
    
	if(!empty($amountVal))
		return number_format((float)$amountVal, 2, '.', '');
	else
	if($amountVal ==0)
		return '0.00';	
	else
		return '';
}

function months_drop_down($name, $selected_val = '',$classCss = 'input_box')
{
	$drop_down = '<select name="'.$name.'" id="'.$name.'" data-stripe="exp_month" class="'.$classCss.'">';
    $drop_down .= '<option value="-1">Month</option>';
	
	for($monthI=1;$monthI<=12;$monthI++)
	{
		
	   $selected = '';       
       if($monthI == $selected_val)
       {
           $selected = 'selected="selected"';    
       }
	   
		$drop_down .= '<option value="'.str_pad($monthI, 2,"0",STR_PAD_LEFT).'" '.$selected.'>'.date("F",strtotime("2015-$monthI-01"))." (".str_pad($monthI, 2,"0",STR_PAD_LEFT).')'.'</option>';
	}
		
	$drop_down .= '</select>';
   
   return $drop_down;
}

function year_drop_down($name, $selected_val = '',$classCss = 'form-control')
{
	$drop_down = '<select name="'.$name.'" id="'.$name.'" data-stripe="exp_year" class="'.$classCss.'">';
    $drop_down .= '<option value="-1">Year</option>';
	
	$sYear = date("Y");
	$eYear = $sYear+6;
	
	for($yearI=$sYear;$yearI<=$eYear;$yearI++)
	{
		$selected = '';       
		if($yearI == $selected_val)
		{
		   $selected = 'selected="selected"';    
		}
		
		$drop_down .= '<option value="'.substr($yearI, -2).'" '.$selected.'>'.$yearI.'</option>';
	}
		
	$drop_down .= '</select>';
   
   return $drop_down;
}

function generate_order_id($order_id)
{
	$orderStr = "POD-";
	return $orderStr.str_pad($order_id, 5, '0', STR_PAD_LEFT );
}


?>