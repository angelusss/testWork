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

