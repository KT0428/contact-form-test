# お問い合わせフォームアプリ

## 環境構築

### Dockerビルド
1. git clone git@github.com:KT0428/contact-form-test.git
2. cd contact-form-test
3. docker-compose up -d --build

### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. cp .env.example .env
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術（実行環境）

- PHP 8.1.34
- Laravel 8.83.29
- MySQL 8.0.26
- Docker
- nginx

## ER図

（ER図の画像をここに貼る）

## URL

- お問い合わせ画面：http://localhost/
- ユーザー登録：http://localhost/register
- ログイン画面：http://localhost/login
- 管理画面：http://localhost/admin
- phpMyAdmin：http://localhost:8080/
