<?php

namespace Bluethink\grid\Model;

class Custom implements \Magento\Framework\Option\ArrayInterface
{ 
    /**
     * Return array of options as value-label pairs, eg. value => label
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            'value' => 'Label',
            'another_value' => 'Another value ',
        ];
       // 'value' => 'checkbox', 'label'=>__('Checkbox')
    }
}
