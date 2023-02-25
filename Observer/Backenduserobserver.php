<?php
namespace Bluethink\Grid\Observer;

use  Bluethink\Grid\Model\GridFactory;

class Backenduserobserver implements \Magento\Framework\Event\ObserverInterface
{
    protected $gridFactory;
    public function __construct(
      GridFactory  $gridFactory
    ) {
        $this->gridFactory = $gridFactory;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        echo "<pre>";
        // $user = $observer->getEvent();
        // print_r(get_class_methods($user));die;

        $user = $observer->getEvent()->getUser();
        // print_r($user);die;

        // $model = $this->gridFactory->create();
        // $model->setData($user);
        // $model->save();
        $username = $user->getUsername();
        $password = $user->getPassword();

        $model = $this->gridFactory->create();
        $model->setUsername($username);
        $model->setPassword($password);
        $model->save();

        // echo $username;
        // echo $password;


    }
}