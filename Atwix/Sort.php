<?php
abstract class Atwix_Sort implements Atwix_Sort_Interface {
  const SURNAME = 1;
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
	public static function usort(array &$data, $callback = 'strcmp') {
    switch ($callback) {
      case 1:
        usort($data, array('self', 'sort_surname'));
        break;
      default:
        usort($data, $callback);
        break;
    }
  }
  
  /* сортировка по фамилии. preg_split для случая, когда
     между именем и фамилией несколько пробельных символов.
  */
  private static function sort_surname($a, $b){
    $a = preg_split("/[\s,]+/", $a);
    $b = preg_split("/[\s,]+/", $b);
    return strcmp($a[1], $b[1]);
  }
}