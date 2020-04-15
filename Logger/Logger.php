<?php

namespace Logger;

/**
* класс Logger
* 
* @author Кажихов Юрий. (kazhikhov@gmail.com)
*/
class Logger extends AbstractLogger
{

	/**
	*
	* @var array $levels массив значений логирования
	*/
	const LogLevels = [
		LogLevel::LEVEL_ERROR	=> 'ERROR',
		LogLevel::LEVEL_INFO	=> 'INFO',
		LogLevel::LEVEL_NOTICE	=> 'NOTICE',
		LogLevel::LEVEL_DEBUG	=> 'DEBUG',
	];

	/**
	* массив лог типов
	*/
	private $loggers = [];
	
	/**
	* добавить в массив лог типов новой компонент логирования
	*/
	public function addLogger(AbstractLogger $logger)
	{
		array_unshift($this->loggers, $logger);
		return $this;
	}
	
	/**
	* вывести значение в лог из всего массива лог типов
	*/	
	public function log($level, $message)
	{
		foreach ($this->loggers as $logger) {
			if ($logger->checkEnable($level)) {
				$logger->log($level, $message);
			}
		}
	}
}
