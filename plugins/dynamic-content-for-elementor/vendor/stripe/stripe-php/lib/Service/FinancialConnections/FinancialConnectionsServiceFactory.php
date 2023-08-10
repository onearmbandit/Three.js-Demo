<?php

// File generated from our OpenAPI spec
namespace DynamicOOOS\Stripe\Service\FinancialConnections;

/**
 * Service factory class for API resources in the FinancialConnections namespace.
 *
 * @property AccountService $accounts
 * @property SessionService $sessions
 */
class FinancialConnectionsServiceFactory extends \DynamicOOOS\Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = ['accounts' => AccountService::class, 'sessions' => SessionService::class];
    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
