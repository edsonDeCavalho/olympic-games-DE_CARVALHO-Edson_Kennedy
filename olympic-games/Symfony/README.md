Symfony Ratrapage 
========================


Nom : DE CARVALHO PEDRO
Prenom : Edson Kennedy 
A3 ALT1


Video 
------------
Sur youtube : https://www.youtube.com/watch?v=iVy9ek7z4oA

Sur Google Drive : https://drive.google.com/file/d/1CKXmrAEeflfXCcQnm6hVgz6eGA4Gnz0F/view

Requirements
------------

* PHP 8.1.1 or higher
* Symfony 6.0
* PDO-SQLite PHP extension enabled
* and the [usual Symfony application requirements][2].

Installation
------------

```bash
$ git clone https://github.com/edsonDeCavalho/olympic-games-DE_CARVALHO-Edson_Kennedy.git
```

Install Composer dependencies:

```bash
$ composer install
$ npm install
```

Usage
-----

Run this command to create the new bundle in `/lib`:

```bash
$ php bin/console skeleton-bundle:create
```

You will be asked for some needed arguments for the bundle structure and files.

There's no need to configure anything to run the application. If you have
[installed Symfony][4], run this command and access the application in your
browser at the given URL (<https://localhost:8000> by default):

```bash
$ cd Symfony/
$ symfony serve
```

If you don't have the Symfony binary installed, run `php -S localhost:8000 -t public/`
to use the built-in PHP web server or [configure a web server][3] like Nginx or
Apache to run the application.

Tests
-----

Execute this command to run tests:

```bash
$ cd Symfony/
$ ./bin/phpunit
```
