define(
    [
        'ko',
        'Magento_Checkout/js/model/url-builder',
        'Magento_Checkout/js/model/error-processor',
        'mage/storage',
        'mage/translate',
        'uiComponent',
        'underscore',
        'Magento_Checkout/js/model/step-navigator',
        'loader'
    ],
    function (
        ko,
        urlBuilder,
        errorProcessor,
        storage,
        $t,
        Component,
        _,
        stepNavigator,
        loader
    ) {
        'use strict';
        /**
         *
         * extra_step - is the name of the component's .html template,
         *
         */
        return Component.extend({
            defaults: {
                template: 'Zaheer_Checkoutstep/extra-step'
            },

            //add here your logic to display step,
            isVisible: ko.observable(true),

            /**
             *
             * @returns {*}
             */
            initialize: function () {
                this._super();
                // register your step
                stepNavigator.registerStep(
                    //step code will be used as step content id in the component template
                    'extra-step',
                    //step alias
                    null,
                    //step title value
                    'Profile Management',
                    //observable property with logic when display step or hide step
                    this.isVisible,

                    _.bind(this.navigate, this),

                    /**
                     * sort order value
                     * 'sort order value' < 10: step displays before shipping step;
                     * 10 < 'sort order value' < 20 : step displays between shipping and payment step
                     * 'sort order value' > 20 : step displays after payment step
                     */
                    1
                );

                return this;
            },
            onSubmit: function () {
                // trigger form validation
                this.source.set('params.invalid', false);
                this.source.trigger('customCheckoutForm.data.validate');


                // verify that form data is valid
                if (!this.source.get('params.invalid')) {
                    // data is retrieved from data provider by value of the customScope property
                    var formData = this.source.get('customCheckoutForm');
                    formData.cartId = window.checkoutConfig.cartId;
                    // do something with form data
                    console.dir(formData);
                    var url, message;
                    url = urlBuilder.createUrl('/profile/data/save', {});
                    message = $t('Gift message saved');
                    storage.post(
                        url,
                        JSON.stringify(formData ),
                        false
                    ).done(function (response) {
                        if (response) {
                            if (response) {
                                 stepNavigator.next();
                            }
                        }
                    }).fail(function (response) {
                        errorProcessor.process(response);
                    }).always(function () {

                    });


                }
            },

            /**
             * The navigate() method is responsible for navigation between checkout step
             * during checkout. You can add custom logic, for example some conditions
             * for switching to your custom step
             * When the user navigates to the custom step via url anchor or back button we_must show step manually here
             */
            navigate: function () {
                this.isVisible(true);
            },

            /**
             * @returns void
             */
            navigateToNextStep: function () {
                stepNavigator.next();
            }
        });
    }
);
