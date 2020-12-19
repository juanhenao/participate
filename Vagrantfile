# -*- mode: ruby -*-
# vi: set ft=ruby :


Vagrant.configure("2") do |config|

  #Box Settings
  config.vm.box = "ubuntu/bionic64"

  #Provider Settings
  config.vm.provider "virtualbox" do |vb|
    vb.memory = 2048
    vb.cpus = 4
  end

  #Network Settings
  config.vm.network "forwarded_port", guest: 80, host: 8080

  #Folder Settings
  config.vm.synced_folder ".", "/var/www/html", :mount_options => ["dmode=777", "fmode=666"]

  #Provision Settings
  config.vm.provision "shell", path: "bootstrap.sh"
end
