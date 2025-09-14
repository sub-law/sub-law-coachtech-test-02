🚀 環境構築手順　 Git Cloneでリポジトリを取得 
git clone git@github.com:sub-law/coachtech-test-02.git

🚀１：リポジトリ名変更  "任意のファイル名"

githubでリモートリポジトリの url を変更 ローカルリポジトリから紐付け先を変更 
cd "任意のファイル名" 
git remote set-url origin githubで作成したリポジトリのurl 
git remote -v

現在のローカルリポジトリのデータをリモートリポジトリに反映 
git add . 
git commit -m "リモートリポジトリの変更" 
git push origin main

🚀2：Laravel環境構築 
※プロジェクト直下の.gitignoreファイルによって 
以下のファイルはgit管理対象外です
.env 
docker/mysql/data/ 

1：プロジェクト直下に.envを作成（既にファイルがあり以下の記述があれば不要）
touch .env

2：.envに以下を記述（UID/GIDはホストOSのユーザーIDに合わせて設定）
UID=1000
GID=1000

3：Docker ビルド 
docker-compose up -d --build

4：PHPコンテナに入る 
docker-compose exec php bash

5：Composer インストール 
composer install

6：.env 作成 
cp .env.example .env

7：アプリキー生成 
php artisan key:generate

8：データベースの作成（マイグレーション） 
php artisan migrate

9：ダミーデータの作成 
php artisan db:seed

10：ストレージとのリンク
php artisan storage:link

11：PHPコンテナから出る　Ctrl+D

ER図
![alt text](image.png)

関連リンク

商品一覧：http://localhost/products
商品登録：http://localhost/products/create

データベース：http://localhost:8080/

🧪 使用技術 php:8.1-fpm
Laravel Framework 8.83.8
MySQL 8.0.26