## Projekt zaliczeniowy z laboratorium "Programowanie aplikacji internetowych"

## Tematyka projektu: Strona blog o Lublinie (Lublin blog)

## Autor: Michał Banaszek

## Funkcjonalności:
- rejestracja, logowanie i uwierzytelnianie
- dodawanie, edycja i usuwanie własnych opinii jako użytkownik bez uprawnień admina
- dodawanie, edycja i usuwanie wszystkich opinii jako admin 
- dodawanie, edycja i usuwanie postów wraz z plikiem zdjęciowym jako admin

## Narzędzia i technologie:
- strona serwera: Laravel
- baza danych: MySQL (XAMPP)
- strona klienta: Vite, Laravel Blade, TailwindCSS, Bootstrap5, PostCSS

## Wymagania

Wersje programów wykorzystane do tworzenia aplikacji (aplikacja nie została przetestowana z kompatybilnością wsteczną):
- XAMPP (MySQL Database, Apache Web Server)
- PHP 8.4.1
- Composer 2.6.6
- Laravel Framework 11.37.0
- Bootstrap 5
- PostCSS 8.4.47
- Node 20.12.0

## Uruchomienie
1. Wypakować pliki z folderu zip
2. Folder projektowy `lublin-website` otworzyć w wybranym IDE(np. VisualStudioCode, PHPStorm)
3. W folderze projektu, w terminalu wpisać `npm install` w celu instalacji zaleznosci `node_modules`
4. W folderze projektu, w terminalu wpisać `composer install` w celu instalacji zaleznosci `vendor`
5. Włączyć XAMPP MySQL Database oraz Apache Web Server
6. Migracja bazy danych: `php artisan migrate` (w celu utworzenia bazy danych wybrać opcję: `Would you like to create it? yes`)
7. Wypełnienie bazy przykładowymi danymi: `php artisan db:seed`
8. Uruchomienie serwera poprzez wpisanie komendy: `php artisan serve`
9. Uruchomienie aplikacji w przeglądarce pod adresem: `localhost:8000`

## Uwagi
1. W przypadku kiedy nie wyświetlają się zdjęcia, zalecane jest wykonanie komendy w terminalu IDE: `php artisan storage:link` w celu zlinkowania storage/app/public z public/storage
2. W przypadku wystąpienia błędów związanych ze sterownikiem bazy danych/ obsługą PDO itp. należy otworzyć plik php.ini i odkomentować wszystkie niezbędne rozszerzenia: mysqli, pdo_mysql
3. W przypadku wystąpienia innych błędów związanych z plikiem konfiguracyjnym php.ini należy prowadzić działania zgodne z instrukcjami i kodami błędów w terminalu (np. w IDE). 
4. Projekt dostępny jest również na profilu: **[GITHUB](https://github.com/M1keEm/lublin-website)**

## Konta testowe
-   **Admin**
    -   Login: admin
    -   Hasło: adminadmin
-   **User(is_admin=0)**
    -   Login: mike3
    -   Hasło: mikemike
