<?php

/**
 * Logger interface with a method for each
 * available log level.
 *
 * @category   Atwix
 * @copyright  Copyright (c) 2013 <enarc@atwix.com> Yaroslav Rogoza
 * @author     Tim Wagner <tw@techdivision.com>
 */
interface Atwix_Logger_Interface {

	/**
	 * Logs an info message.
	 *
	 * @param string $message The message to log
	 * @param integer $line The where the error occurs
	 */
	public function info($message, $line = NULL);

	/**
	 * Logs an warning message.
	 *
	 * @param string $message The message to log
	 * @param integer $line The where the error occurs
	 */
	public function warning($message, $line = NULL);

	/**
	 * Logs an error message.
	 *
	 * @param string $message The message to log
	 * @param integer $line The where the error occurs
	 */
	public function error($message, $line = NULL);
}