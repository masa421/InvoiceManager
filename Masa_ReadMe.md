Masa_ReadMe.md

Invoice Manager の開発 Read me

プロジェクトのフォルダ
C:\xampp\htdocs\InvoiceManager

ディレクトリにおいて
C:\xampp\php\php.exe artisan serve

現在の方法
1. xamppを起動し、Apache, MySQLをスタートさせる。
2. http://invoicemanager.test/ にアクセスする


アカウント：
accounts@dflat.com.au
U6Zax3_Mm+LN!sCH

masa.naoh421@gmail.com
rfiw3nMZ9FuJDKz

これらは Refresh しても自動で再作成される。

http://invoicemanager.test/

過去に使ってた方法
1. xamppを起動し、Apache, MySQLをスタートさせる。
2. PowerShellを起動する。
3. cd C:\xampp\htdocs\InvoiceManager
4. php artisan serve
5. http://127.0.0.1:8000/

## Storageに保存したファイルが見られなかった。

本来の使われ方として、

/storage/app/public フォルダを

public/storage のシンボリックリンクで作成する。

つまり public/storage にアクセスすると、/storage/app/public フォルダが参照される
ようにするのが、

php artisan storage:link 

コマンドなわけだ。ところが、このプロジェクトではもってきたときから、
/public/storage の実フォルダが存在してしまった。
なのでこのフォルダを消して、

php artisan storage:link 

を走ったところ解決した。
