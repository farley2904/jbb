<?php

namespace Jbb\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as BaseEncrypter;

class EncryptCookies extends BaseEncrypter
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */

    protected static $serialize = true;

    protected $except = [
        //
    ];

    }
