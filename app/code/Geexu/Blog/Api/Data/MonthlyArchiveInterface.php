<?php

namespace Geexu\Blog\Api\Data;

/**
 * Interface MonthlyArchiveInterface
 * @package Geexu\Blog\Api\Data
 */
interface MonthlyArchiveInterface
{
    const LABEL      = 'label';
    const POST_COUNT = 'post_count';
    const LINK       = 'link';

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLabel($value);

    /**
     * @return int
     */
    public function getPostCount();

    /**
     * @param int $value
     *
     * @return $this
     */
    public function setPostCount($value);

    /**
     * @return string
     */
    public function getLink();

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setLink($value);
}
