# Website

Our website [noxgamingqc.ca](https://www.noxgamingqc.ca).

[![Type](https://img.shields.io/badge/project%20type-website-red?style=for-the-badge)](#)
[![Website](https://img.shields.io/website?url=https%3A%2F%2Fnoxgamingqc.ca&style=for-the-badge)](#)
[![License](https://img.shields.io/github/license/NoxGamingQC/Website?style=for-the-badge)](#)
[![Laravel version](https://img.shields.io/badge/laravel-9.38.0-blue?style=for-the-badge)](#)
[![PHP version](https://img.shields.io/badge/php-%5E8.0.2-blue?style=for-the-badge)](#)
[![NPM version](https://img.shields.io/badge/npm-%5E6.13.6-blue?style=for-the-badge)](#)
<img alt="Discord" src="https://img.shields.io/discord/938558244924829756?style=for-the-badge&logo=discord&logoColor=%23ffffff&label=%20&labelColor=%23697EC4&color=%237289DA&link=https%3A%2F%2Fnoxgamingqc.ca%2Fdiscord">
<img alt="GitHub repo size" src="https://img.shields.io/github/repo-size/NoxGamingQC/Website?style=for-the-badge&logo=github&logoColor=%23ffffff">
  <img alt="Code Climate maintainability" src="https://img.shields.io/codeclimate/maintainability/NoxGamingQC/Website?style=for-the-badge&logo=codeclimate&logoColor=%23ffffff">
  <img alt="Code Climate issues" src="https://img.shields.io/codeclimate/issues/NoxGamingQC/Website?style=for-the-badge&logo=codeclimate&logoColor=%23ffffff">

## Travis Build status
[![Build Status](https://api.travis-ci.com/NoxGamingQC/Website.svg?token=8xPnyZAhxFTwCpTJsxsG&branch=master)](https://travis-ci.com/NoxGamingQC/Website)

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

## Acknowledgements

- Many thanks to all the people who contributed to the Laravel project.

## Credits

- [NoxGamingQC](https://github.com/noxgamingqc)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see the [license file](LICENSE.md) for more information.

## Known errors

- If you receive the error `Composer detected issues in your platform: Your Composer dependencies require a PHP version ">= 7.2.5".`, you can do `composer install --ignore-platform-reqs` until the issue is fixed.
