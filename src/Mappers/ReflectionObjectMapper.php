<?php
/**
 * Copyright (c) 2016 Bernardo van der Wal
 * MIT License
 *
 * Refer to the LICENSE file for the full copyright notice.
 */

namespace OneOfZero\Json\Mappers;

/**
 * Implementation of a mapper that maps the serialization metadata for a class using reflection.
 */
class ReflectionObjectMapper implements ObjectMapperInterface
{
	use BaseObjectMapperTrait;

	/**
	 * {@inheritdoc}
	 */
	public function wantsExplicitInclusion()
	{
		return $this->getBase()->wantsExplicitInclusion();
	}

	/**
	 * {@inheritdoc}
	 */
	public function wantsNoMetadata()
	{
		return $this->getBase()->wantsNoMetadata();
	}

	/**
	 * {@inheritdoc}
	 */
	public function hasSerializingConverter()
	{
		return $this->getBase()->hasSerializingConverter();
	}

	/**
	 * {@inheritdoc}
	 */
	public function hasDeserializingConverter()
	{
		return $this->getBase()->hasDeserializingConverter();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getSerializingConverterType()
	{
		return $this->getBase()->getSerializingConverterType();
	}

	/**
	 * {@inheritdoc}
	 */
	public function getDeserializingConverterType()
	{
		return $this->getBase()->getDeserializingConverterType();
	}
}