<?php
namespace Vendor\ContactusApi\Api;

/**
 * Interface ContactusManagementInterface
 *
 * @package Vendor\ContactusApi\Api
 */
interface ContactusManagementInterface
{
    /**
     * Contact us form.
     *
     * @param mixed $contactForm
     *
     * @return \Vendor\ContactusApi\Api\Data\ContactusInterface
     */
    public function submitForm($contactForm);
}