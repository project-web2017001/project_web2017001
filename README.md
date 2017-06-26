# Times Jobs

A basic job-portal website

## Getting Started

These instructions will get you a copy of the project up and running in your local machie for development and 
testing purposes.

### Prerequisites

1) phpMyAdmin
2) PHP v5.5+
3) Internet connection for CDNs to load
4) XAMPP or WAMP installed

### How to use

In the folder `timesjobs` you have all the project's PHP files, and a `db.sql` file
1) Open phpMyAdmin  <a href="http://localhost/phpmyadmin/">phpMyAdmin </a>
2) Import `db.sql` file

You will now have a database `timesjobs`

3) Move the folder `timesjobs` to `C:\xampp\htdocs\`
4) Open `localhost/timesjobs`

### You will be directed to the main page `index.php`

## Site-map
    index.php
    home.php
    apply.php
    results.php
    details.php
    profile.php
  
### The site has the following functionlities

Guest user can view the jobs posted, but will not be able to apply

### Demo Credentials

Use email: `user@test.com`
and password: `1234`
for demo purposes

You can ofcourse make your own account by clicking on Sign up

### Homepage will have search-functionalty, Featured Jobs

### Logged-in user can view their profile (Making changes to it is under development)

### Logged-in user can view and apply to various jobs by uploading their Resumes(PDF only)

### The uploaded resumes and job-applications get reflected in the database and are stored in 
    `uploads/` folder
    
## Built with Bootstrap, Core PHP, custom CSS

## Authors:
* **Satyam Raj** - *Initial work* - [stym06](https://github.com/stym06)
