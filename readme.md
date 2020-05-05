1. composer install

2. composer require knplabs/knp-paginator-bundle

3. create a new database 'bookercourse': php bin/console doctrine:database:create
   php bin/console make:migration
   php bin/console doctrine:migrations:migrate
   (eventually remove all migrations files before the last step)

4. import the file with data called 'bookercourse.sql' to the database, before dischecked "Enable foreign key checks"

5. eventually after that you can  use fixtures --append

6. terminal command to start: symfony serve


Password : 123456
Admin : admin@gmail.com
Regular user : anna5@gmail.com

1.	Registration a new user – ok
2.	Login OK
3.	Logout ok
4.	User profile afficher – ok
5.	User profile update  - ok
6.	Delete user account – ok
7.	Admin upload a new course – ok
8.	Admin show all users + delete user -OK
9.	Admin show all course + delete course ok,  + update course ok, + showMyCourses - ok
10.	Add a comment – ok
11.	Show all comments - ok
12.	Search bar – OK
13.	Listing of all courses – OK
14.	Selecting a course with details – ok
15.     Upload DataFiles - ok
16.     Filters - ok


TO DO :

16.	Buy course



