<?php

declare(strict_types=1);

namespace Lijinhua\HyperfExtEncryption\Contract;

use Lijinhua\HyperfExtEncryption\Exception\DecryptException;
use Lijinhua\HyperfExtEncryption\Exception\EncryptException;

interface DriverInterface
{
    /**
     * 加密
     *
     * @param  mixed  $value
     *
     * @throws EncryptException
     */
    public function encrypt($value, bool $serialize = true): string;

    /**
     * 解密
     *
     * @return mixed
     * @throws DecryptException
     */
    public function decrypt(string $payload, bool $unserialize = true);
}
