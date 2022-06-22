# GinePop

<details>
<summary>Com instal·lar Ginepop en laragon (Amb Captures)</summary>
<br>

### Iniciem el laragon

![image](https://user-images.githubusercontent.com/78435604/170719000-eec4b633-7c5c-45d4-8e67-ea1f8aced565.png)

### Creem un nou projecte de laravel

![image](https://user-images.githubusercontent.com/78435604/170718922-853feff7-9c01-4c42-b4f6-fb4b752a3ff7.png)<br>

### Posem nom al nostre projecte `Ginepop`

![image](https://user-images.githubusercontent.com/78435604/170719516-3b3b57bd-6a1d-4905-91c1-845a76c60d8e.png)

- ## Visual studio Terminal

### Inicialitzem el directori
> `git init`

![image](https://user-images.githubusercontent.com/78435604/170727275-85f85f9e-c844-439b-b058-23831ca65653.png)

### Conectem el directori amb el repositori
> `git remote add origin https://github.com/paurigine/GinePop.git`

![image](https://user-images.githubusercontent.com/78435604/170727218-15fbd1d2-3ad2-4da2-823a-804dc671c1f4.png)

### Descarreguem el repositori
> `git fetch --all`

![image](https://user-images.githubusercontent.com/78435604/170726950-07b57bf2-a1a4-4e50-823d-5c4a34a20a77.png)

### Actualitzem el directori
> `git reset --hard origin/main`

![image](https://user-images.githubusercontent.com/78435604/170727078-bdbd2ba6-3173-4339-b919-19ea840f34d5.png)

- ## Laragon Terminal

### Instalem les dependencies
> `npm install`

![image](https://user-images.githubusercontent.com/78435604/170722251-b591a439-b8c0-47cf-ab3b-ea71cdbc07b7.png)

### Instalem una dependencia extra
>`composer require laravel/fortify`

![image](https://user-images.githubusercontent.com/78435604/170725420-44a12691-f4c2-44a2-9eac-c6cc2dcf7e1d.png)

### Canviar fitxer `.env`
> `ginepop`

![image](https://user-images.githubusercontent.com/78435604/170723023-b981b0f6-e26a-4055-9d12-0472b58fff26.png)

### Creem la BBDD
> `php artisan migrate`

![image](https://user-images.githubusercontent.com/78435604/170723145-90037fee-0144-419c-a376-6aba3865bbdd.png)

### Obrim el navegador i busquem
> `http://ginepop.test/`

</details>

<details>
<summary>Com instal·lar Ginepop en laragon (Sense Captures)</summary>
<br>
    
### Iniciem el laragon

### Creem un nou projecte de laravel

### Posem nom al nostre projecte `Ginepop`

- ## Visual studio Terminal

### Inicialitzem el directori
> `git init`

### Conectem el directori amb el repositori
> `git remote add origin https://github.com/paurigine/GinePop.git`

### Descarreguem el repositori
> `git fetch --all`

### Actualitzem el directori
> `git reset --hard origin/main`

- ## Laragon Terminal

### Instalem les dependencies
> `npm install`

### Instalem una dependencia extra
>`composer require laravel/fortify`

### Canviar fitxer `.env`
> `ginepop`

### Creem la BBDD
> `php artisan migrate`

### Obrim el navegador i busquem
> `http://ginepop.test/`
    
</details>

<details>
<summary>Estats</summary>
<br>
    
| **users** | **state** |  | **items** | **state** |  | **category** | **state** |
|---|---|---|---|---|---|---|---|
| 0 | normal |  | 0 | normal |  | 0 | active |
| 1 | timeout |  | 1 | sold |  | 1 | disabled |
| 2 | banned |  | 2 | disabled |  |  |  |
| 3 | admin |  | 3 | expired |  |  |  |
| 4 | disabled |  | | |  |  |  |
    
</details>

<details>
<summary>Fitxer .env</summary>
<br>

```php
APP_NAME=Ginepop
APP_ENV=local
APP_KEY=base64:y8ZUAVOQUeMUFPivr4pCPEUmbuazTRibPBaw6Hoh+dQ=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ginepop
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=rubenrecolons2001@ginebro.cat
MAIL_PASSWORD=Daw22021
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=no-reply@ginebro.cat
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

</details>