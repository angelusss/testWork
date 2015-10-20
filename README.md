JDI Developer Task
==================

Task Done! Project Deployment
----------

1. Clone repository
2. Create folders /assets and /protected/runtime (chmod 777)
3. Create file /protected/config/database.php by copying /protected/config/database-default.php and Insert there your database credentials(replace %DATABASE_NAME% , %DATABASE_USER% and %DATABASE_PASSWORD%)
4. Import database by Yii migrations (write in console "protected/yiic migrate" ) or by dump file "testwork.sql" in root folder
5. Add some files in admin module ( URL site_name/admin in browser). Login: admin Password: 123 (You can change this user or add new in admin panel)
6. Watch your files on frontend part

Prerequisites
-------------

- Get a github account (If you don't already have one)
  - if you don't want to use your github account please include the .git folder in the test
- Install git, if you haven’t used git before see;
 - <https://help.github.com/articles/set-up-git>
- Initiate a git repo where you will document your progress and commit the project
- Install PHP 5.4 or greater
 - Alternatively create a virtual machine using Vagrant (<http://www.vagrantup.com/>) and PuPHPet (<https://puphpet.com/>)

Task
----

You will be creating a "File Management System".

Your git repository has two interfaces, please use these interfaces as the foundation of the task.

Feel free to implement the web page as you like, we would like a simple admin panel where we can test the functionalities described in the php interfaces.

You can use bootstrap as your css base. The end result should be responsive. If you use a psd as a base for the design please include it in the task.

You may use a storage engine of your choice, for example MySQL, Sqlite or flat files. If you choose to use MySQL or another SQL database then please provide a schema dump.

You may complete the task in any way you see fit.

Conclusion
----------

In your repository *PROGRESS* file, you should note your experience with the task, and provide some critique to the codebase as a whole.

If you used Vagrant and/or PuPHPet to create a development VM please include the configuration files so we can test your code on the same platform.


