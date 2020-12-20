<?php
namespace Zaheer\Checkoutstep\Model;

use Magento\Checkout\Model\ConfigProviderInterface;


class CheckoutConfigProvider implements ConfigProviderInterface
{
    public function __construct(
         \Magento\Checkout\Model\Session $session
    ) {
         $this->_session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return [
             'cartId' => (int)$this->_session->getQuote()->getId(),
        ];
    }


}
