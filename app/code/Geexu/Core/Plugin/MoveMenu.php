<?php

namespace Geexu\Core\Plugin;

use Magento\Backend\Model\Menu\Builder\AbstractCommand;
use Geexu\Core\Helper\AbstractData;

/**
 * Class MoveMenu
 * @package Geexu\Core\Plugin
 */
class MoveMenu
{
    const GEEXU_CORE = 'Geexu_Core::menu';

    /**
     * @var AbstractData
     */
    protected $helper;

    /**
     * MoveMenu constructor.
     *
     * @param AbstractData $helper
     */
    public function __construct(AbstractData $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @param AbstractCommand $subject
     * @param $itemParams
     *
     * @return mixed
     */
    public function afterExecute(AbstractCommand $subject, $itemParams)
    {
        if ($this->helper->getConfigGeneral('menu')) {
            if (strpos($itemParams['id'], 'Geexu_') !== false
                && isset($itemParams['parent'])
                && strpos($itemParams['parent'], 'Geexu_') === false) {
                $itemParams['parent'] = self::GEEXU_CORE;
            }
        } elseif ((isset($itemParams['id']) && $itemParams['id'] === self::GEEXU_CORE)
                || (isset($itemParams['parent']) && $itemParams['parent'] === self::GEEXU_CORE)) {
            $itemParams['removed'] = true;
        }

        return $itemParams;
    }
}
