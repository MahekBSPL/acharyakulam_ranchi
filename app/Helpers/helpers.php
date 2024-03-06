<?php

use Carbon\Carbon;
use App\Models\Admin\WebLogs;
use App\Models\Admin\Menu;
use App\Models\Admin\PhotoGallery;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Admin\PhotoCategory;




/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('convertYmdToMdy')) {
	function convertYmdToMdy($date)
	{
		return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
	}
}

/**
 * Write code on Method
 * //dd(convertYmdToMdy('2022-02-12'));
 * @return response()
 */
if (!function_exists('convertMdyToYmd')) {
	function convertMdyToYmd($date)
	{
		return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
	}
}

if (!function_exists('convertMdyToYmd')) {
	function convertMdyToYmd($date)
	{
		return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
	}
}

// functions for remove html tags form input filed  created by laukesh 
if (!function_exists('clean_single_input')) {
	function clean_single_input($content_desc)
	{
		//$content_desc = trim($content_desc);
		$content_desc = Str::of($content_desc)->trim();
		$content_desc = str_replace('\'', '', $content_desc);
		$content_desc = str_replace('&lt;script', ' ', $content_desc);
		$content_desc = str_replace('&lt;iframe', ' ', $content_desc);
		$content_desc = str_replace('&lt;script&gt;', '', $content_desc);
		$content_desc = str_replace('&lt;SCRIPT&gt;', '', $content_desc);
		$content_desc = str_replace('&lt;SCRIPT', ' ', $content_desc);
		$content_desc = str_replace('&lt;ScRiPt&gt', '', $content_desc);
		$content_desc = str_replace('&lt;ScRiPt &gt', '', $content_desc);
		$content_desc = str_replace('&lt;IFRAME', ' ', $content_desc);

		$content_desc = str_replace('sleep', '', $content_desc);
		$content_desc = str_replace('waitfor delay', '', $content_desc);

		$content_desc = str_replace('iframe', '', $content_desc);
		$content_desc = str_replace('script', '', $content_desc);
		$content_desc = str_replace('window.', '', $content_desc);
		$content_desc = str_replace('prompt', '', $content_desc);
		$content_desc = str_replace('Prompt', '', $content_desc);

		$content_desc = str_replace('confirm', '', $content_desc);
		$content_desc = str_replace('CONTENT=', '', $content_desc);
		$content_desc = str_replace('HTTP-EQUIV', '', $content_desc);
		$content_desc = str_replace('&lt;meta', '', $content_desc);
		$content_desc = str_replace('&lt;META', '', $content_desc);
		$content_desc = str_replace('data:text/html', '', $content_desc);
		$content_desc = str_replace('document.', '', $content_desc);
		$content_desc = str_replace('url', '', $content_desc);
		$content_desc = str_replace('document.createTextNode', '', $content_desc);
		$content_desc = str_replace('document.writeln', '', $content_desc);
		$content_desc = str_replace('document.write', '', $content_desc);
		$content_desc = str_replace('alert', '', $content_desc);
		$content_desc = str_replace('javascript', '', $content_desc);
		$content_desc = str_replace('DROP', '', $content_desc);
		$content_desc = str_replace('CREATE', '', $content_desc);
		$content_desc = str_replace('onsubmit', '', $content_desc);
		$content_desc = str_replace('onblur', '', $content_desc);
		$content_desc = str_replace('onclick', '', $content_desc);
		$content_desc = str_replace('ondatabinding', '', $content_desc);
		$content_desc = str_replace('ondblclick', '', $content_desc);
		$content_desc = str_replace('ondisposed', '', $content_desc);
		$content_desc = str_replace('onfocus', '', $content_desc);
		$content_desc = str_replace('onkeydown', '', $content_desc);
		$content_desc = str_replace('onkeyup', '', $content_desc);
		$content_desc = str_replace('onload', '', $content_desc);
		$content_desc = str_replace('onmousedown', '', $content_desc);
		$content_desc = str_replace('onmousemove', '', $content_desc);
		$content_desc = str_replace('onmouseout', '', $content_desc);
		$content_desc = str_replace('onmouseover', '', $content_desc);
		$content_desc = str_replace('onmouseup', '', $content_desc);
		$content_desc = str_replace('onprerender', '', $content_desc);
		$content_desc = str_replace('onserverclick', '', $content_desc);
		$content_desc = str_replace('[removed]', '', $content_desc);

		$content_desc = str_replace('A=A', '', $content_desc);
		$content_desc = str_replace('1=1', '', $content_desc);

		$content_desc = str_replace('<', '', $content_desc);
		$content_desc = str_replace('>', '', $content_desc);
		$content_desc = str_replace('< >', '', $content_desc);
		$content_desc = str_replace("<''>", "", $content_desc);

		$content_desc = str_replace("%", "", $content_desc);

		$content_desc = str_replace("'or'", "", $content_desc);
		$content_desc = str_replace("'OR'", "", $content_desc);
		$content_desc = str_replace('"OR"', '', $content_desc);
		$content_desc = str_replace('"or"', '', $content_desc);
		$content_desc = str_replace("'A", "", $content_desc);
		$content_desc = str_replace("A'", "", $content_desc);
		$content_desc = str_replace('"A', '', $content_desc);
		$content_desc = str_replace('A"', '', $content_desc);

		$content_desc = str_replace("'1", "", $content_desc);
		$content_desc = str_replace("1'", "", $content_desc);
		$content_desc = str_replace('"1', '', $content_desc);
		$content_desc = str_replace('1"', '', $content_desc);

		$content_desc = str_replace('(', '', $content_desc);
		$content_desc = str_replace(')', '', $content_desc);
		//$content_desc = str_replace("(", "",$content_desc);
		//$content_desc = str_replace(")", "",$content_desc);

		$content_desc = str_replace('||', '', $content_desc);
		$content_desc = str_replace('|', '', $content_desc);
		$content_desc = str_replace('&&', '', $content_desc);
		$content_desc = str_replace('&', '', $content_desc);
		$content_desc = str_replace(';', '', $content_desc);
		$content_desc = str_replace('%', '', $content_desc);
		$content_desc = str_replace('$', '', $content_desc);
		$content_desc = str_replace('"', '', $content_desc);
		$content_desc = str_replace("'", '', $content_desc);
		$content_desc = str_replace('\"', '', $content_desc);
		$content_desc = str_replace("\'", "", $content_desc);
		$content_desc = str_replace('+', '', $content_desc);
		//$content_desc = preg_replace('#[^\w()/.%\-&]#','',$content_desc);
		//$content_desc = str_replace('LF','',$content_desc);
		$content_desc = str_replace('*', '', $content_desc);
		$content_desc = str_replace("'<", "", $content_desc);
		$content_desc = str_replace("'>", "", $content_desc);
		$content_desc = str_replace("<'", "", $content_desc);
		$content_desc = str_replace("'>'", "", $content_desc);
		$content_desc = str_replace("#40", "", $content_desc);
		$content_desc = str_replace("#41", "", $content_desc);
		//$content_desc = preg_replace("/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s","",$content_desc);

		return $content_desc;

	}

}
// functions for  replace Special Char form input filed  created by laukesh 
if (!function_exists('replaceSpecialChar')) {
	function replaceSpecialChar($content_desc)
	{

		$returnText = preg_replace('/[^A-Za-z0-9-.\s]/', '', $content_desc);

		return $returnText;
	}
}
// functions for remove  form input filed  created by laukesh 
if (!function_exists('clean_data_array')) {
	function clean_data_array($aRR)
	{
		$retArr = array();
		foreach ($aRR as $key => $content_desc) {

			//$content_desc = trim($content_desc);
			//$content_desc = Str::of($content_desc)->trim();
			$content_desc = str_replace('\'', '', $content_desc);

			$content_desc = str_replace('&lt;script', ' ', $content_desc);
			$content_desc = str_replace('&lt;iframe', ' ', $content_desc);
			$content_desc = str_replace('&lt;script&gt;', '', $content_desc);
			$content_desc = str_replace('&lt;SCRIPT&gt;', '', $content_desc);
			$content_desc = str_replace('&lt;SCRIPT', ' ', $content_desc);
			$content_desc = str_replace('&lt;ScRiPt&gt', '', $content_desc);
			$content_desc = str_replace('&lt;ScRiPt &gt', '', $content_desc);
			$content_desc = str_replace('&lt;IFRAME', ' ', $content_desc);

			$content_desc = str_replace('sleep', '', $content_desc);
			$content_desc = str_replace('waitfor delay', '', $content_desc);

			$content_desc = str_replace('iframe', '', $content_desc);
			$content_desc = str_replace('script', '', $content_desc);
			$content_desc = str_replace('window.', '', $content_desc);
			$content_desc = str_replace('prompt', '', $content_desc);
			$content_desc = str_replace('Prompt', '', $content_desc);

			$content_desc = str_replace('confirm', '', $content_desc);
			$content_desc = str_replace('CONTENT=', '', $content_desc);
			$content_desc = str_replace('HTTP-EQUIV', '', $content_desc);
			$content_desc = str_replace('&lt;meta', '', $content_desc);
			$content_desc = str_replace('&lt;META', '', $content_desc);
			$content_desc = str_replace('data:text/html', '', $content_desc);
			$content_desc = str_replace('document.', '', $content_desc);
			$content_desc = str_replace('url', '', $content_desc);
			$content_desc = str_replace('document.createTextNode', '', $content_desc);
			$content_desc = str_replace('document.writeln', '', $content_desc);
			$content_desc = str_replace('document.write', '', $content_desc);
			$content_desc = str_replace('alert', '', $content_desc);
			$content_desc = str_replace('javascript', '', $content_desc);
			$content_desc = str_replace('DROP', '', $content_desc);
			$content_desc = str_replace('CREATE', '', $content_desc);
			$content_desc = str_replace('onsubmit', '', $content_desc);
			$content_desc = str_replace('onblur', '', $content_desc);
			$content_desc = str_replace('onclick', '', $content_desc);
			$content_desc = str_replace('ondatabinding', '', $content_desc);
			$content_desc = str_replace('ondblclick', '', $content_desc);
			$content_desc = str_replace('ondisposed', '', $content_desc);
			$content_desc = str_replace('onfocus', '', $content_desc);
			$content_desc = str_replace('onkeydown', '', $content_desc);
			$content_desc = str_replace('onkeyup', '', $content_desc);
			$content_desc = str_replace('onload', '', $content_desc);
			$content_desc = str_replace('onmousedown', '', $content_desc);
			$content_desc = str_replace('onmousemove', '', $content_desc);
			$content_desc = str_replace('onmouseout', '', $content_desc);
			$content_desc = str_replace('onmouseover', '', $content_desc);
			$content_desc = str_replace('onmouseup', '', $content_desc);
			$content_desc = str_replace('onprerender', '', $content_desc);
			$content_desc = str_replace('onserverclick', '', $content_desc);
			$content_desc = str_replace('[removed]', '', $content_desc);

			$content_desc = str_replace('A=A', '', $content_desc);
			$content_desc = str_replace('1=1', '', $content_desc);

			//$content_desc = str_replace('<','',$content_desc);
			//$content_desc = str_replace('>','',$content_desc);
			$content_desc = str_replace('< >', '', $content_desc);
			$content_desc = str_replace("<''>", "", $content_desc);

			$content_desc = str_replace("%", "", $content_desc);

			$content_desc = str_replace("'or'", "", $content_desc);
			$content_desc = str_replace("'OR'", "", $content_desc);
			$content_desc = str_replace('"OR"', '', $content_desc);
			$content_desc = str_replace('"or"', '', $content_desc);
			$content_desc = str_replace("'A", "", $content_desc);
			$content_desc = str_replace("A'", "", $content_desc);
			$content_desc = str_replace('"A', '', $content_desc);
			$content_desc = str_replace('A"', '', $content_desc);

			$content_desc = str_replace("'1", "", $content_desc);
			$content_desc = str_replace("1'", "", $content_desc);
			$content_desc = str_replace('"1', '', $content_desc);
			$content_desc = str_replace('1"', '', $content_desc);

			$content_desc = str_replace('(', '', $content_desc);
			$content_desc = str_replace(')', '', $content_desc);
			//$content_desc = str_replace("(", "",$content_desc);
			//$content_desc = str_replace(")", "",$content_desc);

			$content_desc = str_replace('||', '', $content_desc);
			$content_desc = str_replace('|', '', $content_desc);
			$content_desc = str_replace('&&', '', $content_desc);
			$content_desc = str_replace('&', '', $content_desc);
			$content_desc = str_replace(';', '', $content_desc);
			$content_desc = str_replace('%', '', $content_desc);
			$content_desc = str_replace('$', '', $content_desc);
			$content_desc = str_replace('"', '', $content_desc);
			$content_desc = str_replace("'", '', $content_desc);
			$content_desc = str_replace('\"', '', $content_desc);
			$content_desc = str_replace("\'", "", $content_desc);
			$content_desc = str_replace('+', '', $content_desc);
			//$content_desc = str_replace('CR','',$content_desc);
			//$content_desc = str_replace('LF','',$content_desc);
			$content_desc = str_replace('*', '', $content_desc);
			$content_desc = str_replace("'<", "", $content_desc);
			$content_desc = str_replace("'>", "", $content_desc);
			$content_desc = str_replace("<'", "", $content_desc);
			$content_desc = str_replace("'>'", "", $content_desc);
			$content_desc = str_replace("#40", "", $content_desc);
			$content_desc = str_replace("#41", "", $content_desc);

			//print_R($content_desc); die();
			$retArr[$key] = $content_desc;
		}

		return $retArr;

	}

}
// functions for check File Extention in pdf format created by laukesh 
if (!function_exists('checkFileExtention')) {
	function checkFileExtention($file)
	{
		$gfex = explode('.', $file);
		if (strtolower(end($gfex)) == 'pdf') {
			return 1;
		} else {
			return 0;
		}
	}
}

