<?php

namespace OpenTechiz\Blog\Controller\Comment;

use OpenTechiz\Blog\Model\CommentFactory;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;
    protected $inlineTranslation;
    function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        CommentFactory $commentFactory,
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->inlineTranslation = $inlineTranslation;
        $this->commentFactory = $commentFactory;
        parent::__construct($context);
    }
    public function execute()
    {
//        $jsonResultResponse = $this->resultJsonFactory->create();
//        $error = false;
//        $message = '';
//        $post = $this->getRequest()->getPostValue();
//        var_dump($post);die;


        $error = false;
        $message = '';
        $post = $this->getRequest()->getPostValue();
        if(!$post)
        {
            $error = true;
            $message = "Your submission is not valid. Please try again!";
        }
        //to avoid inline translation broking ajax response
        $this->inlineTranslation->suspend();
        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($post);
        //add validation data code here
        if(!\Zend_Validate::is(trim($post['author']), 'NotEmpty'))
        {
            $error = true;
            $message = "Author can not be empty!";
        }
        // save data to database
        $author   = $post['author'];
        $content    = $post['content'];
        $post_id = $post['post_id'];
        $comment = $this->commentFactory->create();
        $comment->load($post_id);
        $comment->setAuthor($author);
        $comment->setContent($content);
        $comment->setPostId($post_id);
        $comment->save();

        $jsonResultResponse = $this->resultJsonFactory->create();
        if(!$error)
        {
            $jsonResultResponse->setData([
                'result' => 'success',
                'message' => 'Thank you for your submission. Our Admins will review and approve shortly'
            ]);
        } else {
            $jsonResultResponse->setData([
                'result' => 'error',
                'message' => $message
            ]);
        }
        return $jsonResultResponse;
    }
}