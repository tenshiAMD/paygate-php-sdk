<?php

namespace CoreProc\Paynamics\Paygate;

use Exception;
use GuzzleHttp\Client as GuzzleClient;

interface ClientInterface
{
    /**
     * Sets configuration
     *
     * @param array $config
     * @return self
     */
    public function setConfig(array $config);

    /**
     * Returns the request URL to be used. Depends if sandbox or production.
     *
     * @return string
     */
    public function getRequestUrl();

    /**
     * Returns if sandbox or production.
     *
     * @return bool
     */
    public function isSandbox();

    /**
     * Sets if sandbox or production.
     *
     * @param bool $sandbox
     * @return self
     * @throws Exception
     */
    public function setSandbox($sandbox = false);

    /**
     * Returns assigned Merchant ID
     *
     * @return string
     */
    public function getMerchantId();

    /**
     * Returns assigned Merchant Key
     *
     * @return string
     */
    public function getMerchantKey();

    /**
     * Sets Merchant ID
     *
     * @param $merchantId
     * @return self
     * @throws Exception
     */
    public function setMerchantId($merchantId);

    /**
     * Sets Merchant Key
     *
     * @param $merchantKey
     * @return self
     * @throws Exception
     */
    public function setMerchantKey($merchantKey);

    /**
     * Create new request
     *
     * @param RequestBodyInterface $requestBody
     * @return RequestInterface
     */
    public function createRequest(RequestBodyInterface $requestBody);
}
