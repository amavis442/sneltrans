# create a new run stage to ensure certain modules are included first
stage { 'pre':
  before => Stage['main']
}

# add the baseconfig module to the new 'pre' run stage
class { 'baseconfig':
  stage => 'pre'
}

file { '/var/www/':
    ensure => 'directory',
}

# set defaults for file ownership/permissions
File {
  owner => 'root',
  group => 'root',
  mode  => '0644',
}

package { 'apache2':
    ensure => purged,
}

include baseconfig,nginx, php, mysql, curl, composer
