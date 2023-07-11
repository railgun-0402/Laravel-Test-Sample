# laravel_test_sample
## Laravelでテストコードを記載するための入門用ブランチ

### 試験用クラスの作成
```
php artisan make:test XXX[クラス名]
```
何らかのテストコードを実装

### 試験コード

```
// URL「XXX」へのアクセス
get('/XXX')
```

```
// 文字列「YYY」の存在確認
get('/XXX')->assertSee('YYY');
```
など。。

### 参考文献
https://qiita.com/niisan-tokyo/items/264d4e8584ed58536bf4#%E3%83%88%E3%83%83%E3%83%97%E3%83%9A%E3%83%BC%E3%82%B8%E3%81%AE%E3%83%86%E3%82%B9%E3%83%88%E3%82%92%E8%BF%BD%E5%8A%A0%E3%81%99%E3%82%8B

以上
