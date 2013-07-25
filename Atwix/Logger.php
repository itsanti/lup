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
   * Реализация метода Atwix_Logger_Base::_log.
   */
  protected function _log($logLevel, $message, $line = NULL) {
    $message = sprintf(
      "%s[%s] %s - line %s: %s" . PHP_EOL,
      $this->get_calling_class(),
      $logLevel,
      date("Y-m-d H:i:s"),
      $line,
      $message
    );
    error_log($message, 3, $this->_logFile);
  }

  /* получение имени вызывающего класса для лога */
  private function get_calling_class() {
    $trace = debug_backtrace();
    $class = $trace[2]['class'];
    for ( $i=2; $i<count( $trace ); $i++ ) {
      if ( isset( $trace[$i] ) ) {
        if ( $class != $trace[$i]['class'] ) {
          return $trace[$i]['class'];
        }
      }
    }
  }
}