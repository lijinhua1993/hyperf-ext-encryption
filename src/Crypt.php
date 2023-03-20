<?php

declare(strict_types=1);
/**
 * This file is part of hyperf-ext/encryption.
 *
 * @link     https://github.com/hyperf-ext/encryption
 * @contact  eric@zhu.email
 * @license  https://github.com/hyperf-ext/encryption/blob/master/LICENSE
 */

namespace Lijinhua\HyperfExtEncryption;

use Hyperf\Utils\ApplicationContext;
use Lijinhua\HyperfExtEncryption\Contract\DriverInterface;
use Lijinhua\HyperfExtEncryption\Contract\EncryptionInterface;

abstract class Crypt
{
    /**
     * @param  string|null  $name
     * @return DriverInterface
     */
    public static function getDriver(?string $name = null): DriverInterface
    {
        return ApplicationContext::getContainer()->get(EncryptionInterface::class)->getDriver($name);
    }

    /**
     * 加密
     *
     * @param $value
     * @param  bool  $serialize
     * @param  string|null  $driverName
     * @return string
     */
    public static function encrypt($value, bool $serialize = true, ?string $driverName = null): string
    {
        return static::getDriver($driverName)->encrypt($value, $serialize);
    }

    /**
     * 解密
     *
     * @param  string  $payload
     * @param  bool  $unserialize
     * @param  string|null  $driverName
     * @return mixed
     */
    public static function decrypt(string $payload, bool $unserialize = true, ?string $driverName = null)
    {
        return static::getDriver($driverName)->decrypt($payload, $unserialize);
    }
}
