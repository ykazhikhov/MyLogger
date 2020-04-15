<?php

namespace Logger;

/**
* абстрактный класс AbstractLogger
* 
* @author Кажихов Юрий. (kazhikhov@gmail.com)
*/
abstract class AbstractLogger
{
	/**
	*
	*@var $is_enabled включен лог или нет
	*@var $levels какого типа сообщения записывать
	*@var $filename путь до лог файла
	*/
    protected $is_enabled;
    protected $levels;
    protected $filename;

    /**
     *
     *checkEnable проверяет включено логирование и какой тип сообщений выводить
     */
    public function checkEnable($level)
    {
        if (isset($this->levels)) {
            if (in_array($level,$this->levels)) {
                return $this->is_enabled;
            }
        } else {
            return $this->is_enabled;
        }
    }

    /**
     *
     *log выводит сообщение
     */
    public function log($level, $message)
    {
    }

	public function error($message)
	{
		$this->log(LogLevel::LEVEL_ERROR, $message);
	}
	
	public function notice($message)
	{
		$this->log(LogLevel::LEVEL_NOTICE, $message);
	}
	
	public function info($message)
	{
		$this->log(LogLevel::LEVEL_INFO, $message);
	}
	
	public function debug($message)
	{
		$this->log(LogLevel::LEVEL_DEBUG, $message);
	}

}
