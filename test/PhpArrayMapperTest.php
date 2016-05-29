<?php
/**
 * Copyright (c) 2016 Bernardo van der Wal
 * MIT License
 *
 * Refer to the LICENSE file for the full copyright notice.
 */

namespace OneOfZero\Json\Test;

use OneOfZero\Json\Mappers\AbstractArray\ArrayFactory;
use OneOfZero\Json\Mappers\FactoryChainFactory;
use OneOfZero\Json\Mappers\File\PhpFileSource;
use OneOfZero\Json\Mappers\Reflection\ReflectionFactory;
use RuntimeException;

class PhpArrayMapperTest extends AbstractMapperTest
{
	const PHP_ARRAY_MAPPING_FILE = __DIR__ . '/Assets/mapping.php';

	/**
	 * {@inheritdoc}
	 */
	protected function getChain()
	{
		return (new FactoryChainFactory)
			->addFactory(new ArrayFactory(new PhpFileSource(self::PHP_ARRAY_MAPPING_FILE)))
			->addFactory(new ReflectionFactory())
			->build($this->defaultConfiguration)
		;
	}

	public function testInvalidMapperFile()
	{
		$this->setExpectedException(RuntimeException::class);
		new PhpFileSource('non-existing.php');
	}
}