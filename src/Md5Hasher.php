<?php

namespace Q1lon\Encrypt;

use Illuminate\Config\Repository;

/**
 * Class Md5Hasher
 * @package Q1lon\Encrypt
 */
class Md5Hasher
{
    private $options = [];

    function __construct(Repository $config = null)
    {
        $this->options = $config ? $config->get('md5Hash.options') : [];
    }

    /**
     * @param $value
     * @return string
     */
    public function make($value)
    {
        $salt = isset($this->options['salt']) ? $this->options['salt'] : "";
        return hash('md5', $value . $salt);
    }

    /**
     * @param $value
     * @param $hashValue
     * @param array $options
     * @return bool
     */
    public function check($value, $hashValue)
    {
        $salt = isset($this->options['salt']) ? $this->options['salt'] : "";
        return hash('md5', $value . $salt) === $hashValue;
    }

}
