<?php

namespace Logger;

/**
* класс FileLogger
* 
* @author Кажихов Юрий. (kazhikhov@gmail.com)
*/
class FileLogger extends AbstractLogger
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
		if (!isset($loggerinfo['filename']) || !touch($loggerinfo['filename'])) {
		    throw new \Exception("Неверный формат параметра filename");
        } else {
		    $this->filename = $loggerinfo['filename'];
        }
		if (isset($loggerinfo['levels']) && is_array($loggerinfo['levels'])) {
            $this->levels = $loggerinfo['levels'];
        } elseif (isset($loggerinfo['levels'])) {
            throw new \Exception("Неверный формат параметра levels");
        }
	}
	
	public function log($level, $message)
	{
		if ($this->is_enabled) {
			$format = '%1$s	%2$s	%3$s	%4$s';
			$str = sprintf($format, date("c"), $level, Logger::LogLevels[$level], $message);
			file_put_contents($this->filename, $str . PHP_EOL, FILE_APPEND);
		}
	}
}
