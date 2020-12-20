<?php

namespace Zaheer\Checkoutstep\Model;

use Magento\Quote\Api\CartRepositoryInterface;
use Zaheer\Checkoutstep\Api\ProfileManagementInterface;


class ProfileManagement implements ProfileManagementInterface
{

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var CartRepositoryInterface
     */
    protected $cartRepository;
    /**
     * @var \Magento\Quote\Model\QuoteRepository
     */
    protected $quoteFactory;
    protected $request;
    protected $cartQuote;
    protected $_storeManager;

    /**
     * @param CartRepositoryInterface $cartRepository
     */
    public function __construct(
        CartRepositoryInterface $cartRepository,
        \Magento\Quote\Model\QuoteFactory $quoteFactory,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Quote\Model\Quote\ItemFactory $quoteItemFactory,
        \Magento\Quote\Model\Quote\Address\ItemFactory $addressItemFactory,
        \Magento\Quote\Model\ResourceModel\Quote\Item $itemResourceModel,
        \Magento\Framework\Webapi\Rest\Request $request,
        \Magento\Checkout\Model\Cart $cartQuote,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        $this->cartRepository = $cartRepository;
        $this->_checkoutSession = $checkoutSession;
        $this->quoteItemFactory = $quoteItemFactory;
        $this->addressItemFactory = $addressItemFactory;
        $this->itemResourceModel = $itemResourceModel;
        $this->quoteFactory = $quoteFactory;
        $this->request = $request;
        $this->_storeManager = $storeManager;

    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $postData = $this->request->getBodyParams();
        if (isset($postData['cartId'])) {
           $quote = $this->quoteFactory->create()->load($postData['cartId']);
            $quote->addData($this->request->getBodyParams()); // Fill data
            $quote->save(); // Save quote
        }

        return true;
    }
}
