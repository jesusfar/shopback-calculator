# ShopBack Calculator

This is a basic demo, based on concepts of Domain Driven Design in PHP.

## How to use

```bash
$ ./shopback-calculator <action> <arg1> [<arg2>....]
```
## Available tasks:
### Signup Domain
Award corresponding bonus amount with currency for each domain.

```bash
$ ./shopback-calculator signup <domain>
```
Example:
```bash
$ ./shopback-calculator signup www.shopback.sg
Award bonus: 5.00 USD
```
### Spend

Return cashback awarded rounded to 2 decimal places. Either:
- award 20% of the highest amount if every single amount is >= 50;
- award 15% of the highest amount if every single amount are >= 20;
- award 10% of the highest if all amounts are >= 10;
- or award 5% of the highest as cashback.

```bash
$ ./shopback-calculator spend [<numeric_argument>....]
```
Example:
```bash
$ ./shopback-calculator spend 20 10 15
Award cashback: 2.00
```
### Redeem Domain
Direct user to visit corresponding websites.

```bash
$ ./shopback-calculator redeem <domain>
```
Example:
```bash
$ ./shopback-calculator redeem www.shopback.sg
Visit http://www.shopback.sg to start earning cashback!
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
