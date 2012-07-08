<?php

namespace Lidaa\GitBundle\Git;

class GitEntity
{
	private $command;
	
	private $result;
	
	public function setCommand($command)
	{
		$this->command = $command;	
	} 

	public function getCommand()
	{
		return $this->command;
	}

	public function setResult($result)
	{
		$this->result = $result;	
	} 

	public function getResult()
	{
		return $this->result;
	}

}
