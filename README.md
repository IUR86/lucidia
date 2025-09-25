# lucidia

概要。概要。概要。概要。概要。概要。概要。概要。概要。概要。  
概要。概要。概要。概要。概要。概要。概要。概要。概要。概要。

---

## 🚀 デモ / URL
- 本番環境: [xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx](xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx)  
- ステージング: [xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx](xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx)  

---

## 🛠️ 使用技術
- フロントエンド: HTML / CSS / JavaScript / SCSS
- バックエンド: PHP / Laravel
- データベース: MySQL
- インフラ: AWS / Docker

---

## 📂 ディレクトリ構成

```
/
├── docker/                       # Docker 関連設定ファイル群
│   ├── amazon-linux/             # amazon-linux 設定
│   └── mysql/                    # MYSQL設定
│
├── shell/                        # シェルスクリプト群
│   └── etc
│
├── src/                          # アプリケーション本体
│   ├── public/                   # Web 公開用ドキュメントルート
│   │   ├── index.php
│   │   └── assets/
│   │       ├── css/
│   │       ├── js/
│   │       └── images/
│   ├── app/                      # アプリケーションの主要ロジック
│   │   ├── Controllers/
│   │   ├── Models/
│   │   ├── Views/
│   │   └── Services/             # ビジネスロジック等
│   ├── config/                   # 設定ファイル（DB, キャッシュ, 認証 等）
│   ├── routes/                   # ルーティング定義
│   ├── database/                 # マイグレーション / Seeder 等
│   └── tests/                    # 単体テスト / 結合テスト
│
├── .gitignore                    # Git で無視するファイル / ディレクトリ設定
├── Makefile                      # 開発用タスクの自動化定義
├── docker-compose.yml            # 複数コンテナ構成の定義
└── README.md                     # このリポジトリ説明ファイル
```