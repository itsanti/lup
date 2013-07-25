<?php
abstract class Atwix_Logger_Base implements Atwix_Logger_Interface {
  /**
   * Logs an warning message.
   *
   * @param string $logLevel 
   * @param string $message The message to log
   * @param integer $line The where the error occurs
   */
  abstract protected function _log($logLevel, $message, $line = NULL);
  
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