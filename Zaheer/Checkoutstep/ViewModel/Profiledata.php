<?php

namespace Zaheer\Checkoutstep\ViewModel;

use Psr\Log\LoggerInterface;
use Magento\Framework\App\Request\Http;

class Profiledata implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    protected $logger;
    protected $request;
    protected $order;

    public function __construct(
        LoggerInterface $logger,
        Http $request,
        \Magento\Sales\Api\OrderRepositoryInterface $order
    )
    {
        $this->logger = $logger;
        $this->request = $request;
        $this->order = $order;
    }

    public function getProfileData()
    {
        //$this->logger->info('order id ' . $this->request->getParam('order_id'));
        $order = $this->order->get($this->request->getParam('order_id'));
        $profileData['first_name'] = $order->getFirstName();
        $profileData['last_name'] = $order->getLastName();
        $profileData['date_of_birth'] = $order->getDateOfBirth();
        $profileData['email_id'] = $order->getEmailId();
        $profileData['favorite_color'] = $order->getFavoriteColor();
        $profileData['customer_comment'] = $order->getCustomerComment();
        return $profileData;
    }
}
