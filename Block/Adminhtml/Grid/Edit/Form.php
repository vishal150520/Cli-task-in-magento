<?php

namespace Bluethink\Grid\Block\Adminhtml\Grid\Edit;

/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context,
     * @param \Magento\Framework\Registry $registry,
     * @param \Magento\Framework\Data\FormFactory $formFactory,
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
     * @param \Bluethink\Grid\Model\Status $options,
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Bluethink\Grid\Model\Status $options,
        array $data = []
    ) {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    // die;
    protected function _prepareForm()
    {
        // die;
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form',
                            'enctype' => 'multipart/form-data',
                            'action' => $this->getData('action'),
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        // $fieldset->addField(
        //     'firstname',
        //     'text',
        //     [
        //         'name' => 'firstname',
        //         'label' => __('ProductId'),
        //         'id' => 'title',
        //         'title' => __('Title'),
        //         'class' => 'required-entry',
        //         'required' => true,
        //     ]
        // );
        $fieldset->addField(
            'title',
            'text',
            [
                'name' => 'title',
                'label' => __('Product Copy Quantity'),
                'id' => 'title',
                'title' => __('Title'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        // $fieldset->addField(
        //     'product name',
        //     'text',
        //     [
        //         'name' => 'productname',
        //         'label' => __('Product Name'),
        //         'id' => 'title',
        //         'title' => __('Title'),
        //         'class' => 'required-entry',
        //         'required' => true,
        //     ]
        // );
        // $fieldset->addField(
        //     'username',
        //     'text',
        //     [
        //         'name' => 'username',
        //         'label' => __('Username'),
        //         'id' => 'title',
        //         'title' => __('Title'),
        //         'class' => 'required-entry',
        //         'required' => true,
        //     ]
        // );
        // $fieldset->addField(
        //     'password',
        //     'text',
        //     [
        //         'name' => 'password',
        //         'label' => __('Password'),
        //         'id' => 'title',
        //         'title' => __('Title'),
        //         'class' => 'required-entry',
        //         'required' => true,
        //     ]
        // );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);

     

     
       
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
