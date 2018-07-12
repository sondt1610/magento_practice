<?php

namespace OpenTechiz\Blog\Controller\Index;

use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }


    public function execute()
    {
//        $to = date("Y-m-d h:i:s"); // current date
//        $from = strtotime('-1 day', strtotime($to));
//        echo $from;
//        echo "dsgs";
//        $from = date('Y-m-d h:i:s', $from); // 1 days before
//        echo $to;
//        echo "dsgs";
//        echo $from;
//        die();
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}