# Credit-Management
In this project we will Create a simple dynamic website which has the following specs.
**Start with creating dummy data in database for upto 10 users.
**Database used: Mysql 
**User table will have basic fields  name, email and  current credit.
Initialise the current credit of all the users with 100(say), you can take different

**Transfers table will record all transfers happened.
**Flow: Home Page > View all Users > Select and View one User >
Transfer Credit > Select user to transfer to > View all Users. 
**Credit is sort of points which can be transferred from one user to another user.
** No Login Page. No User Creation. Only transfer of credit between multiple users.


#code for creating a table named as user

CREATE TABLE `creditmanagement`.`user` ( 
`user_id` INT(3) NOT NULL AUTO_INCREMENT ,
`username` VARCHAR(60) NOT NULL ,
`firstname` VARCHAR(60) NOT NULL ,
`lastname` VARCHAR(60) NOT NULL ,
`email` VARCHAR(60) NOT NULL ,
`current_credit` INT(11) NOT NULL ,
PRIMARY KEY (`user_id`)
) ENGINE = InnoDB;

