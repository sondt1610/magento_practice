<?php
 
namespace Part3\LayoutPractice\Controller\Index;
 
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_registry;
    protected $bannerFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,
                                \Magento\Framework\Registry $registry)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }
 

    public function execute()
    {

        $this->_registry->register('custom_va', 'dsgsd');
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}