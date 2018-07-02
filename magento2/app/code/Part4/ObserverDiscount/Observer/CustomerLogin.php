<?php

namespace Part4\ObserverDiscount\Observer;

use Magento\Framework\Event\ObserverInterface;
use \Psr\Log\LoggerInterface;

class CustomerLogin implements ObserverInterface
{
    protected $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        //$this->logger->warn('Observer Works');
        echo "Customer LoggedIn";
        $customer = $observer->getEvent()->getCustomer();
        echo $customer->getName(); //Get customer name
        //exit;
    }
}