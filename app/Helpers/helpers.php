<?php

use Carbon\Carbon;
use App\Models\Admin\WebLogs;
use App\Models\Admin\Menu;
use App\Models\Admin\PhotoGallery;
use App\Models\Admin\StudentCouncil;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Admin\PhotoCategory;
use App\Models\Admin\TopperStudent ;
use App\Models\Admin\TopperStudentImage;
use App\Models\Admin\Academic;



/**
 * Write code on Method
 *
 * @return response()
 */


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


if (!function_exists('check_photo_category')) {
	function check_photo_category($event_id)
	{

		$fetchResult = DB::table('photo_galleries')->where('event_id', $event_id)->count();
		return $fetchResult;
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
if (!function_exists('get_studentclass')) {
	function get_studentclass()
	{
			$fetchResult = DB::table('class_names')->get();
			return $fetchResult;
	}
}
if (!function_exists('get_classname')) {
	function get_classname($class_id)
	{
		$fetchResult = DB::table('class_names')->where('id', $class_id)->first();
			return $fetchResult;
			
	}
}
if (!function_exists('get_studentsection')) {
	function get_studentsection()
	{
			$fetchResult = DB::table('sections')->get();
			return $fetchResult;
	}
}
if (!function_exists('get_studentsection_name')) {
	function get_studentsection_name($section_id)
	{
		$fetchResult = DB::table('sections')->where('id', $section_id)->first();
			return $fetchResult;
			
	}
}
if (!function_exists('check_topper_student_image')) {
	function check_topper_student_image($sid)
	{
		$fetchResult = DB::table('topper_student_images')->where('student_id', $sid)->exists();
		return $fetchResult;
	}
}
if (!function_exists('check_topper_student_image_count')) {
	function check_topper_student_image_count($student_id)
	{

		$fetchResult = DB::table('topper_student_images')->where('student_id', $student_id)->count();
		return $fetchResult;
	}
}
if (!function_exists('topper_student_image')) {
	function topper_student_image($student_id)
	{
		$fetchResult = DB::table('topper_student_images')->where('student_id', $student_id)->get();
		return $fetchResult;
	}
}