############################ Menu For  admin
// functions for get primary  menu  created by Salil
// modify by  laukesh 

if (!function_exists('primarylink_menu')) {
	function primarylink_menu($language_id, $menu_positions = '')
	{
		$selected = "";
		if ($menu_positions != '') {
			if ($menu_positions == 0)
				$selected = "selected";
		}

		$returnValue = '<div class="col-lg-3 col-md-3 col-xm-3">
							<div class="form-group">
								<label>Primary Link:</label>
								<span class="star">*</span>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-xm-6">
							<div class="form-group">
								<select name="menucategory" class="input_class form-control" id="menucategory" autocomplete="off">
									<option value=""> Select </option>
									<option value ="0" ' . $selected . '>It is Root Category</option>';

		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => 0,
			'language_id' => $language_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$returnValue .= '<option value="' . $row->id . '" ' . $selected . '><strong>' . $row->menu_name . '</strong></option>';

			$returnValue .= build_child_one($row->id, '', $menu_positions);
		}
		$returnValue .= '</select>
							</div>
						</div>';

		return $returnValue;
	}
}
// functions for get child  menu  created by Salil
// modify by  laukesh 
if (!function_exists('build_child_one')) {
	function build_child_one($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;
		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '><strong>&nbsp;--&nbsp;' . $row->menu_name . '</strong></option>';
			$tempReturnValue .= build_child_two($row->id, $tempReturnValueAnother = '', $menu_positions);
		}

		return $tempReturnValue;
	}
}
// functions for get child  menu  created by Salil
// modify by  laukesh 
if (!function_exists('build_child_two')) {
	function build_child_two($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;
		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '><strong>&nbsp;&nbsp;&nbsp;--&nbsp;' . $row->menu_name . '</strong></option>';
			$tempReturnValue .= build_child_three($row->id, $tempReturnValueAnother = '', $menu_positions);
		}

		return $tempReturnValue;
	}
}
// functions for get child  menu  created by Salil
// modify by  laukesh 
if (!function_exists('build_child_three')) {
	function build_child_three($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;
		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;' . $row->menu_name . '</option>';
			$tempReturnValue .= build_child_four($row->id, $tempReturnValueAnother = '', $menu_positions);
		}

		return $tempReturnValue;
	}
}

