# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.provision "shell", inline: "sudo -u vagrant sh -c 'echo set editing-mode vi >> /home/vagrant/.inputrc'"
  config.vm.provision "shell", path: "tunestore_setup.sh"
  config.ssh.forward_x11 = true
  config.vm.network "forwarded_port", guest: 8080, host: 8090, auto_correct: true
end
