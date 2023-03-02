<?php


namespace Bluethink\Grid\Controller\Adminhtml\Grid;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Bluethink\Grid\Model\GridFactory
     */
    var $gridFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Bluethink\Grid\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Bluethink\Grid\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
       
        try {
            if($data)
            {
                if($data['title']==null || $data['title']==0|| $data['title']==1 )
                {
                    $data['title']=1;
                    $randomid = mt_rand(100000,999999);  
                    $data['content']=$randomid;
                    // print_r($data);die();

                }
                else
                {
                    $data['title']=$data['title'];
                    $n=$data['title'];
                    for($i=0;$i<$n;$i++)
                    {
                        // $randomid = mt_rand(100000,999999); 
                        // echo $randomid;die();
                        // $array[$i] = mt_rand(100000,999999);
                        // $randomid= implode(",",$array);
                        // echo $randomid;die();
                        // $data['productid']=$randomid;
                        $random_number_array = range(100000,999999);
                        shuffle($random_number_array );
                        $random_number_array = array_slice($random_number_array ,1,$n);
                        $randomid= implode(",",$random_number_array);
                        $data['content']=$randomid;
                        // echo $randomid;die();
                        // print_r($random_number_array);die();
                    }
                     
                    
                }
            }  
            $rowData = $this->gridFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Bluethink_Grid::save');
    }
}