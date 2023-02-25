<?php

namespace Bluethink\Grid\Model;

use Magento\Framework\UrlInterface;

class Comment implements \Magento\Config\Model\Config\CommentInterface
{
    protected $urlInterface;

    public function __construct(
        UrlInterface $urlInterface
    ) {
        $this->urlInterface = $urlInterface;
    }

    public function getCommentText($elementValue)
    {
        $url = $this->urlInterface->getUrl('http://local.magento2.com/');

        return 'This is custom <a href="' . $url . '"target="_blank">Link</a>.';
    }
}