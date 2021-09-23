# 概要
 Iteratorインターフェイスを実装したオブジェクトによる反復処理
 「iteratorオブジェクト」は集約オブジェクトを列挙する方法を記述するため(current,key,next,rewind,validメソッド)、クライアントは集約オブジェクトのデータ構造を知らなくても使い方だけ知って入れば良い。

## テスト
docker-compose exec php composer test -- Iterator/Tests


## 公式ドキュメント
https://designpatternsphp.readthedocs.io/ja/latest/Behavioral/Iterator/README.html?highlight=iterator
