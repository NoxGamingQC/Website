# Website

Our website [noxgamingqc.ca](https://www.noxgamingqc.ca).

[![License](https://img.shields.io/badge/license-mit-green?style=for-the-badge)](#)
[![PHP version](https://img.shields.io/badge/laravel-9.38.0-blue?style=for-the-badge)](#)
[![PHP version](https://img.shields.io/badge/php-%5E8.0.2-blue?style=for-the-badge)](#)
[![PHP version](https://img.shields.io/badge/npm-%5E6.13.6-blue?style=for-the-badge)](#)
<img alt="Discord" src="https://img.shields.io/discord/938558244924829756?style=for-the-badge&logo=discord&logoColor=%23ffffff&label=%20&labelColor=%23697EC4&color=%237289DA&link=https%3A%2F%2Fnoxgamingqc.ca%2Fdiscord">

## Travis Build status
[![Build Status](https://api.travis-ci.com/NoxGamingQC/Website.svg?token=8xPnyZAhxFTwCpTJsxsG&branch=master&status=errored)](https://travis-ci.com/NoxGamingQC/Website)

## Installation

### Prerequirement

- npm
- nodejs
- Docker
- docker-compose
- posgresql
- php 8.0.2 or higher

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

## Credits

- [NoxGamingQC](https://github.com/noxgamingqc)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.

## Known errors

- If you receive the error `Composer detected issues in your platform: Your Composer dependencies require a PHP version ">= 7.2.5".`, you can do `composer install --ignore-platform-reqs` until the issue is fixed.
