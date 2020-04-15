<?php

namespace Logger;

/**
*класс SyslogLogger
* 
* @author Кажихов Юрий. (kazhikhov@gmail.com)
*/
class SyslogLogger extends AbstractLogger
{
	/**
	 * проверка параметров
	 */
	function __construct(array $loggerinfo)
	{
		//валидация входных данных, если ошибка то Exception
		if (!isset($loggerinfo['is_enabled']) || !is_bool($loggerinfo['is_enabled'])) {
		    throw new \Exception("Неверный формат параметра is_enabled");
        } else {
		    $this->is_enabled = $loggerinfo['is_enabled'];
        }
		if (isset($loggerinfo['levels']) && !is_array($loggerinfo['levels'])) {
		    throw new \Exception("Неверный формат параметра levels");
        } else {
		    $this->levels = $loggerinfo['levels'];
        }
	}
	
	public function log($level, $message)
	{
		if ($this->is_enabled) {
			$format = '%1$s %2$s %3$s';
			$str = sprintf($format, $level, Logger::LogLevels[$level], $message);
			syslog(LOG_INFO, (string) $str);
		}
	}
}
