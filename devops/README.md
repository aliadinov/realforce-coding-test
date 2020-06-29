#### How to setup VMs:
1. ansible-galaxy install -r requirements.yml
2. cat ~/.ssh/%ssh_key%.pub | ssh root@ip_address "cat >>  ~/.ssh/authorized_keys"
3. Add new VMs to local ssh config
4. sudo apt-get update 
5. sudo apt-get install mc
5. sudo apt update | sudo apt upgrade -y | sudo apt install python2.7
6. ansible-playbook setup.yml -i inventory --extra-vars "stack=prod"
7. ansible-playbook update-conf.yml -i inventory --extra-vars "stack=prod"
8. ansible-playbook update-conf.yml -i inventory --extra-vars "stack=prod" --limit="*web-server"
9. sudo apt-get install sphinxsearch

10. ./prod-deploy.sh
11. composer install
12. setup mysql user

----
#### Add Swap Space
https://www.digitalocean.com/community/tutorials/how-to-add-swap-space-on-ubuntu-16-04
----

mysql -u root
FLUSH PRIVILEGES;
ALTER USER 'root'@'localhost' IDENTIFIED BY '';
CREATE DATABASE  `realforce`;