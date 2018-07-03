<?php
namespace Part4\PluginPractice\Plugin;

use Magento\Theme\Block\Html\Footer;

class InjectVariablesIntoBlocks
{
    protected $customerSession;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession
    )
    {
        $this->customerSession = $customerSession;
    }

    public function beforeToHtml(Footer $subject)
    {
        if ($subject->getNameInLayout() !== 'absolute_footer') {
            return;
        }

        $subject->setTemplate('Part4_PluginPractice::absolute_footer.phtml');
        $subject->assign('customer', $this->customerSession->getCustomer());
    }
}