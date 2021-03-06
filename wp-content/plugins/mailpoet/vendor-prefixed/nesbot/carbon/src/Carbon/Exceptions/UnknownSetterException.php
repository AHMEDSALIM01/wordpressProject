<?php
namespace MailPoetVendor\Carbon\Exceptions;
if (!defined('ABSPATH')) exit;
use Exception;
use InvalidArgumentException as BaseInvalidArgumentException;
class UnknownSetterException extends BaseInvalidArgumentException implements BadMethodCallException
{
 public function __construct($name, $code = 0, Exception $previous = null)
 {
 parent::__construct("Unknown setter '{$name}'", $code, $previous);
 }
}
