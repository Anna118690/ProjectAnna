1. installation of dependences:  composer install
2. create a new database:
   php bin/console doctrine:database:create
3. php bin/console make:migration
4. php bin/console doctrine:migrations:migrate
5. import the file from "documentation" folder named 'bookercoursegood4.sql' to the database MySQL, before dischecked "Enable foreign key checks"
6. symfony serve

Password for all: 123456
Admin : admin@gmail.com, (teacher as admin) : peterteacher@gmail.com
Regular user  (student): anna5@gmail.com

1.	Registration a new user – ok
2.	Login OK
3.	Logout ok

                        //User profile management (student)
                        
4.	User profile - show my profile (dashboard)– ok
5.	User profile update - profile uodate (dashboard) - ok
6.	Delete user account delete my profile (dashboard) – ok
7.  List of my ordered courses (dashboard ) - ok
8.  List of course materials that I have ordered (dashboard) - ok
9.  Show myComments  + deleteMyComment - ok

                       // Admin profile management (teacher)
                    
10.	Admin upload a new course – ok
11.	Admin show all users + delete user -OK
12.	Admin show all course + delete course ok,  + update course ok, +         showMyCourses where I teach- ok
13. Upload course materials - ok
14. Make a new reservation of the course - ok
15. List of course's materials to download - ok

                    //General functionalities

16.	Add a new comment – ok
17.	Show all comments on the course's page - ok
18.	Search bar - search by phrase – OK
19.	Listing of all courses – OK
20.	Selecting a course with details – ok
21. Filters – fiter by level, language, price - ok
22. Paginator - ok
23. Contact -  send a email - ok
24. Order the course - ok
25. PayPal






