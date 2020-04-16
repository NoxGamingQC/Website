# Website

[![Build Status](https://api.travis-ci.com/NoxGamingQC/Website.svg?token=8xPnyZAhxFTwCpTJsxsG&branch=master&status=errored)](https://travis-ci.com/NoxGamingQC/Website)
[![Dependencies](https://david-dm.org/NoxGamingQC/Website.svg)](https://david-dm.org/NoxGamingQC/Website)
[![Dev-Dependencies](https://david-dm.org/NoxGamingQC/Website/dev-status.svg)](https://david-dm.org/NoxGamingQC/Website?type=dev)
[![Online Discord Members](https://discordapp.com/api/guilds/605028700182020101/widget.png?style=shield)](https://discord.gg/6DGc24x)

## Setting up your environement

### Prerequirement

- npm
- nodejs
- Docker
- docker-compose
- posgresql
- php


### Step

- Create a new repository
- Navigate into the new repository
- Fork the project
- Import the git repository into it `git remote add origin <repository_git_url>`
- Duplicate `.env.exemple` and name it `.env`
- Install the node_modules `npm install`
- Get a new app key: `php artisan key:generate`
- Generate the database `php artisan migrate`
- Launch the app `docker-compose up -d --build`
- Reload the sources and the styles `npm run dev`


## Creator and contributors

- NoxGamingQC

### Useful Link

[GitHub](https://github.com/nox-studios/Website)

[Website](http://rebrand.ly/noxgamingqc)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
