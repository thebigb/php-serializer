<?php

namespace OneOfZero\Json\Internals;

use OneOfZero\Json\Internals\Mappers\MemberMapperInterface;
use ReflectionMethod;
use ReflectionProperty;

class MemberContext extends AbstractContext
{
	/**
	 * @var mixed $value
	 */
	private $value;

	/**
	 * @var mixed $serializedValue
	 */
	private $serializedValue;

	/**
	 * @var ReflectionMethod|ReflectionProperty $reflector
	 */
	private $reflector;

	/**
	 * @var MemberMapperInterface $mapper
	 */
	private $mapper;

	/**
	 * @return ObjectContext
	 */
	public function getParent()
	{
		return parent::getParent();
	}
	
	#region // Generic immutability helpers

	/**
	 * @param mixed $value
	 *
	 * @return self
	 */
	public function withValue($value)
	{
		$new = clone $this;
		$new->value = $value;
		return $new;
	}

	/**
	 * @param mixed $value
	 *
	 * @return self
	 */
	public function withSerializedValue($value)
	{
		$new = clone $this;
		$new->serializedValue = $value;
		return $new;
	}

	/**
	 * @param ReflectionProperty|ReflectionMethod $reflector
	 *
	 * @return self
	 */
	public function withReflector($reflector)
	{
		$new = clone $this;
		$new->reflector = $reflector;
		return $new;
	}

	/**
	 * @param MemberMapperInterface $mapper
	 *
	 * @return self
	 */
	public function withMapper(MemberMapperInterface $mapper)
	{
		$new = clone $this;
		$new->mapper = $mapper;
		return $new;
	}

	#endregion

	#region // Generic getters and setters

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @return mixed
	 */
	public function getSerializedValue()
	{
		return $this->serializedValue;
	}

	/**
	 * @return ReflectionMethod|ReflectionProperty
	 */
	public function getReflector()
	{
		return $this->reflector;
	}

	/**
	 * @return MemberMapperInterface
	 */
	public function getMapper()
	{
		return $this->mapper;
	}

	#endregion
}