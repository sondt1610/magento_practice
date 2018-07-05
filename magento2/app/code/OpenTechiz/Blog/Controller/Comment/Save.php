<?php
namespace OpenTechiz\Blog\Controller\Comment;
use \Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
class Save extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
    function __construct(
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->_resultFactory = $context->getResultFactory();
        parent::__construct($context);
    }
    public function execute()
    {
        $post = (array) $this->getRequest()->getPost();
        if (!empty($post)) {
            // Retrieve your form data
            $author   = $post['author'];
            $content    = $post['content'];
            $post_id = $post['post_id'];
            $comment = $this->_objectManager->create('OpenTechiz\Blog\Model\Comment');
            $comment->setAuthor($author);
            $comment->setContent($content);
            $comment->setPostID($post_id);
            $comment->save();
            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Comment added succesfully!');
        }
        $resultRedirect = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl('/magento_sd/blog/');
        return $resultRedirect;
    }
}