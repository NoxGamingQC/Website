# Website

Our website [noxgamingqc.ca](https://www.noxgamingqc.ca).

[![Type](https://img.shields.io/badge/project%20type-website-blue?style=for-the-badge&labelColor=333333)](#)
[![State](https://img.shields.io/badge/state-maintained-228C22?style=for-the-badge&labelColor=333333)](#)
[![Repo size](https://img.shields.io/github/repo-size/NoxGamingQC/Website?style=for-the-badge&logo=github&logoColor=%23ffffff&labelColor=333333)](#)
[![License](https://img.shields.io/github/license/NoxGamingQC/Website?style=for-the-badge&labelColor=333333)](LICENSE.md)
[![Website](https://img.shields.io/website?url=https%3A%2F%2Fnoxgamingqc.ca&style=for-the-badge&labelColor=333333)](https://www.noxgamingqc.ca)
[![Travis build](https://img.shields.io/travis/com/NoxGamingQC/Website?style=for-the-badge&label=Travis%20build&logo=travis&logoColor=%23ffffff&labelColor=333333)](#)
[![Snyk security](https://img.shields.io/badge/Snyk%20security-monitored-8E48BF?style=for-the-badge&labelColor=333333)](#)
[![Code Climate maintainability](https://img.shields.io/codeclimate/maintainability/NoxGamingQC/Website?style=for-the-badge&logo=codeclimate&logoColor=%23ffffff&labelColor=333333)](https://codeclimate.com/github/NoxGamingQC/Website)

## Installation

### Prerequirement

[![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)](#)
[![Laravel](https://img.shields.io/badge/laravel-9.38.0-%23FF2D20.svg?style=for-the-badge&logo=laravel&labelColor=333333&logoColor=white)](#)
[![NPM](https://img.shields.io/badge/NPM-%5E6.13.6-%23CB3837.svg?style=for-the-badge&labelColor=333333&logo=npm&logoColor=white)](#)
[![NodeJS](https://img.shields.io/badge/node.js-6DA55F?style=for-the-badge&logo=node.js&logoColor=white)](#)
[![PHP](https://img.shields.io/badge/php-%5E8.0.2-%23777BB4.svg?style=for-the-badge&labelColor=333333&logo=php&logoColor=white)](#)
[![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white)](#)
[![Heroku](https://img.shields.io/badge/heroku-%23430098.svg?style=for-the-badge&logo=heroku&logoColor=white)](#)
[![Gulp](https://img.shields.io/badge/gulp-%23CF4647.svg?style=for-the-badge&logo=gulp&logoColor=white)](#)

### Steps

- Create a new repository
- Navigate into the new repository
- Fork the project
- Import the git repository into it

```bash
git remote add origin <repository_git_url>
```

- Duplicate `.env.exemple` and name it `.env`

```bash
php artisan key:generate
composer install
php artisan migrate
npm install
npm run dev
```

## Usage

```php
// Usage description here
```

### Testing

```bash
docker-compose up -d --build
```

Navigate to `localhost:8000`

## To do

- [ ] Add new routes
- - [ ] https://www.noxgamingqc.ca/privacy
- -  [ ] https://www.noxgamingqc.ca/profile/delete
- - [ ] https://www.noxgamingqc.ca/profile/devices
- - [ ] https://www.noxgamingqc.ca/profile/devices/logoff
- [ ] Server page will all info
- - [ ] Minecraft
- - - [ ] Player online count
- - - [ ] Player list
- [ ] Fix view on mobile devices

## Acknowledgements

- Many thanks to all the people who contributed to the Laravel project.

## Credits

- [NoxGamingQC](https://github.com/noxgamingqc)
- [All Contributors](../../contributors)

### Before editing .gitignore

Do not remove `composer.lock` from the file list
Heroku require that file to build the website.
