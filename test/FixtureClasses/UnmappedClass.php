<?php
/**
 * Copyright (c) 2016 Bernardo van der Wal
 * MIT License
 *
 * Refer to the LICENSE file for the full copyright notice.
 */

namespace OneOfZero\Json\Test\FixtureClasses;

class UnmappedClass
{
	/**
	 * @var string $foo
	 */
	private $foo;

	/**
	 * @var string $bar
	 */
	private $bar;

	/**
	 * @var string $baz
	 */
	public $baz;

	/**
	 * @param string $foo
	 * @param string $bar
	 * @param string $baz
	 */
	public function __construct($foo, $bar, $baz)
	{
		$this->foo = $foo;
		$this->bar = $bar;
		$this->baz = $baz;
	}

	/**
	 * @return string
	 */
	public function getFoo()
	{
		return $this->foo;
	}

	/**
	 * @return string
	 */
	public function getBar()
	{
		return $this->bar;
	}

	/**
	 * @return string
	 */
	public function getBaz()
	{
		return $this->baz;
	}
}
