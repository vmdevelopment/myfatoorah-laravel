<?php

namespace VMdevelopment\MyFatoorah\Services\Invoice;

/**
 * Interface InvoiceInterface
 * @package VMdevelopment\MyFatoorah\Services\Invoice
 */
interface InvoiceInterface
{
    /**
     * @param int $id
     * @return static
     */
    public static function getById(int $id);

    /**
     * @return mixed
     */
    public function pay();
}