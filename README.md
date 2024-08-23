# testquest
for web-company

## Требования

Для запуска проекта у вас должны быть установлены следующие компоненты:

- PHP >= 8.0
- Composer
- MySQL
- Laravel >= 10.x
- jQuery (добавлен в layout вёрстки)

## Установка

### 1. Клонирование репозитория

Клонируйте репозиторий на свой локальный компьютер:

```bash
git clone https://github.com/AwakePulse/testquest.git
cd repository
```

### 2. Установка зависимостей
```
composer install
```

### 3. Настройка переменных окружения
Отредактируйте файл ".env" на ваши значения, если это требуется:
```
APP_NAME=testquest
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```
Для подключения к базе данных используйте СУБД MySql.
Настройте следующие строчки на ваши значения:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3305
DB_DATABASE=testquest
DB_USERNAME=root
DB_PASSWORD=
```
Для отправки тестовых mail был использован сервис - mailtrap.
Отредактируйте следующие строчки на ваши значения:
```
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=c2********
MAIL_PASSWORD=**********
```

### 4. Миграции
Запустите миграции для создания таблиц в базе данных
```
php artisan migrate
```

### 5. Запуск локального сервера
```
php artisan serve
```
Проект будет доступен по адресу http://localhost:8000 / http://127.0.0.1:8000.

