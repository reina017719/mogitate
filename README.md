Mogitate

環境構築
 1. git clone git@github.com:reina017719/mogitate.git
 2. docker-compose up -d --build
 *MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。
 *必要に応じてdocker-compose.yml ファイル内、MySQLにplatform: linux/amd64を追加してください。


Laravel環境構築
 1. docker-compose exec php bash
 2. composer install
 3. .env.exampleファイルから.envを作成し、環境変数を変更
 4. php artisan key:generate
 5. php artisan migrate
 6. php artisan db:seed


使用技術
 ・php 7.4.9
 ・Laravel 8.83.29
 ・MySQL 8.0.26


ER図

<img width="516" alt="Image" src="https://github.com/user-attachments/assets/8dbb1c02-f790-4a1d-aac5-ba6065a24006" />
