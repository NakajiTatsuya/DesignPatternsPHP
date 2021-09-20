# 概要
あるクラスのあるインターフェースを互換性のあるインターフェースに変換する。
アダプタは、元のインターフェイスを使用しながら、そのインターフェイスをクライアントに提供することで、互換性のないインターフェイスのために通常は動作しないクラスを一緒に動作させることができる。

## テスト
docker-compose exec php composer test -- Adapter/Tests


## 公式ドキュメント
https://designpatternsphp.readthedocs.io/ja/latest/Structural/Adapter/README.html?highlight=Adapter