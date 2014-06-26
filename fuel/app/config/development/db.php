<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
  'default' => array(
    // 'type'        => 'pdo',
    'type'        =>  'mysqli',
    'connection'  => array(
      'hostname'   => 'localhost',
      'port'       => '3306',
      'database'   => 'blog_development',
      'username'   => 'root',
      'password'   => '',
      'persistent' => false,
      #'socket'     => '/tmp/mysql.sock'
      'socket'     => '/var/lib/mysql/mysql.sock' 
    ),
    'identifier'   => '`',
    'table_prefix' => '',
    'charset'      => 'utf8',
    'enable_cache' => true,
    'profiling'    => false,
  )
);
