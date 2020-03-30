Heartwave
========================

How we could stop people treating themselves at home without knowing for sure what they have? Ho we could monitor health of a person who suffered a surgery and is recovering at home ? How we could prevent some medical problems? How we can use that data to help others? These questions made us to think about this application.

    
Requirements
========================

* **PHP** - Any version greater than 5.5.9
* **Composer**
* **MySQL**

Installation
========================

1. **Clone the repository**
~~~
git clone https://github.com/andreirat/heartwave
~~~

2. **Go into project folder**
~~~
cd Heartwave/
~~~
3. **Install project dependencies using Compose manager**
~~~
composer install
~~~
3. **Install bower dependencies**
~~~
bower install
~~~
4. **Install assets**
~~~
php bin/console ass:i
php bin/console ass:d
~~~
5. **Create database**
~~~
php bin/console doctrine:database:create
~~~
6. **Run database migrations**
~~~
php bin/console doctrine:migrations:migrate
~~~

What's inside?
--------------

The Heartwave is configured with the following defaults:

  * An FrontBundle for normal users and an AdminBundle for Admin;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration
    