// functions for get child  menu  created by Salil
// modify by  laukesh 

if (!function_exists('build_child_four')) {
	function build_child_four($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;
		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;' . $row->menu_name . '</option>';
			$tempReturnValue .= build_child_five($row->id, $tempReturnValueAnother = '', $menu_positions);
		}

		return $tempReturnValue;
	}
}

// functions for get child  menu  created by Salil
// modify by  laukesh 

if (!function_exists('build_child_five')) {
	function build_child_five($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;
		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;' . $row->menu_name . '</option>';
			$tempReturnValue .= build_child_six($row->id, $tempReturnValueAnother = '', $menu_positions);
		}

		return $tempReturnValue;
	}
}
// functions for get child  menu  created by Salil
// modify by  laukesh 

if (!function_exists('build_child_six')) {
	function build_child_six($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;


		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);

		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;' . $row->menu_name . '</option>';
			$tempReturnValue .= build_child_seven($row->id, $tempReturnValueAnother = '', $menu_positions);
		}

		return $tempReturnValue;
	}
}

// functions for get child  menu  created by Salil
// modify by  laukesh 
if (!function_exists('build_child_seven')) {
	function build_child_seven($parent_id, $tempReturnValue, $menu_positions)
	{

		$tempReturnValue .= $tempReturnValue;


		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $parent_id
		);

		$nav_query = DB::table('menus')->select('*')->where($whEre)->get();
		foreach ($nav_query as $row) {
			$selected = "";
			if ($menu_positions != '') {
				if ($row->id == $menu_positions)
					$selected = "selected";
			}
			$tempReturnValue .= '<option value="' . $row->id . '" ' . $selected . '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;' . $row->menu_name . '</option>';
		}

		return $tempReturnValue;
	}
}


