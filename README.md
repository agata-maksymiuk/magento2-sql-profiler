# Magento 2 SQL Handy Profiler
Small &amp; simple extended Magento 2.x Profiler with SQL queries list.
<h2>Features</h2>
<ul>
    <li>Displays all SQL queries list</li>
    <li>Some nice syntax coloring</li>
    <li>Created &amp; tested with Magento 2.2.8</li>
</ul>
<h2>Install &amp; run</h2>

Add the repository in your composer.json:

    "require": {
        ...
        "handy/module-profiler": "^1.0"
    },
    "repositories": [
        ...
        {
            "type": "git",
            "url": "https://github.com/agata-maksymiuk/magento2-sql-profiler.git"
        }
    ]
    
Then run:

    composer update handy/module-profiler
    bin/magento module:enable Handy_Profiler
    bin/magento setup:upgrade
    bin/magento setup:di:compile

In app/etc/env.php add add the following reference to the database profiler class:

            'profiler' => [
                'class' => '\Magento\Framework\DB\Profiler',
                'enabled' => true,
            ],

An example follows:

     'db' =>
      array (
        'table_prefix' => '',
        'connection' =>
        array (
          'default' =>
          array (
            'host' => 'localhost',
            'dbname' => 'magento',
            'username' => 'magento',
            'password' => 'magento',
            'model' => 'mysql4',
            'engine' => 'innodb',
            'initStatements' => 'SET NAMES utf8;',
            'active' => '1',
            'profiler' => [
                'class' => '\Magento\Framework\DB\Profiler',
                'enabled' => true,
            ],
          ),
        ),
      ),
