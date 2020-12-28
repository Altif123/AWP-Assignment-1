# Huddersfield Cafe
crud-application-Altif-123 created by GitHub Classroom

### About
This web app shows the menu for Huddersfield Cafe a fictional cafe that serves all kinds of foods and bevrages from coffee to burgers and steaks.
The web app allows users to login and add?edit dishes to the menu. Users can also remove dishes and add a dish to thier favorite section. 

### Accessibility
- Users can switch between dark mode and light mode, this helps those users with visualimpariments to navigate the site more easily.
- There is also a help section that explains how to use all the pages.
- The site is also accesible for the use of screen readers.

### Dependencies 
- tailwindcss/ui
- Laravel -v8
- PHP -v7.3

### Installation
To install the web application please do the following:
-copy the env example file using the following command in to the terminal
 
`> cp .env.example .env`

You will also need the following 
 
-A mysql database connection. Xampp is easiest to use.

-Or you could simply use the command `> docker-compose up` , docker will need to be installed first.

Then you will need to run the following commands in the terminal to install the project

`> php artisan key:generate`

`> php artisan migrate:fresh --seed`

Then run `> php artisan serve` to start the server 

The url the app will be on is `http://127.0.0.1:8000/`

When using Docker the url will be `http://127.0.0.1:3000/`
### Libraries used 
- Alpine.js (https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js)
- Cookie.js (https://github.com/madmurphy/cookies1.js)
- Font awesome (https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css)
- StripeJS ("https://js.stripe.com/v3/") 
- StripeJS docs ("https://stripe.com/docs/js/elements_object/create")