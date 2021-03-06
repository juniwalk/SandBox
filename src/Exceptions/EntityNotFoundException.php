<?php declare(strict_types=1);

/**
 * @copyright Martin Procházka (c) 2020
 * @license   MIT License
 */

namespace App\Exceptions;

final class EntityNotFoundException extends AbstractException
{
	/**
	 * @param  object  $entity
	 * @return static
	 */
	public static function fromEntity($entity): self
	{
		return new static('Entity '.get_class($entity).' was not found.');
	}
}
