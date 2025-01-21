# Bouquent flower APP

Instalasi depedensi

```BASH
Composer install
```

```BASH
npm install
```

Generate ENV

```
CP .env.example .env
```

```
php artisan key:generate
```

Setup env

```
MIDTRANS_SERVER_KEY=
MIDTRANS_CLIENT_KEY=
MIDTRANS_IS_PRODUCTION=
```
Migration and then seeder

```
php artisan migrate
```

```
php artisan db:seed
```



Running application

```
CMD 1: php artisan serve
```

```
CMD 2: npm run dev
```
