# Live In Grey site

This is a promotion one page site based on Laravel 5.6 and Foundation 6.  
After installing, the site should look like this:  
## Home page:  
  ![home page](https://github.com/Kostiantin/liveingrey/blob/master/public/img/screenshots/LiveInTheGrey_1.png)  
## Admin page:
  ![admin page](https://github.com/Kostiantin/liveingrey/blob/master/public/img/screenshots/LiveInTheGrey_2.png)  

This project can be used as a quick start for a single page promotion site.  

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

1) Pull the project;

2) Install the local site and database;

3) Change file .env.example to .env. Inside it assign database and connection credentials (user/password);

4) Run commands (in your Terminal or Command Line):  
     
     composer install  
     php artisan key:generate  
     php artisan config:cache  
     php artisan migrate --seed  
     npm install  
     npm run dev  
     
5) Try to go to the site url via browser.  

6) Admin panel is reachable by url: your_site.com/admin  

   Please use these credentials to login as Admin:  
     login: admin@admin.com  
     password: admin  
  
7) Enjoy :)
   
## Authors

* **Kostiantin Zavizion** - *Initial work* - [Kostiantin](https://github.com/Kostiantin)
