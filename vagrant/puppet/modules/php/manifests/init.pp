# vagrant/puppet/modules/php/manifests/init.pp
# == Class: php
#
# Installs PHP5 and necessary modules. Sets config files.
#
class php {
  package { [ 'php5-fpm',
             'php5-cli',
             'php-apc',
             'php5-curl',
             'php5-dev',
             'php5-gd',
             'php5-imagick',
             'php5-mcrypt',
             'php5-memcache',
             'php5-mysql',
             'php5-pspell',
             'php5-sqlite',
             'php5-tidy',
             'php5-xdebug',
             'php5-xmlrpc',
             'php5-xsl']:
    ensure => present,
    require => Exec['apt-get update'],
  }


  package{ ['mcrypt']:
    ensure => present
 }

  service { 'php5-fpm':
   ensure => running,
    require => Package['php5-fpm','mcrypt'],
  }
}
