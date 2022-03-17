<?php


namespace Geexu\Blog\Api\Data;

/**
 * Interface BlogConfigInterface
 * @package Geexu\Blog\Api\Data
 */
interface BlogConfigInterface
{
    const GENERAL = 'general';
    const SIDEBAR = 'sidebar';
    const SEO     = 'seo';

    /**
     * @return \Geexu\Blog\Api\Data\Config\GeneralInterface
     */
    public function getGeneral();

    /**
     * @param \Geexu\Blog\Api\Data\Config\GeneralInterface $value
     *
     * @return $this
     */
    public function setGeneral($value);

    /**
     * @return \Geexu\Blog\Api\Data\Config\SidebarInterface
     */
    public function getSidebar();

    /**
     * @param \Geexu\Blog\Api\Data\Config\SidebarInterface $value
     *
     * @return $this
     */
    public function setSidebar($value);

    /**
     * @return \Geexu\Blog\Api\Data\Config\SeoInterface
     */
    public function getSeo();

    /**
     * @param \Geexu\Blog\Api\Data\Config\SeoInterface $value
     *
     * @return $this
     */
    public function setSeo($value);
}
