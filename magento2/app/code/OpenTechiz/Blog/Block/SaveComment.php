<?php
namespace OpenTechiz\Blog\Block;
use OpenTechiz\Blog\Api\Data\PostInterface;
use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;
class SaveComment extends \Magento\Framework\View\Element\Template
{
    public $resultFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\RequestInterface $request,
        array $data = []
    )
    {
        parent::__construct($context, $data);
    }
    public function getFormAction()
    {
        return '/magento_sd/blog/comment/save';
    }
    public function getLoadUrl()
    {
        return '/magento_sd/blog/comment/load';
    }
    public function getActiveUrl()
    {
        return '/magento_sd/blog/comment/loadactive';
    }
    public function getPostId()
    {
        return $this->_request->getParam('post_id', false);
    }
}