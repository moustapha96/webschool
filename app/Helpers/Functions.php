<?php
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function get_setting($code) 
{
	if (Setting::where('code', $code)->exists())
	{
		$setting = Setting::where('code', $code)->first();
		return $setting->value;
	}
	else
		return '';
}

function skip_accents($str, $charset='utf-8' ) {

	$str = htmlentities( $str, ENT_NOQUOTES, $charset );
	
	$str = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
	$str = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $str );
	$str = preg_replace( '#&[^;]+;#', '', $str );
	
	return $str;
}

function is_active($val1, $val2)
{
	if ($val1 == $val2) {
		return "active";
	}
	else
		return '';
}

function is_expend($val1, $val2)
{
	if ($val1 == $val2) {
		return "is-expanded";
	}
	else
		return '';
}

function sort_date_format_long($dt)
{
	if ($dt == NULL) {
		return '-'  ;  
	}
	else
		return date('d/m/Y H:i', strtotime($dt));
}

function dateToFrench($date, $format) 
{
	$english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	$french_days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
	$english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}

if ( ! function_exists('timezone_list'))
{

	function timezone_list() {
		$zones_array = array();
		$timestamp = time();
		foreach(timezone_identifiers_list() as $key => $zone) {
			date_default_timezone_set($zone);
			$zones_array[$key]['ZONE'] = $zone;
			$zones_array[$key]['GMT'] = 'UTC/GMT ' . date('P', $timestamp);
		}
		return $zones_array;
	}

}

if ( ! function_exists('create_timezone_option'))
{

	function create_timezone_option($old="") {
		$option = "";
		$timestamp = time();
		foreach(timezone_identifiers_list() as $key => $zone) {
			date_default_timezone_set($zone);
			$selected = $old == $zone ? "selected" : "";
			$option .= '<option value="'. $zone .'"'.$selected.'>'. 'GMT ' . date('P', $timestamp) .' '.$zone.'</option>';
		}
		echo $option;
	}

}

if ( ! function_exists('create_option')){
	function create_option($table,$value,$display,$selected="",$where=NULL){
		$options = "";
		$condition = "";
		if($where != NULL){
			$condition .= "WHERE ";
			foreach( $where as $key => $v ){
				$condition.=$key."'".$v."' ";
			}
		}

		$query = DB::select("SELECT $value, $display FROM $table $condition");
		foreach($query as $d){
			if( $selected!="" && $selected == $d->$value ){   
				$options.="<option value='".$d->$value."' selected='true'>".ucwords($d->$display)."</option>";
			}else{
				$options.="<option value='".$d->$value."'>".ucwords($d->$display)."</option>";
			} 
		}
		
		echo $options;
	}
}

function get_user_role($role)
{
	if ($role == 'admin') {
		return "Administrateur";
	}
	elseif ($role == 'supervisor') {
		return "Responsable Péda.";
	}
	elseif ($role == 'accountant') {
		return "Comptable";
	}
	elseif ($role == 'student') {
		return "Etudiant";
	}
	elseif ($role == 'librian') {
		return "Bibliothécaire";
	}
	elseif ($role == 'teacher') {
		return "Professeur";
	}
	else {
		return "Non défini";
	}
}


