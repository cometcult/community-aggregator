Community Aggregator
====================

Website is live
---------------

http://www.beggars.co/


GitHub Board (HuBoard)
----------------------

https://tcc-github-board.herokuapp.com/cometcult/community-aggregator


Installation instruction
------------------------

Copy the configuration:

```
cp app/config/config.yml.dist app/config/config.yml
```

Initialize Vagrant machine
```
vagrant up --provision
```

after the process is complete open Vagrant machine
```
vagrant ssh
```
go to `/var/www/community-aggregator.dev/`
and run
```
composer install
```

Install assets:

```
php app/console assets:install web --symlink
```

Next step is to add a working address to your /etc/hosts:
Edit `/etc/hosts` file and add the following line:
```
192.168.33.15 community-aggregator.dev
```
