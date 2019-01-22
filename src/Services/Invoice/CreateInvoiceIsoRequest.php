<?php

namespace VMdevelopment\MyFatoorah\Services\Invoice;


use GuzzleHttp\Exception\ClientException;
use VMdevelopment\MyFatoorah\Request\RequestAbstract;

/**
 * Class CreateInvoiceIsoRequest
 * @package VMdevelopment\MyFatoorah\Services\Invoice
 */
class CreateInvoiceIsoRequest extends RequestAbstract
{
    /**
     * @var string
     */
    private $endpoint = "ApiInvoices/CreateInvoiceIso";

    /**
     * @param array $body
     * @return mixed
     */
    public function send($body)
    {
        $url = $this->basePath . $this->endpoint;
        try {
            $parameters = [
                'json' => $body,
                'headers' => $this->getHeaders()
            ];
            $resp = $this->client->post($url, $parameters);
            dd($resp);
        }catch (ClientException $e){
            dd($e->getResponse()->getBody()->getContents());
        }
    }
}