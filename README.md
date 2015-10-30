# PassbookBundle

Passbook REST API bundle for Symfony2

## Description 

I develop an application that manages passes/coupons using apple passbook server for smart phones. 
There are two components of this application. First component is a UI Plugin(Passbook-UI) which is developed 
for Wordpress. This plugin provides the complete Interface for manage passes/coupons for users.

Second component is developed in Symfony2. That is a complete REST API which is integrated with Passbook-UI Plugin. 
All backend working done by PassbookBundle.

[Passbook UI Plugin](https://github.com/kamranshahzad/passbook-ui).

## Installation.

Using composer

``` bash
$ composer require kamran/passbook-bundle dev-master
```
Add the KamranPassbookBundle to your AppKernel.php file:

```
new Kamran\PassbookBundle\KamranPassbookBundle();
```


## Reporting an issue or feature request.

Issues and feature requests are tracked in the 
[Github issue tracker](https://github.com/kamranshahzad/PassbookBundle/issues).


How to contribute?
------------------------------------
The contribution for this bundle for public is open, anybody could help me to participate 
bugs, documentation and code.



## License.
This software is licensed under the MIT license. See the complete license file in the bundle:
```
Resources/meta/LICENSE
```
[Read the License](https://github.com/kamranshahzad/PassbookBundle/blob/master/Resources/meta/LICENSE)
