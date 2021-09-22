# 概要
「建物の正面」という意味で窓口としての役割を果たす。
インターフェイスを埋め込むことで、クライアントとサブシステムを切り離し、複雑さを軽減する設計パターン
Aメソッドの後にBメソッドを呼ばないといけないといったメソッドやクラス同士の関係性のような複雑化しやすいものを、呼び出し元からは単純に見せてくれます。
```
Client (Facadeを唯一の窓口として必要な機能を呼び出す)
├── Facade (クラスA,B,CをDIする)
│   ├──ClassA
│   ├──ClassB
│   ...
│   └── ClassN
```
## テスト
docker-compose exec php composer test -- Facade/Tests


## 公式ドキュメント
https://designpatternsphp.readthedocs.io/ja/latest/Structural/Facade/README.html?highlight=Facade