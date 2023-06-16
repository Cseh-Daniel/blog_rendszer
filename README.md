
# Blog rendszer

A repo klónozása után, a projekt gyökérkönytárában, parancssorból futtassuk le a következő parancsokat:

- composer install 
- php artisan migrate:fresh --seed
- php artisan serve
A regisztráció mellett 1 alapértelmezett felhasználót kapunk, valamint több előre generáltat is.

Az alap felhasználó belépésének adatai:
- e-mail: pelda@user.com
- jelszó: password

A project a "blogRendszer" nevű adatbázisban tárolja az adatokat.

Vendég felhasználók a bejegyzéseket csak olvasni tudják, azok létrehozásához, szerkesztéséhez, törléséhez, valamint címkék létrehozásához és törléséhez is bejelentkezett felhasználó kell.


