VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

    config.vbguest.auto_update = false
    
    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true

    config.vm.box = "chef/centos-7.0"
    config.vm.hostname = "photo-gallery"

    config.vm.synced_folder ".", "/vagrant"

    config.vm.synced_folder "./app/storage", "/vagrant/app/storage",
        owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=664"]

    config.vm.synced_folder "./public", "/vagrant/public",
        owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=664"]

    config.vm.network "private_network", ip: "10.10.10.5"

    config.vm.provider "virtualbox" do |vb|
        vb.name = "photo-gallery"
        vb.customize ["modifyvm", :id, "--memory", "1024"]
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    end

    config.vm.provision "ansible" do |a|
        a.playbook = "vagrant/playbook.yml"
    end
end
