# Mage2 Module Zaheer Checkoutstep

    ``zaheer/module-checkoutstep``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities


## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Zaheer`
 - Enable the module by running `php bin/magento module:enable Zaheer_Checkoutstep`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require zaheer/module-checkoutstep`
 - enable the module by running `php bin/magento module:enable Zaheer_Checkoutstep`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications




## Attributes

 - Sales - first_name (first_name)

 - Sales - last_name (last_name)

 - Sales - date_of_birth (date_of_birth)

 - Sales - email_id (email_id)

 - Sales - favorite_color (favorite_color)

 - Sales - customer_comment (customer_comment)

