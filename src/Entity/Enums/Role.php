<?php declare(strict_types=1);

/**
 * @copyright Martin Procházka (c) 2020
 * @license   MIT License
 */

namespace App\Entity\Enums;

use App\Exceptions\InvalidEnumException;

final class Role extends AbstractEnum
{
	/** @var string */
	const GUEST = 'guest';
	const USER = 'user';
	const MANAGER = 'manager';
	const ADMIN = 'admin';


	/** @var string[] */
	protected $items = [
		self::GUEST => 'web.enum.role.guest',
		self::USER => 'web.enum.role.user',
		self::MANAGER => 'web.enum.role.manager',
		self::ADMIN => 'web.enum.role.admin',
	];

	/**
	 * Map of roles with parent assignment.
	 * @var string[]
	 */
	private $map = [
		self::GUEST => null,
		self::USER => self::GUEST,
		self::MANAGER => self::USER,
		self::ADMIN => null,
	];

	/** @var string[] */
	private $colors = [
		self::GUEST => 'secondary',
		self::USER => 'success',
		self::MANAGER => 'primary',
		self::ADMIN => 'warning',
	];


	/**
	 * @return string[]
	 */
	public function getMap(): iterable
	{
		return $this->map;
	}


	/**
	 * @param  string  $item
	 * @return string
	 * @throws InvalidEnumException
	 */
	public function getColor(string $item): string
	{
		if (!$this->isValidItem($item)) {
			throw InvalidEnumException::fromItem($item);
		}

		return $this->colors[$item];
	}
}
