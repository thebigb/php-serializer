<?php

namespace OneOfZero\Json\Test;

use OneOfZero\BetterAnnotations\Annotations;
use OneOfZero\Json\Configuration;
use OneOfZero\Json\Internals\Environment;
use OneOfZero\Json\Internals\Mappers\AnnotationMapperFactory;
use OneOfZero\Json\Internals\Mappers\ReflectionMapperFactory;
use OneOfZero\Json\Internals\Metadata;
use OneOfZero\Json\Internals\SerializingVisitor;
use OneOfZero\Json\Test\FixtureClasses\SimpleClass;

class SerializingVisitorTest extends AbstractTest
{
	public function testScalarValueArray()
	{
		$input = [ 'a', 'b', 'c' ];

		$output = $this->createVisitor()->visit($input);
		$this->assertSequenceEquals($input, $output);
	}
	
	public function testObjectArray()
	{
		$input = [ new SimpleClass('foo'), new SimpleClass('bar'), new SimpleClass('baz') ];

		$expectedOutput = [
			[ Metadata::TYPE => SimpleClass::class, 'foo' => 'foo' ],
			[ Metadata::TYPE => SimpleClass::class, 'foo' => 'bar' ],
			[ Metadata::TYPE => SimpleClass::class, 'foo' => 'baz' ],
		];

		$output = $this->createVisitor()->visit($input);
		$this->assertSequenceEquals($expectedOutput, $output);
	}

	public function testMixedArray()
	{
		$input = [ 'abc', 123, new SimpleClass('baz') ];

		$expectedOutput = [
			'abc',
			123,
			[ Metadata::TYPE => SimpleClass::class, 'foo' => 'baz' ],
		];

		$output = $this->createVisitor()->visit($input);
		$this->assertSequenceEquals($expectedOutput, $output);
	}

	public function testSimpleObject()
	{
		$input = new SimpleClass('abc', '123');

		$expectedOutput = [
			Metadata::TYPE => SimpleClass::class,
			'foo' => 'abc',
			'bar' => '123',
		];

		$output = $this->createVisitor()->visit($input);
		$this->assertSequenceEquals($expectedOutput, $output);
	}

	public function testObjectWithArray()
	{
		$input = new SimpleClass([ 'foo', 'bar', 'baz' ], new SimpleClass('123'));

		$expectedOutput = [
			Metadata::TYPE => SimpleClass::class,
			'foo' => [ 'foo', 'bar', 'baz' ],
			'bar' =>
			[
				Metadata::TYPE => SimpleClass::class,
				'foo' => '123'
			]
		];

		$output = $this->createVisitor()->visit($input);
		$this->assertSequenceEquals($expectedOutput, $output);
	}

	private function createVisitor()
	{
		$annotations = new Annotations(Environment::getAnnotationReader());

		$config = new Configuration();
		$factory = new AnnotationMapperFactory(new ReflectionMapperFactory(), $annotations);

		return new SerializingVisitor($config, $factory);
	}
}