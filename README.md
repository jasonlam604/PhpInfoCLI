# PhpInfoCLI

PHP Info at Command Line

Currently Under Development


## Overview

## Install Phar

## Build & Install

Requires [phar-builder](https://github.com/MacFJA/PharBuilder)

Go to the root of the project and execute the following

```bash
php -d phar.readonly=0 phar-builder.phar package ./composer.json
```

```bash
chmod 755 ./bin/phpinfocli.phar 
```

```bash
mv ./bin/phpinfocli.phar /usr/local/bin
```







