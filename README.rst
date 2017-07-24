SFTP Adapter for Shopware
==============================

.. image:: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
   :target: LICENSE.md

Building a package
------------------

Just run ``./build.sh``.

Install
-------

Download the plugin from the release page and enable it in shopware.

Usage
-----

Update your ``config.php`` in your root directory and fill in your own values::

  'cdn' => [
      'backend' => 'sftp',
      'adapters' => [
          'sftp' => [
               'type' => 'sftp',
               'host' => 'example.com',
               'port' => 22,
               'username' => 'username',
               'password' => 'password',
               'privateKey' => 'path/to/or/contents/of/privatekey',
               'root' => '/path/to/root',
               'timeout' => 10,
               'directoryPerm' => 0755
          ]
      ]
  ]


Value explanation
-----------------


License
-------

The MIT License (MIT). Please see `License File <LICENSE.md>`_ for more information.
