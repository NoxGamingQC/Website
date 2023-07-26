# Website

Our website [noxgamingqc.ca](https://www.noxgamingqc.ca).

[![Type](https://img.shields.io/badge/project%20type-website-blue?style=for-the-badge)](#)
[![State](https://img.shields.io/badge/state-maintained-228C22?style=for-the-badge)](#)
[![Website](https://img.shields.io/website?url=https%3A%2F%2Fnoxgamingqc.ca&style=for-the-badge)](#)
[![License](https://img.shields.io/github/license/NoxGamingQC/Website?style=for-the-badge)](#)
[![Repo size](https://img.shields.io/github/repo-size/NoxGamingQC/Website?style=for-the-badge&logo=github&logoColor=%23ffffff)](#)

## Travis Build status
[![Build Status](https://api.travis-ci.com/NoxGamingQC/Website.svg?token=8xPnyZAhxFTwCpTJsxsG&branch=master)](https://travis-ci.com/NoxGamingQC/Website)

## Installation

### Prerequirement

![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-9.38.0-%23FF2D20.svg?style=for-the-badge&logo=laravel&labelColor=333333&logoColor=white)
![NPM](https://img.shields.io/badge/NPM-%5E6.13.6-%23CB3837.svg?style=for-the-badge&labelColor=333333&logo=npm&logoColor=white)
![NodeJS](https://img.shields.io/badge/node.js-6DA55F?style=for-the-badge&logo=node.js&logoColor=white)
![PHP](https://img.shields.io/badge/php-%5E8.0.2-%23777BB4.svg?style=for-the-badge&labelColor=333333&logo=php&logoColor=white)
![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white)

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

## Acknowledgements

- Many thanks to all the people who contributed to the Laravel project.

## Credits

- [NoxGamingQC](https://github.com/noxgamingqc)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.

## Known errors

- If you receive the error `Composer detected issues in your platform: Your Composer dependencies require a PHP version ">= 7.2.5".`, you can do `composer install --ignore-platform-reqs` until the issue is fixed.