############################menu end

/// Memu for Themes 
// functions for get   menu  created by  laukesh 
if (!function_exists('get_menu')) {
	function get_menu($language_id, $menu_positions, $menu_child_id = '')
	{      // dd($menu_positions);
		$whEre = array(
			'approve_status' => 3,
			'menu_child_id' => $menu_child_id,
			'language_id' => $language_id
		);
		$nav_query = DB::table('menus')->select('*')->where($whEre)->whereIn('menu_positions', $menu_positions)->orderBy('page_postion', 'asc')->get();


		return $nav_query;
	}
}
// functions for create seo link and text created by  laukesh 
if (!function_exists('seo_url')) {
	function seo_url($seo_url)
	{

		$seo_url = preg_replace('/\s+/', ' ', $seo_url);
		$seo_url = str_replace('&', '-', $seo_url);
		$seo_url = str_replace('amp;', 'and', $seo_url);
		$seo_url = str_replace('/', '', $seo_url);
		$seo_url = str_replace('%', '', $seo_url);
		$seo_url = str_replace('*', '', $seo_url);
		$seo_url = str_replace('(', '', $seo_url);
		$seo_url = str_replace(')', '', $seo_url);
		$seo_url = str_replace('!', '', $seo_url);
		$seo_url = str_replace('@', '', $seo_url);
		$seo_url = str_replace('#', '', $seo_url);
		$seo_url = str_replace('}', '', $seo_url);
		$seo_url = str_replace('{', '', $seo_url);
		$seo_url = str_replace(']', '', $seo_url);
		$seo_url = str_replace('[', '', $seo_url);
		$seo_url = str_replace(',', '-', $seo_url);
		$seo_url = str_replace('.', '', $seo_url);
		$seo_url = str_replace('?', '', $seo_url);
		$seo_url = str_replace("'", '', $seo_url);
		$seo_url = str_replace(' ', '-', $seo_url);
		return strtolower($seo_url) . '.php';
	}
}
// functions for cheked status created by  laukesh 
if (!function_exists('get_status')) {
	function get_status()
	{

		$status = array(
			'1' => "Draft",
			'2' => "Aproval",
			'3' => "Publish"
		);
		return $status;
	}
}
// functions for cheked status created by  laukesh 
if (!function_exists('get_photo')) {
	function get_photo()
	{

		$status = array(
			'1' => "Draft",
			'2' => "Aproval",
			'2' => "Aproval",
			'2' => "Aproval",
			'2' => "Aproval",
			'2' => "Aproval",
			'3' => "Publish"
		);
		return $status;
	}
}
// functions for cheked status created by  laukesh 


