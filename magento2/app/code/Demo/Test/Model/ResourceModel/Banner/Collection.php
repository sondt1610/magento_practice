<?php
namespace Demo\Test\Model\ResourceModel\Banner;

use Demo\Test\Model\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Banner::class, \Demo\Test\Model\ResourceModel\Banner::class);
    }
}
//Ten thu muc phai trung voi ten model