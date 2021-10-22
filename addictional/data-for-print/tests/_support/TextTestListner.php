<?php

namespace tests\_support;

use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use Throwable;

class TextTestListner implements TestListener
{
	private $lineBraces = 0;
	
	private function print(string $str)
	{
		//echo str_repeat('  ', $this->lineBraces);
		echo $str . "\n";
	}
	
	private function shiftBraces(int $value = 1)
	{
		$this->lineBraces += $value;
		if($this->lineBraces < 0)
		{
			$this->lineBraces = 0;
		}
	}

	public function addError(Test $test, Throwable $t, float $time): void
	{
		$class = get_class($test);
		$this->print("[E] $class: {$t->__toString()}");
	}

	public function addFailure(Test $test, AssertionFailedError $e, float $time): void
	{
		$class = get_class($test);
		$this->print("[F] $class: {$e->getMessage()}");
	}
	
	public function addSkippedTest(Test $test, Throwable $t, float $time): void
	{
		$class = get_class($test);
		$this->print("[S] $class: {$t->getMessage()}");
	}
	
	public function addWarning(Test $test, Warning $e, float $time): void
	{
		$class = get_class($test);
		$this->print("[W] $class: {$e->getMessage()}");
	}
	
	public function addIncompleteTest(Test $test, Throwable $t, float $time): void
	{
		$class = get_class($test);
		$this->print("[I] $class: {$t->getMessage()}");
	}
	
	public function addRiskyTest(Test $test, Throwable $t, float $time): void
	{
		$class = get_class($test);
		$this->print("[R] $class: {$t->getMessage()}");
	}

	//*
	public function startTest(Test $test): void
	{}

	public function startTestSuite(TestSuite $suite): void
	{}
	
	public function endTest(Test $test, float $time): void
	{}
	
	public function endTestSuite(TestSuite $suite): void
	{}
	/*/
	public function startTest(Test $test): void
	{
		$class = get_class($test);
		$this->print("   Start test $class");
		$this->shiftBraces();
	}

	public function startTestSuite(TestSuite $suite): void
	{
		$class = get_class($suite);
		$this->print("   Start suite $class");
		$this->shiftBraces();
	}
	
	public function endTest(Test $test, float $time): void
	{
		$class = get_class($test);
		$this->shiftBraces(-1);
		$this->print("   End test $class");
	}
	
	public function endTestSuite(TestSuite $suite): void
	{
		$class = get_class($suite);
		$this->shiftBraces(-1);
		$this->print("   End suite $class");
	}
	//*/
}