// functions for cheked status created by  laukesh 

// functions for cheked status created by  laukesh 
if (!function_exists('get_parent_photocat')) {
	function get_parent_photocat($parent_id)
	{
		$count =PhotoCategory::where('parent_id', $parent_id)->get();
		return count($count);
	}
}
// functions for cheked status created by  laukesh 



if (!function_exists('check_gallery')) {
	function check_gallery($pid)
	{

		$fetchResult = DB::table('photo_categories')->where('parent_id', $pid)->exists();
		return $fetchResult;

	}
}

// functions for checked language created by  laukesh 
function language($val)
{
	if ($val == '2')
		echo "Hindi";
	else if ($val == '3')
		echo "Marathi";
	else if ($val == '4')
		echo "Gujarati";
	else if ($val == '5')
		echo "Telugu";
	else if ($val == '6')
		echo "Tamil";
	else if ($val == '7')
		echo "Kannada";
	else if ($val == '1')
		echo "English";
	else
		echo "English";
}

// functions for get/set themestype  created by  laukesh 


// functions for get/set Noticetype all date created by  laukesh   

// functions for get/set Noticetype all date created by  laukesh   
if (!function_exists('get_infraPhpto')) {
	function get_infraPhpto($catId)
	{
		$photoinfra = Photo::where('inf_id', $catId)->orderBy('img_postion', 'ASC')->get();
		return $photoinfra;
	}
}
// functions for get Toppers Students created by  laukesh   
if (!function_exists('get_toppersstudents')) {
	function get_toppersstudents($student_class,$student_subjects,$limit)
	{   
		
		if(empty($student_subjects)){
			$nav_query =	DB::select("SELECT a.* FROM `achievements` a WHERE a.student_class=$student_class AND a.student_percentage!='' AND (a.student_percentage BETWEEN (SELECT student_percentage FROM `achievements` WHERE student_class=$student_class AND student_percentage!='' GROUP BY student_percentage ORDER by student_percentage DESC LIMIT 4,1) AND (SELECT MAX(student_percentage) FROM `achievements` WHERE student_class=$student_class AND student_percentage!='' )) GROUP BY a.student_percentage, a.student_name ORDER BY a.student_percentage DESC");
		}else{
			$nav_query =	DB::select("SELECT * FROM achievements WHERE student_class = $student_class AND student_subjects =$student_subjects group by student_name,student_percentage order by student_percentage DESC limit 0,$limit");
		}
	   return $nav_query;
	}
}
// functions for get/set circularstype  created by  laukesh 
if (!function_exists('circularstype')) {
	function circularstype($type)
	{

		if ($type == 1) {
			$type = 'Events';
		} elseif ($type == 2) {
			$type = 'Circulars';
		} elseif ($type == 3) {
			$type = 'News';

		} elseif ($type == 4) {
			$type = 'Notifications';

		}
		elseif ($type == 6) {
			$type = 'Media Print';

		} else {
			$type = 'Important Notice';
		}
		return $type;
	}
}


