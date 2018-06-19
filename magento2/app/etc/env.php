<?php
return [
  'backend' => [
    'frontName' => 'admin'
  ],
  'crypt' => [
    'key' => '4929664e88a0ce5bb9fdef4355299a87'
  ],
  'db' => [
    'table_prefix' => '',
    'connection' => [
      'default' => [
        'host' => 'localhost',
        'dbname' => 'magento_sd',
        'username' => 'root',
        'password' => '123456',
        'active' => '1'
      ]
    ]
  ],
  'resource' => [
    'default_setup' => [
      'connection' => 'default'
    ]
  ],
  'x-frame-options' => 'SAMEORIGIN',
  'MAGE_MODE' => 'developer',
  'session' => [
    'save' => 'files'
  ],
  'cache_types' => [
    'config' => 0,
    'layout' => 0,
    'block_html' => 0,
    'collections' => 0,
    'reflection' => 0,
    'db_ddl' => 0,
    'eav' => 0,
    'customer_notification' => 0,
    'config_integration' => 0,
    'config_integration_api' => 0,
    'full_page' => 0,
    'translate' => 0,
    'config_webservice' => 0
  ],
  'install' => [
    'date' => 'Tue, 19 Jun 2018 13:43:55 +0000'
  ]
];
