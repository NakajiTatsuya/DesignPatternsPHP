## 目的 
PHPによるデザインパターンを理解
---

## 環境
Dockerイメージ:  [php:8.0.0alpha1-fpm](https://hub.docker.com/layers/i386/php/8.0.0alpha1-fpm-alpine/images/sha256-f47c8ee10a72a210b8194fa40a240808368cbd0b658181675fac9cf33759c16a?context=explore) 
- 言語: PHP8.0.0
- OS: Debian GNU/Linux 10
---

## はじめ方

0 MySQLサーバーの起動
`$ mysql.server start`

1 コンテナ  
`$ docker-compose up -d`

2 http://localhostでアクセス

3 PHPUnit をインストールする
`$ docker-compose exec php composer install`

4 テストを実行する

`$ docker-compose exec php composer test -- your_test_directory_path`  

例: テンプレートメッドのテスト  
`docker-compose exec php composer test -- TemplateMethod/Tests`

## その他
オートロードを編集した場合(composer.jsonのautoloadタグ)、「composer dump-autoload」コマンドを都度実行しないと、vendor/autoload.phpが書き換わらず、モジュールパスが更新されない。 ($ docker-compose exec php composer dump-autoload)
現在は、パス`/var/www/html`を名前空間`DesignPattern`に設定している。

```
下記は、composer.jsonからみたカレントディレクトリ(htmlディレクトリ)をモジュールのパスとしている。

(composer.json)
"autoload": {
    "psr-4": {
        "DesignPattern\\": "./"
    }
}

ロードされうるファイルとクラス
composer.json
tests
  A.php   ... DesignPattern\A クラス
  B/
    C.php ... DesignPattern\B\C クラス
```

### オートロードの種類
```
<psr-4 (Vendor\Namespace)>
{
    "autoload": {
        "psr-4": {
            "Alice\\MyModule\\": "src/"
        }
    }
}

ロードされうるファイルとクラス
composer.json
src/
  A.php   ... Alice\MyModule\A クラス
  B/
    C.php ... Alice\MyModule\B\C クラス
```

```
psr-4 (Vendor)
{
    "autoload": {
        "psr-4": {
            "Alice\\": "src/"
        }
    }
}

ロードされうるファイルとクラス

composer.json
src/
  A.php   ... Alice\A クラス
  B/
    C.php ... Alice\B\C クラス
```

```
psr-0 (Vendor\Namespace)
{
    "autoload": {
        "psr-0": {
            "Alice\\MyModule\\": "src/"
        }
    }
}

composer.json
src/
  Alice/
    MyModule/
      A.php   ... Alice\MyModule\A クラス
      B/
        C.php ... Alice\MyModule\B\C クラス
```

```
classmap

{
    "autoload": {
        "classmap": ["src/", "Something.php"]
    }
}

ロードされうるファイルとクラス
composer.json
Something.php ... このファイルに書かれている全クラス
src/ ... このファイルに書かれている全クラス

```

```
files
{
    "autoload": {
        "files": ["src/MyLibrary/functions.php"]
    }
}

ロードされうるファイルとクラス

composer.json
src/
  MyLibrary/
    functions.php ... このファイルに書かれているコードすべて

```

autoload設定後はdumpautoload  
composer.jsonを書き換えただけでは反映されないので、下記コマンドを実行する。
`$ composer dumpautoload`

以下ドキュメント The composer.json Schema - Composer
https://getcomposer.org/doc/04-schema.md#autoload


## composer 使い方
大きく3つ
1. composer require ライブラリ
2. composer install
3. composer update

- ユニットテストツールのインストール  
$ docker-compose run php composer require --dev phpunit/phpunit

- ライブラリの復元  
$ docker-compose run php composer install

- ライブラリのバージョンアップ  
$ docker-compose run php composer update
---

## 参考URL

- 公式ドキュメント  
https://designpatternsphp.readthedocs.io/ja/latest/README.html

- 公式ソース
https://github.com/DesignPatternsPHP/DesignPatternsPHP/tree/main/Behavioral