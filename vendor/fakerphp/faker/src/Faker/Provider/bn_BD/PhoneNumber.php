<?php

namespace Faker\Provider\bn_BD;

class PhoneNumber extends \Faker\Provider\PhoneNumber
{
    public function phoneNumber()
    {
        $number = '+967';
        $number .= static::randomNumber(7);

        return Utils::getBanglaNumber($number);
    }
}
