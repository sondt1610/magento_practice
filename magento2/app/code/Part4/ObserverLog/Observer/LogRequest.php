<?php

namespace Part4\ObserverLog\Observer;

use Magento\Framework\Event\ObserverInterface;
use \Psr\Log\LoggerInterface;

class LogRequest implements ObserverInterface
{
    protected $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $request = $observer->getEvent()->getControllerAction()->getRequest();
        $actionName = $request->getActionName();
        $this->logger->warn('Request on frontend (Action name):' . $actionName);
    }
}