<?php
class Atwix_Logger extends Atwix_Logger_Base {
  protected static $instance;
  private $_logFile = LOG_FILE;
  
  private function __construct(){ }
  private function __clone()    { }
  private function __wakeup()   { }
  
  public static function getInstance() { 
    if ( !isset(self::$instance) ) {
      self::$instance = new self();
    }
    return self::$instance;
  }
  /**
   * Logs an warning message.
   *
   * @param string $logLevel 
   * @param string $message The message to log
   * @param integer $line The where the error occurs
   */
  protected function _log($logLevel, $message, $line = NULL) {
    $message = sprintf(
      "%s[%s] %s - line %s: %s" . PHP_EOL,
      get_calling_class(),
      $logLevel,
      date("Y-m-d H:i:s"),
      $line,
      $message
    );
    error_log($message, 3, $this->_logFile);
  }
  
	/**
	 * Logs an info message.
	 *
	 * @param string $message The message to log
	 * @param integer $line The where the error occurs
	 */
	public function info($message, $line = NULL) {
    $this->_log(__FUNCTION__, $message, $line);
  }

	/**
	 * Logs an warning message.
	 *
	 * @param string $message The message to log
	 * @param integer $line The where the error occurs
	 */
	public function warning($message, $line = NULL) {
    $this->_log(__FUNCTION__, $message, $line);
  }

	/**
	 * Logs an error message.
	 *
	 * @param string $message The message to log
	 * @param integer $line The where the error occurs
	 */
	public function error($message, $line = NULL) {
    $this->_log(__FUNCTION__, $message, $line);
  }
}