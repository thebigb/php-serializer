<?php

namespace OneOfZero\Json\Internals\Mappers;

use OneOfZero\BetterAnnotations\Annotations;
use ReflectionClass;

class AnnotationMapperFactory implements MapperFactoryInterface
{
	use BaseFactoryTrait;
	
	/**
	 * @var Annotations $annotations
	 */
	protected $annotations;

	/**
	 * @param MapperFactoryInterface $parent
	 * @param Annotations $annotations
	 */
	public function __construct(MapperFactoryInterface $parent, Annotations $annotations)
	{
		$this->annotations = $annotations;
		$this->setParent($parent);
	}

	/**
	 * {@inheritdoc}
	 */
	public function mapObject(ReflectionClass $reflector)
	{
		$mapper = new AnnotationObjectMapper($this->annotations);

		$mapper->setFactory($this);
		$mapper->setTarget($reflector);
		$mapper->setBase($this->getParent()->mapObject($reflector));
		
		return $mapper;
	}

	/**
	 * {@inheritdoc}
	 */
	public function mapMember($reflector, ObjectMapperInterface $memberParent)
	{
		$mapper = new AnnotationMemberMapper($this->annotations);
		
		$mapper->setTarget($reflector);
		$mapper->setMemberParent($memberParent);
		$mapper->setBase($this->getParent()->mapMember($reflector, $memberParent->getBase()));
		
		return $mapper;
	}
}
