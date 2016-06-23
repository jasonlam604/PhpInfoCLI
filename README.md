# PhpInfoCLI

PHP Info at Command Line

Currently still under development, Release 0.1.0 has provide some basic info, see screensshot

![Release 0.1.0 Screenshot](/screenshots/PhpInfoCLI_Screenshot_Release_0_1_0.png?raw=true "Screenshot Release 0.1.0")


## Overview

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







