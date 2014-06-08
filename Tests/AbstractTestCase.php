<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Bundle\SlackBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
abstract class AbstractTestCase extends WebTestCase
{
    /**
     * @param string $class
     * @param array  $constructorArguments
     * @param array  $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getCustomMock(
        $class,
        $constructorArguments = null,
        array $methods = ['createRequest', 'sendRequest']
    ) {
        $mock = $this->getMockBuilder($class);
        $mock->setMethods($methods);
        if (!empty($constructorArguments)) {
            $mock->setConstructorArgs($constructorArguments);
        } else {
            $mock->disableOriginalConstructor();
        }

        $mock->setMethods($methods);

        return $mock->getMock();
    }
}