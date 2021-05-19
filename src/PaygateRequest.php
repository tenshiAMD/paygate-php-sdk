<?php namespace CoreProc\Paynamics\Paygate;

class PaygateRequest implements RequestInterface
{

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var RequestBodyInterface
     */
    private $requestBody;

    public function __construct(ClientInterface $client, RequestBodyInterface $requestBody)
    {
        $this->setClient($client);
        $this->setRequestBody($requestBody);
    }

    /**
     * Returns the assigned  client
     *
     * @return ClientInterface
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Sets the  client
     *
     * @param ClientInterface $client
     * @return self
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Returns the assigned request body
     *
     * @return RequestBodyInterface
     */
    public function getRequestBody()
    {
        return $this->requestBody;
    }

    /**
     * Sets the request body
     *
     * @param RequestBodyInterface $requestBody
     * @return self
     */
    public function setRequestBody(RequestBodyInterface $requestBody)
    {
        $this->requestBody = $requestBody;

        return $this;
    }

    /**
     * Creates an auto-submit form that will redirect to the payment gateway
     *
     * @param string $requestUrl
     * @return string
     */
    public function generateForm($requestUrl)
    {
        $client = $this->getClient();

        $requestBody = $this->getRequestBody();

        $url = $client->getRequestUrl() . $requestUrl;

        $requestBody->setDefaults($client);

        // Generate auto-submit form
        $form = '<form name="paygate_frm" method="POST" action="' . $url . '">';
        $form .= '<input type="hidden" name="paymentrequest" value="' . base64_encode($requestBody->__toXmlString()) . '">';
        $form .= '</form>';
        $form .= '<script>document.paygate_frm.submit();</script>';

        return $form;
    }
}
