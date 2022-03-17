# How to install Blog for Magento 2

You will get an error, if **Mageplaza_Core** is not installed.



## Solution #1: Ready to paste (Not recommend)


If you don't want to install via composer, you can use this way. 


- Extract `master.zip` file to `app/code/Geexu/Blog`; You should create a folder path `app/code/Geexu/Blog` if not exist.
- Go to Magento root folder and run upgrade command line to install `Geexu_Blog`:

```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```


