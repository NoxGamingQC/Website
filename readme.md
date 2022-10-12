# Website

[![Build Status](https://api.travis-ci.com/NoxGamingQC/Website.svg?token=8xPnyZAhxFTwCpTJsxsG&branch=master&status=errored)](https://travis-ci.com/NoxGamingQC/Website)
[![Dependencies](https://david-dm.org/NoxGamingQC/Website.svg)](https://david-dm.org/NoxGamingQC/Website)
[![Dev-Dependencies](https://david-dm.org/NoxGamingQC/Website/dev-status.svg)](https://david-dm.org/NoxGamingQC/Website?type=dev)
[![Online Discord Members](https://discord.com/api/guilds/938558244924829756/widget.png?style=shield)](https://noxgamingqc.ca/discord)

Our website [noxgamingqc.ca](https://noxgamingqc.ca). It use the version 5.5.50 of the Laravel framework.

## Installation

### Prerequirement

- npm
- nodejs
- Docker
- docker-compose
- posgresql
- php 7.4

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
