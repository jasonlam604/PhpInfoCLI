# PhpInfoCLI

PHP Info at Command Line

## Overview

Provide PHP Info at command line with the goal of providing most if not all the info you would see using phpinfo() when displayed on a web page.

### Availalboe Info:

* PHP Version
* System Info
* Build Date
* Configure Command(s)
* Server Api
* Virtual Directory Support
* Configuration File (php.ini) Path
* Loaded Configuration File
* Scan this dir for additional .ini file
* PHP API
* PHP Extensions
* Zend Extension
* Zend Extension Build
* PHP Extension Build
* Debug Build
* Thread Safety
* Zend Signal Handling
* Zend Memory Manager
* Zend Multibyte Support
* IPv6 Support
* DTrace
* Registered PHP Streams
* Registered Stream Socket Transports
* Registered Stream Filters

### Screenshot

![Release 0.1.0 Screenshot](/screenshots/PhpInfoCLI_Screenshot_Release_0_1_0.png?raw=true "Screenshot Release 0.1.0")

## Install Phar

## Build & Install

Requires [phar-builder](https://github.com/MacFJA/PharBuilder)

Go to the root of the project and execute the following

```bash
php -d phar.readonly=0 phar-builder.phar package ./composer.json
```

```bash
chmod 0755 ./bin/phpinfocli.phar 
```

```bash
mv ./bin/phpinfocli.phar /usr/local/bin
```







