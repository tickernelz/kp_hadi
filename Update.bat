@ECHO OFF
:BEGIN
SETLOCAL
ECHO --------------------------------
ECHO ## Sedang Memperbarui Project ##
ECHO --------------------------------
set BRANCH = "develop"
git checkout %BRANCH%
git fetch origin develop
git reset --hard FETCH_HEAD
git clean -df
git pull
php artisan migrate:fresh --seed
php artisan optimize:clear
composer update
ECHO --------------------
ECHO ## Update Selesai ##
ECHO --------------------
pause
:END
