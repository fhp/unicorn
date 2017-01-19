<?php

namespace Unicorn;
use PHPUnit_Framework_Assert;
use PHPUnit_Framework_ExpectationFailedException;
use ReflectionClass;
use ReflectionException;

class MethodExitsTests
{
	/**
	 * Assert that a class has a method
	 *
	 * @param string $class name of the class
	 * @param string $method name of the searched method
	 * @throws ReflectionException if $class don't exist
	 * @throws PHPUnit_Framework_ExpectationFailedException if a method isn't found
	 */
	public static function assertMethodExist($class, $method)
	{
		$classInstance = new ReflectionClass($class);
		PHPUnit_Framework_Assert::assertThat(self::has_public_method($class, $method), new \PHPUnit_Framework_Constraint_IsTrue, "Method $method does not exist on class " . $classInstance->name);
	}
	
	/**
	 * Assert that a class does not have a method
	 *
	 * @param string $class name of the class
	 * @param string $method name of the searched method
	 * @throws ReflectionException if $class don't exist
	 * @throws PHPUnit_Framework_ExpectationFailedException if a method is found
	 */
	public static function assertNotMethodExist($class, $method)
	{
		$classInstance = new ReflectionClass($class);
		PHPUnit_Framework_Assert::assertThat(self::has_public_method($class, $method), new \PHPUnit_Framework_Constraint_IsFalse, "Method $method does exist on class " . $classInstance->name);
	}
	
	private static function has_public_method($class, $method)
	{
		$classInstance = new ReflectionClass($class);
		if(!$classInstance->hasMethod($method)) {
			return false;
		}
		$methodInstance = $classInstance->getMethod($method);
		return $methodInstance->isPublic();
	}
}
