# PHP-Helpdesk-ticket-system
Helpdesk/support ticketing system written in PHP.
## On HOLD
As my university academic session is starting, I won't be able to update my projects as often as I would like to.
## Who is this for ?
This is a full helpdesk ticketing system with users registration and login. You can assign helpdesk rights to users who will then be able to 
forward tickets, change statuses, give solutions & etc. Only users with helpdesk rights will see all of their companies tickets, reglar users can only 
see their own tickets.
## Requirements
1. PHP 5.6
2. mySQLi activated

# Installation
## Database
You will need to create a database called helpdesk, this database should have 2 tabels included, one called "tickets" that contain all the tickets, second "users" that contain all user information.

To create "tickets" table run this:
```
CREATE TABLE `helpdesk`.`tickets` ( `id` INT NOT NULL AUTO_INCREMENT , `user` VARCHAR(60) NOT NULL , `email` VARCHAR(60) NOT NULL , `content` VARCHAR(1000) NOT NULL , `category` VARCHAR(90) NOT NULL , `company` VARCHAR(90) NOT NULL , `status` VARCHAR(20) NOT NULL , `forwardedTo` VARCHAR(60) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```
To create "users" table run this:
```
CREATE TABLE `helpdesk`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `username` VARCHAR(60) NOT NULL , `email` VARCHAR(60) NOT NULL , `password` VARCHAR(128) NOT NULL , `company` VARCHAR(90) NOT NULL , `helpdesk` BOOLEAN NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```

Instructions will be added later on.
## License
Licensed under MIT. You can use this script for free for any private or commercial projects.
## Contribute
Please create a feature-branch if possible when committing to the project, if not then simply commit to master branch.