// functions for get user name using id  created by  laukesh 
if (!function_exists('get_username')) {
	function get_username($id)
	{
		$data = User::where('id', $id)->first();
		return $data->name;
	}
}
// functions for  get last updated date of pages created by  laukesh 

/// clinet Logo 
// functions for  get  clinet Logo  created by  laukesh 
if (!function_exists('get_logolist')) {
	function get_logolist()
	{
		$whEre = array(
			'txtstatus' => 3
		);
		$nav_query = DB::table('logos')->select('*')->where($whEre)->orderBy('updated_at', 'DESC')->get();


		return $nav_query;
	}
}
// functions for  get  parent menu name  using title and language id created by  laukesh 
if (!function_exists('get_parent_menu_name')) {
	function get_parent_menu_name($url, $langid1)
	{
		$result = '';
		$date = Menu::where('menu_url', 'LIKE', "%{$url}%")->where('language_id', '=', $langid1)->where('approve_status', '=', 3)->select('menu_child_id')->first();
		if ($date) {
			$result = Menu::where('id', $date->menu_child_id)->select('menu_url', 'menu_name')->first();
		}
		return $result;
	}
}


if (!function_exists('check_photo_category')) {
	function check_photo_category($event_id)
	{

		$fetchResult = DB::table('photo_galleries')->where('event_id', $event_id)->count();
		return $fetchResult;
	}
}

