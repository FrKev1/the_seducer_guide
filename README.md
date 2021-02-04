# Checkpoint 4 - The Seducer Guide - Symfony 5.*

This starter kit is used to develop a web application for 'The Seducer Guide'.


### Prerequisites

1. Check composer is installed
2. Check yarn & node are installed


### Install

1. Clone this project
2. Run `composer install`
3. Run `yarn install`
4. Run `yarn encore dev` to build assets
5. Create `.env.local` from the already existing `.env` file
6. Configure the MAILER_DSN with your information in .env.local file
7. Configure the DATABSE_URL with your information in .env.local file
8. Run `symfony console d:d:d --force`, then run `symfony console d:d:c` to create the database
9. Run `symfony console d:m:m` to run migrations
10. Run `symfony server:start` and open your project
11. Go to `/admin` with your email and password


### Working

1. Run `symfony server:start` to launch your local php web server
2. Run `yarn run dev --watch` to launch your local server for assets



### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`


## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.


## Authors

Wild Code School trainers team
&
Kévin Francisco