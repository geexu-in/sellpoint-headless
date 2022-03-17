# Mage2 Module Geexu BannerSlider

## Main Functionalities

Magento 2 banner slider gives you the abillity to add bother banners and sliders to page content using widgets.

Both Sliders and Hero banners, can be parallax, full width or full height or NOT. Configure the widgets to suit your needs.

The sliders also give you the ability to show the banner names below the slider as a linked slider.. 

## Installation


### Type 1: Zip file

 - Unzip the zip file in `app/code/Geexu/BannerSlider`
 - Enable the module by running `php bin/magento module:enable Geexu_BannerSlider`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

php bin/magento module:enable Geexu_BannerSlider
php bin/magento setup:upgrade
php bin/magento setup:di:compile #yes do this we use extension attributes so you can see the original price and the custom price.
php bin/magento setup:static-content:deploy en_GB en_US -f 
php bin/magento cache:flush
```
 


## Configuration

 - Enable (banner_slider/general/enable)


## Specifications

 - Widget
	- heroBanner

 - Widget
	- bannerSlider

 - Block
	- Banner\Slider > banner/slider.phtml

 - Block
	- Banner\Hero > banner/hero.phtml


