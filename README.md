# Electronix-Website

In this project, we have an admin panel and user panel.
Admin panel related files are present in admin folder

# If you want to deploy this website using AWS Services follow the given steps:

1. Give a proper database connection

For database connection go to admin folder->connection.inc.php

![image](https://user-images.githubusercontent.com/70096937/164040584-a1b8b302-6807-4e52-a632-9aa92dc1471f.png)

In the above image you can see two $con commands. However, you will be keeping only the above one. You have to add your database endpoint, username, password, and database name respectively in line 5.

Along with that you have to change the IP address present on line 13. Replace it with the Public IP address of your EC2 instance


The same process is to be applied to user panel as well. For that come out of the admin folder and go to connection.inc.php
![image](https://user-images.githubusercontent.com/70096937/164041502-e3546d87-3832-4cd2-a6da-de07d346164f.png)


# If you want to deploy this website on localhost (XAMPP) follow the given steps:

1. Give a proper database connection

For databsae connection go to admin folder->connection.inc.php

![image](https://user-images.githubusercontent.com/70096937/164040584-a1b8b302-6807-4e52-a632-9aa92dc1471f.png)

In the above image you can see two $con commands. However, you will be keeping only the below one. Keep the line 8 command as it is only change the database name (it is ecom in my case)

The same process is to be applied to user panel as well. For that come out of the admin folder and go to connection.inc.php
![image](https://user-images.githubusercontent.com/70096937/164041502-e3546d87-3832-4cd2-a6da-de07d346164f.png)


