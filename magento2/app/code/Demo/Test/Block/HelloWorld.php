<?php
namespace Demo\Test\Block;

class Helloworld extends \Magento\Framework\View\Element\Template
{

	protected $_registry;
	protected $_catalogSession;

    protected $_productCollectionFactory;

	public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\Session $catalogSession,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        array $data = []
    ) {
        $this->_registry = $registry;
        $this->_catalogSession = $catalogSession;
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
   	}

    public function getHelloWorldTxt()
    {
        return 'Hello world!'.$this->_registry->registry('custom_va');

    }

    public function getCatalogSession() 
    {
        return $this->_catalogSession;
    }
    public function getProductCollection()
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3); // fetching only 3 products
        return $collection->getData();
    }

}