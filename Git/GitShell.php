<?php

namespace Lidaa\GitBundle\Git;

use Lidaa\GitBundle\Git\GitEntity; 
use Symfony\Component\Process\Process;
use Symfony\Component\HttpKernel\KernelInterface;

class GitShell
{
	private $gitEntity;
	private $pathDir;
	
	public function __construct(KernelInterface $kernel)
	{
		$this->gitEntity = new GitEntity();
		$this->pathDir = $kernel->getRootDir().'/..' ;
	}
	
	public function run($command)
	{
		$this->execute($command);
		
		return $this->gitEntity;
 	} 

	public function execute($command)
	{
		$this->gitEntity->setCommand($command);
		$process = new Process($command, $this->pathDir);
		$process->run();
		if (!$process->isSuccessful()) 
		{
			$this->gitEntity->setResult($process->getErrorOutput());
		}
		else 
		{
			$this->gitEntity->setResult($process->getOutput());
		}
 	} 
}
