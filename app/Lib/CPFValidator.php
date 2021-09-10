<?php

namespace App\Lib;

/**
 * CPF Validator
 *
 * @author Vinícius Silva <viniciuspwd@hotmail.com>
 * @link https://github.com/viniciuspwd/cpfvalidator
 * @copyright (c) 2018
 * @license Released under the MIT license
 */

class CPFValidator
{
    /**
     * @var string $cpf
     */
    private $cpf;

    /**
     * @var int $digits
     */
    private $digits;

    /**
     * Construct class
     *
     * @param int $digits (default = 11)
     *
     * @return void
     */
    public function __construct ($digits = 11)
    {
        $this->digits = $digits;
    }

    /**
     * Check if CPF is valid, will return true if it is valid
     *
     * @param string $string
     *
     * @return boolean
     */
    public function isValid ($cpf)
    {
        $this->cpf = $this->sanatize($cpf);

        if ($this->checkDigits() && !$this->checkSequence() && $this->checkAlgorithm()) {
            return true;
        }

        return false;
    }

    /**
     * Check if CPF is valid, will return true if is valid
     *
     * @return boolean
     */
    private function checkAlgorithm ()
    {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $this->cpf[$c] * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($this->cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if $cpf length is the same length of $digits, will return true if it is
     *
     * @return boolean
     */
    private function checkDigits ()
    {
        if (strlen($this->cpf) == $this->digits) {
            return true;
        }

        return false;
    }

    /**
     * Check if $cpf is a squenece of numbers, will return true if it is a sequence
     *
     * @return boolean
     */
    private function checkSequence ()
    {
        if (preg_match('/(\d)\1{10}/', $this->cpf)) {
            return true;
        }

        return false;
    }

    /**
     * Allow only numbers in string
     *
     * @param string $string
     *
     * @return string
     */
    private function sanatize ($string)
    {
        return preg_replace('/[^0-9]/is', '', $string);
    }
}
