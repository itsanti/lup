<?php
/**
 * Example to show how to use the logger.
 *
 * @category   Atwix
 * @copyright  Copyright (c) 2013 <enarc@atwix.com> Yaroslav Rogoza
 * @author     Tim Wagner <tw@techdivision.com>
 */

class Atwix_Example {

	/**
	 * Simple array for the names.
	 * @var array
	 */
	protected $_names = array();

	/**
	 * Initializes the example class with the names.
	 *
	 * @param array $names The names
	 * @return void
	 */
	public function __construct($names) {
		$this->setNames($names);
	}

	/**
	 * Setter implemenation for the names.
	 *
	 * @param array $names The names
	 * @return void
	 */
	public function setNames($names) {
		$this->_names = $names;
	}

	/**
	 * Getter implementation for the names.
	 *
	 * @return array Array with the names
	 */
	public function getNames() {
		return $this->_names;
	}
  
  /**
	 * Вывод имен в отсортированном виде.
	 *
	 * @return string строка с именами
	 */
  public function renderNamesSorted() {
    // исходный массив имен оставляем без изменений
    $names = $this->getNames();
    
    // используем вспомогательный класс для сортировки
    Atwix_Sort::usort($names, Atwix_Sort::SURNAME);
    
    // используем класс для записи лога имен в файл
    $logger = Atwix_Logger::getInstance();
    
    foreach($names as $name) {
      $logger->info($name,__LINE__);
    }
    return join(', ', $names);
  }
}