<?php

namespace Logger;

/**
* класс NullLogger
* 
* @author Кажихов Юрий. (kazhikhov@gmail.com)
*/
class NullLogger extends AbstractLogger
{
	public function log($level, $message)
	{
		return null;
	}
}
