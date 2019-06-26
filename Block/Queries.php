<?php

namespace Handy\Profiler\Block;

use Magento\Framework\DB\Profiler;
use Zend_Db_Profiler_Query;


class Queries extends \Magento\Framework\View\Element\Template
{

    private $profiler;


    /**
     * @return string
     */
    public function toHtml()
    {
        if ( !$this->isEnabled() ) {
            return '';
        }
        return parent::toHtml();
    }

    /**
     * @return bool
     */
    private function isEnabled(): bool
    {
        return $this->getProfiler()->getEnabled();
    }

    /**
     * @return Profiler
     */
    public function getProfiler()
    {
        if ( !$this->profiler ) {
            $res = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');
            $this->profiler = $res->getConnection('read')->getProfiler();
        }
        return $this->profiler;
    }

    /**
     * @return Zend_Db_Profiler_Query[]
     */
    public function getQueries()
    {
        return $this->getProfiler()->getQueryProfiles();
    }

    /**
     * @param string $query
     * @return string
     */
    public function colorize($query)
    {
        return preg_replace('/([A-Z]+)/','<span style="color: #006699">$1</span>',$query);
    }
}
