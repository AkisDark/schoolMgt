@Echo Off
C:\xampp\mysql\bin\mysql -u root < create_db.sql
php artisan migrate:fresh --seed
for %%a in (D DO DON DONE DONE!!) do (
cls
echo %%a
)
PAUSE
