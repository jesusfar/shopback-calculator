# ShopBack Calculator

This is a basic demo, based on concepts of Domain Driven Design in PHP.

## How to use

```bash
$ ./shopback-calculator <action> <arg1> [<arg2>....]
```
## Available tasks:
### Signup Domain
```bash
$ ./shopback-calculator signup <domain>
```
### Spend return cashback awarded
```bash
$ ./shopback-calculator spend [<numeric_argument>....]
```
### Redeem Domain
```bash
$ ./shopback-calculator redeem <domain>
```
## Unit Test

1. Install phpunit with:

```bash
 $ composer install
 ```
2. Run unit test
```bash
 $ ./vendor/bin/phpunit
```
