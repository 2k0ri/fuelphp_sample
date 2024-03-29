<?php
/**
 * Use this file to override global defaults.
 *
 * See the individual environment DB configs for specific config information.
 */

return array(

  'active' => 'default',

  /**
   * Base config, just need to set the DSN, username and password in env. config.
   */
  'default' => array(
    // 'type'        => 'pdo',
    'type'        =>  'mysqli',
    'connection'  => array(
      'hostname'   => 'localhost',
      'port'       => '3306',
      'database'   => 'fuel_sample',
      'username'   => 'root',
      'password'   => '',
      'persistent' => false,
      'socket'     => '/var/lib/mysql/mysql.sock' 
    ),
    'identifier'   => '`',
    'table_prefix' => '',
    'charset'      => 'utf8',
    'enable_cache' => true,
    'profiling'    => false,
  )
);
