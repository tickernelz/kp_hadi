@ECHO OFF
:BEGIN
SETLOCAL
ECHO --------------------------------
ECHO ## Sedang Memperbarui Project ##
ECHO --------------------------------
set BRANCH = "develop"
git checkout %BRANCH%
git stash --include-untracked
git reset --hard
git clean -fd
git pull
php artisan migrate:fresh --seed
php artisan optimize:clear
composer update
ECHO --------------------
ECHO ## Update Selesai ##
ECHO --------------------
pause
:END
