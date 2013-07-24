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
}