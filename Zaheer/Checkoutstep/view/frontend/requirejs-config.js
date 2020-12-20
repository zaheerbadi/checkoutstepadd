var config = {
    'config': {
        'mixins': {
            'Magento_Checkout/js/view/shipping': {
                'Zaheer_Checkoutstep/js/view/shipping-payment-mixin': true
            },
            'Magento_Checkout/js/view/payment': {
                'Zaheer_Checkoutstep/js/view/shipping-payment-mixin': true
            }
        }
    }
}
