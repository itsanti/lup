<?php

/**
 * Utility class that provides sorting functionality that can be
 * used to replace the PHP standard functions.
 *
 * TechDivision_Sort::usort($data, 'mysort');
 *
 * function mysort($a, $b) {
 *     return strcmp($a, $b);
 * }
 *
 * @category   Atwix
 * @copyright  Copyright (c) 2013 <enarc@atwix.com> Yaroslav Rogoza
 * @author     Tim Wagner <tw@techdivision.com>
 */
interface Atwix_Sort_Interface {

	/**
 	 * This function will sort an array by its values using a user-supplied comparison
 	 * function. If the array you wish to sort needs to be sorted by some non-trivial
 	 * criteria, you should use this function.
 	 *
 	 * @param array $data The data to be sorted
 	 * @param string $callback The callback method/function name used for sorting
 	 * @return void
 	 * @http://www.php.net/usort
 	 */
	public static function usort(array &$data, $callback = 'strcmp');
}