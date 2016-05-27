<?php
/**
 * Copyright (c) 2016 Bernardo van der Wal
 * MIT License
 *
 * Refer to the LICENSE file for the full copyright notice.
 */

namespace OneOfZero\Json\Mappers;

/**
 * Defines a mapper that maps the serialization metadata for a class.
 */
interface ObjectMapperInterface extends MapperInterface
{
	/**
	 * Should return a boolean value indicating whether or not members must be explicitly included.
	 *
	 * @return bool
	 */
	public function isExplicitInclusionEnabled();

	/**
	 * Should return a boolean value indicating whether or not the serialized representation of the class should bear
	 * library-specific metadata.
	 *
	 * @return bool
	 */
	public function isMetadataDisabled();

	/**
	 * Returns member mappers for all class properties and methods.
	 *
	 * @return MemberMapperInterface[]
	 */
	public function getMembers();

	/**
	 * Returns member mappers for all class properties.
	 *
	 * @return MemberMapperInterface[]
	 */
	public function getProperties();

	/**
	 * Returns member mappers for all class methods.
	 *
	 * @return MemberMapperInterface[]
	 */
	public function getMethods();
}
