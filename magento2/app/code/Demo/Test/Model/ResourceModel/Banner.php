<?php
namespace Demo\Test\Model\ResourceModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        //Table name + primary c
        $this->_init('banner','id');
    }
}