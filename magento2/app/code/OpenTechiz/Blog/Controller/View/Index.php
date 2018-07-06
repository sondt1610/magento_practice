<?php
namespace OpenTechiz\Blog\Controller\View;

use \Magento\Framework\App\Action\Action;

class Index extends Action
{
    /** @var \Magento\Framework\Controller\Result\ForwardFactory */
    protected $resultForwardFactory;
    public $timezone;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
                                \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone
    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        $this->timezone = $timezone;
        parent::__construct($context);
    }

    /**
     * Blog Index, shows a list of recent blog posts.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
//        $date = $this->timezone->date();
//        $date = $date->format('d/m/y H:i:s A');

        //print_r($date);
//        print_r($this->timezone->getConfigTimezone());
//        die();
        $post_id = $this->getRequest()->getParam('post_id', $this->getRequest()->getParam('id', false));
        /** @var \OpenTechiz\Blog\Helper\Post $post_helper */
        //echo $post_id;die();
        $post_helper = $this->_objectManager->get('OpenTechiz\Blog\Helper\Post');
        $result_page = $post_helper->prepareResultPost($this, $post_id);
        if (!$result_page) {
            $resultForward = $this->resultForwardFactory->create();
            return $resultForward->forward('noroute');
        }
        return $result_page;
    }
}
