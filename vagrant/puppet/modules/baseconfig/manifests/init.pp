# == Class: baseconfig
#
# Performs initial configuration tasks for all Vagrant boxes.
#
class baseconfig {
  exec { 'apt-get update':
    command => '/usr/bin/apt-get update';
  }
  
  exec { 'apt-get upgrade':
    command => '/usr/bin/apt-get upgrade -y --fix-missing';
  }
  -> exec { 'apt-get install vim':
    command => '/usr/bin/apt-get install -y vim';
  }

  #host { 'hostmachine':
  #  ip => '192.168.56.101';
  #}

  file {
    '/home/vagrant/.bashrc':
      owner => 'vagrant',
      group => 'vagrant',
      mode  => '0644',
      source => 'puppet:///modules/baseconfig/bashrc';
  }

    file { '/etc/motd':
        content => "Welcome to the undsoehne VM!\nManaged by Vagrant and Puppet.\n----------------\nAliases:\nwww: Go to www directory\n----------------\n",
    }
}
