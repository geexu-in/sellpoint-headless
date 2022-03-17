<?php
namespace Vendor\ContactusApi\Api\Data;

/**
 * ContactusInterface interface
 *
 * @api
 * @since 100.0.2
 */
interface ContactusInterface
{
    /**
    * @return \Vendor\ContactusApi\Api\Data\ContactusInterface[]
     */
    public function getMessage();

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage($message);
}