if ( ! function_exists('cat_build_child_one'))
{
	function cat_build_child_one($parent_id, $tempReturnValue, $cat_id)
	{
            
		$tempReturnValue .= $tempReturnValue;
		$whEre = array(	
						'parent_id'			=> $parent_id
						);
		$nav_query = DB::table('photo_categories')->select('*')->where($whEre)->get();
		foreach($nav_query as $row)
		{
			$selected = "";
			if($parent_id != '')
			{
				if($row->id == $parent_id)
					$selected="selected";
			}
			$tempReturnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>&nbsp;--&nbsp;'.$row->title.'</strong></option>';
			//$tempReturnValue .= build_child_two($row->id, $tempReturnValueAnother='', $menu_positions);
		}

		return $tempReturnValue;
	}
}
if ( ! function_exists('primary_category'))
{
	function primary_category( $cat_id='')
	{
		$selected = "";
		if($cat_id != '')
		{
			if( $cat_id == 0 )
				$selected="selected";
		}

		$returnValue = '<div class="col-lg-6 col-md-6 col-xm-6">
							<div class="form-group">
								<select name="parent_id" class="input_class form-control" id="menucategory" autocomplete="off">
									<option value=""> Select </option>
									<option value ="0" '.$selected.'>It is Root Category</option>';
			
			$whEre = array(	
							'parent_id'			=> 0
						);
			$nav_query = DB::table('photo_categories')->select('*')->where($whEre)->get();
			foreach($nav_query as $row)
			{
				$selected = "";
				if($cat_id != '')
				{
					if($row->id == $cat_id)
						$selected="selected";
				}
				$returnValue .= '<option value="'.$row->id.'" '.$selected.'><strong>'.$row->title.'</strong></option>';

                                $returnValue .= cat_build_child_one($row->id, '', $cat_id);
			}
		$returnValue .=    		'</select>
							</div>
						</div>';

		return $returnValue;
	}
}