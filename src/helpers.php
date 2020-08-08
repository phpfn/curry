<?php

/**
 * This file is part of phpfn package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Fun\Curry\Curried;

if (! \function_exists('\\curry')) {
    /**
     * @see lcurry
     * {@inheritdoc}
     * @return callable|Curried
     */
    function curry($fn, ...$args): callable
    {
        return Curried::new($fn)->curry(...$args);
    }
}


if (! \function_exists('\\lcurry')) {
    /**
     * Returns a function from a function to which you can partially
     * apply the required arguments from left to right.
     *
     * @param callable|\ReflectionFunctionAbstract $fn An applicant function
     * @param array $args Set of arguments for left currying
     * @return callable|Curried Returns a partially applied function
     */
    function lcurry($fn, ...$args): callable
    {
        return Curried::new($fn)->lcurry(...$args);
    }
}


if (! \function_exists('\\rcurry')) {
    /**
     * Returns a function from a function to which you can partially
     * apply the required arguments from right to left.
     *
     * @param callable|\ReflectionFunctionAbstract $fn An applicant function
     * @param array $args Set of arguments for right currying
     * @return callable|Curried Returns a partially applied function
     */
    function rcurry($fn, ...$args): callable
    {
        return Curried::new($fn)->rcurry(...$args);
    }
}


if (! \function_exists('\\uncurry')) {
    /**
     * Unpacks the curried function and returns the result of this function.
     *
     * In the event that the function is not completed (that is, there are not
     * enough arguments), it returns a normal closure object, with which you
     * can supplement the missing argument.
     *
     * @param callable|Curried $fn An applicant php or curried function
     * @return int|float|bool|string|resource|object|\Closure Function result or closure
     */
    function uncurry(callable $fn): \Closure
    {
        return ($fn instanceof Curried ? $fn : Curried::new($fn))->uncurry();
    }
}
