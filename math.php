<?php
class Mathlib
{
    public static function fakultaet($n) {
        if ($n < 0) {
            return "du dulli";
        }
        if ($n == 0 || $n == 1) {
            return 1;
        }
        return $n * self::fakultaet($n - 1);
    }
}

echo Mathlib::fakultaet(3);