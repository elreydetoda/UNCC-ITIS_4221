#!/bin/bash

DEBIAN_FRONTEND=noninteractive
sudo apt-get update
homez=/home/vagrant
vagrant_home=${homez}/coding
ln -s /vagrant $vagrant_home
sudo add-apt-repository ppa:webupd8team/java -y -u >& /dev/null
echo debconf shared/accepted-oracle-license-v1-1 select true | sudo debconf-set-selections
echo debconf shared/accepted-oracle-license-v1-1 seen true | sudo debconf-set-selections
sudo apt-get install libswt-gtk-3-jni libswt-gtk-3-java xorg oracle-java8-installer -y
javaz=$(update-java-alternatives -l | rev | cut -d ' ' -f 1 | rev)
echo JAVA_HOME="$javaz" >> /etc/environment

# tomcatz
mkdir -p /opt/tomcat && cd $_
curl -s http://apache.mirrors.lucidnetworks.net/tomcat/tomcat-8/v8.0.50/bin/apache-tomcat-8.0.50.tar.gz | tar zx --strip-components=1
groupadd tomcat
useradd -s /bin/false -g tomcat -d /opt/tomcat tomcat
chgrp -R tomcat /opt/tomcat
chmod -R g+r conf
chmod g+x conf
chown -R tomcat webapps/ work/ temp/ logs/

cat /vagrant/tomcat.service >> /etc/systemd/system/tomcat.service
sed -i "s,Environment=JAVA_HOME=.*,Environment=JAVA_HOME=$javaz," /etc/systemd/system/tomcat.service
systemctl daemon-reload
sudo chmod -R a+rwx /opt/tomcat/conf


# eclipse ee for java
echo alias eclipse="/opt/eclipse/eclipse" >> ${homez}/.bashrc
mkdir -p /opt/eclipse && cd $_
curl -s http://eclipse.mirror.rafal.ca/technology/epp/downloads/release/neon/2/eclipse-jee-neon-2-linux-gtk-x86_64.tar.gz | tar zx --strip-components=1

echo 'Run this command when you start vagrant ssh into the vm'
echo -e "sudo /opt/tomcat/bin/startup.sh && sleep 3 && sudo /opt/tomcat/bin/shutdown.sh && sudo systemctl stop tomcat"
echo 'The following is your url that you browse to on your local machine i.e. http://localhost:8090/Tunestore/'
echo '/Tunestore/'
