<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package			CodeIgniter
 * @author			ExpressionEngine Dev Team
 * @copyright		Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license			http://codeigniter.com/user_guide/license.html
 * @link			http://codeigniter.com
 * @since			Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Directory Helpers
 *
 
 Note:
 The path is relative to your main site index.php file, NOT your controller or view files.
 CodeIgniter uses a front controller so paths are always relative to the main site index.

 *
 * @package			CodeIgniter
 * @subpackage		Helpers
 * @category		Helpers
 * @author			Yuri Citra Pratama ( yuripertamax@gmail.com )
 * @link			http:/github.com/yuripertamax/ci_dir_helper
 */

// ------------------------------------------------------------------------

/**
 * Directory List
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	mixed
 * @return	array contains folder list inside root specified path
 */
if ( ! function_exists('get_items_list'))
{
	function get_items_list($path, $param = '', $default = FALSE)
	{
		if ( ! isset($path) OR $path == "")
		{
			return $default;
		}
		else
		{	
			$scanned_dir = array_diff(scandir($path), array('..', '.'));

			foreach($scanned_dir as $items)
	      	{
	      		if($param=='file')
	      		{
	      			if(is_file($items))
					{
						$result[] = $items;
					}
				}
				if($param=='dir')
	      		{
	      			if(!is_file($items))
					{
						$result[] = $items;
					}
				}
				if($param=='')
				{
					$result[] = $items;
				}
			}
			return $result;	
		}
	}
}

// ------------------------------------------------------------------------

/**
 * Get Count
 *
 * this function is return the files count
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('get_count'))
{
	function get_count($path, $param = '')
	{
		$scanned_dir = array_diff(scandir($path), array('..', '.', '.svn', '.git'));

		foreach($scanned_dir as $items)
      	{
	      	if($param=='file')
	      	{
      			if(is_file($items))
				{
					$result[] = $items;
				}
			}
			if($param=='dir')
      		{
      			if(!is_file($items))
				{
					$result[] = $items;
				}
			}
			if($param=='')
			{
				$result[] = $items;
			}
		}

		$result = count($result);
		return $result;	
	}
}

// --------------------------------------------------------------------

/**
 * Elements
 *
 * Returns only the array items specified.  Will return a default value if
 * it is not set.
 *
 * @access	public
 * @param	array
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('get_list_path'))
{
	function get_list_path($path, $param = '')
	{
		// $scanned_dir = scandir($path);
		$scanned_dir = array_diff(scandir($path), array('..', '.'));

      foreach($scanned_dir as $items)
      {

      	$items = $path."/".$items;

			if($param=='file')
      		{
      			if(is_file($items))
				{
					$result_path[] = $items;
				}
			}
			else if($param=='dir')
      		{
      			if(!is_file($items))
				{
					$result_path[] = $items;
				}
			}
			else if($param=='')
      		{
				$result_path[] = $items;
			}
			else
			{
				$result_path = FALSE;
			}
      }
      return $result_path;
	}
}

/* End of file dir_helper.php */
/* Location: ./your/app/helper/directory/ */