# Magestio Core

<p>
<a href="https://magestio.com/"><img src="https://magestio.com/wp-content/uploads/magestio-logo@4x-8.png" align="left" width="120" height="25" ></a>
</p>

### Core functionality for Magento 2 Magestio extensions


### Installation

* Download the extension
* Unzip the file
* Create app/code/Magestio/Core directory
* Copy the contents to app/code/Magestio/Core


### Enable the extensions

```
php bin/magento module:enable Magestio_Core
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
php bin/magento setup:static-content:deploy
```

### Requirements

* Compatible with Magento 2.+

### Technical support

* Web: [https://magestio.com/](https://magestio.com/)
