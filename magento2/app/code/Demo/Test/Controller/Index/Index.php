<?php
 
namespace Demo\Test\Controller\Index;
 
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_registry;
    protected $bannerFactory;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,
                                \Magento\Framework\Registry $registry, \Demo\Test\Model\BannerFactory $bannerFactory)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_registry = $registry;
        $this->bannerFactory = $bannerFactory;
        parent::__construct($context);
    }
 

    public function execute()
    {

        // Create banner instance
        //$banner = $this->bannerFactory->create();
        //$collection = $banner->getCollection();
//        $data = $collection->getData();
        //$data = $collection->addFieldToSelect('id')
            //->addFieldToFilter('id',['gt'=>1])
            //->getData();
//        echo $data;
        // Get banner with id = 1
//        $data = $banner->load(1)->getData();

        //print_r(json_encode($data));

//        print_r($collection->getData(),true);
            //echo "Donedgds";

//        echo "<pre>";
//            var_dump($collection->getData());
//        echo "</pre>";

//        $attribute_value = $this->_productloader->create()->load('1');
//        print_r($attribute_value);
        $this->_registry->register('custom_va', 'dsgsd');
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}