class composer {

    exec { 'install composer':
        command => '/usr/bin/curl -sS https://getcomposer.org/installer | /usr/bin/php -- --install-dir=/usr/local/bin',
        creates => '/usr/local/bin/composer.phar',
        require => Package['curl', 'php5-cli'],
        before  => File['/usr/local/bin/composer'],
    }

    file { '/usr/local/bin/composer':
        ensure => link,
        target => '/usr/local/bin/composer.phar',
    }


}