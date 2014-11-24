# create a new run stage to ensure certain modules are included first
stage { 'pre':
  before => Stage['main']
}

Exec {
    path => ["/bin", "/sbin", "/usr/bin", "/usr/sbin","/usr/local/bin","/usr/local/sbin"],
}

# add the baseconfig module to the new 'pre' run stage
class { 'baseconfig':
  stage => 'pre'
}


# set defaults for file ownership/permissions
File {
  owner => 'root',
  group => 'root',
  mode  => '0644',
}

package { 'apache':
    ensure => purged,
}

include baseconfig, nginx, php, mysql, curl, composer
