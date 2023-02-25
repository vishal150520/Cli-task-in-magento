<?php
namespace Bluethink\Grid\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $context;

    public function __construct(Context $context)
    {
        $this->context = $context;
        parent::__construct($context);
    }

    public function isEnable()
    {
        return $this->scopeConfig->getValue('testimonial_config/Testimonial_group2/enable', ScopeInterface::SCOPE_STORE);
    }
}