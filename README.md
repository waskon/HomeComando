# WSTĘP DO PROJEKTOWANIA APLIKACJI INTERNETOWYCH

## Projekt - Aplikacja HomeComando

Informatyka | Wydział Informatyki i Telekomunikacji | WDPAI | 4 rok studiów 

## Spis Treści
- [Opis aplikacji](#opis-aplikacji)
- [Wykorzystywane technologie](#wykorzystywane-technologie)
- [Uruchomienie aplikacji](#uruchomienie-aplikacji)
- [Funkcjonalności](#funkcjonalności)
- [Użytkowanie aplikacji](#użytkowanie-aplikacji)
- [Kontakt](#kontakt)

## Opis aplikacji
Aplikacja “Home Comando” jest aplikacją do przeglądania oraz promowania ogłoszeń sprzedaży nieruchomości.
Aplikacja ta jest oparta o konta użytkowników, którzy mają możliwość przeglądania oraz udostępniania ofert na platformie.
Po zarejestrowaniu się i zalogowaniu na platformie, użytkownik będzie miał możliwość przeglądania ofert innych użytkowników poprzez wyszukiwanie po ich nazwach oraz filtrowanie na podstawie cen, metrażu itp.

## Wykorzystywane technologie
- Docker (konteneryzacja)
- NGINX (serwer)
- html/css
- PHP 
- JavaScript

## Uruchomienie aplikacji
1. Instalacja Dockera
2. Pobranie repozytorium oraz otwarcie katalogu głównego
3. Aktywacja komendy w terminalu:
```
docker-compose up --build
```
4. Wpisanie w pasek przeglądarki adresu:
> http://localhost:8080/

## Funkcjonalności
- Zawiera mechanizm szyfrowania haseł za pomocą funkcji hashującej
- Pozwala na przeglądanie ogłoszeń w głównym widoku ("mainPage")
  * umożliwia wyszukiwanie ogłoszeń po tytule lub zawartości opisu
  * umożliwia filtrowanie ogłoszeń po atrybutach (t.j. rodzaju nieruchomości, maksymalnej cenie oraz minimalnej powierzchni)
- Pozwala na przeglądanie wyodrębnionych ogłoszeń użytkownika zalogowanego w widoku "myEstates"
- Pozwala na dodawanie ogłoszeń nieruchomości widocznych dla wszystkich użytkowników
- Pozwala na podgląd danych użytkownika w widoku "My data"

## Użytkowanie aplikacji

### Rejestracja
Aby rozpocząć korzystanie z HomeComando należy utworzyć konto użytkownika. 
W tym celu należy kliknąć przycisk "Sign in" w panelu logowania.
W następnym kroku należy wypełnić formularz i zatwierdzić przyciskiem "Sign in".
Użytkownik zostaje przekierowany na stronę logowania z wyświetleniem informacji o poprawnej rejestracji.
![image](https://github.com/waskon/HomeComando/assets/79586520/6c33110a-5644-49f4-9624-ad187f2eb22d)

### Logowanie
Aby się zalogować należy podać adres email zatwierdzony przy rejestracji oraz hasło.
Poprawne logowanie skutkuje przekierowaniem do strony "mainPage".
Przy nie udanej próbie logowania zostanie wyświetlona informacja o błędnym adresie email lub nie poprawnym haśle.
![image](https://github.com/waskon/HomeComando/assets/79586520/2e23de18-d199-4e13-8841-ab21a93b1280)

### Weryfikacja 2-etapowa
Aby się zalogować należy podać tajny klucz generowany przez Google Authenticator co 30sek.
![image](https://github.com/waskon/HomeComando/assets/79586520/cfc13d59-9ec1-4ca3-88b4-f8fe57264fed)

### Strona główna
Strona główna wyświetla listę ogłoszeń nieruchomości ze zdjęciem, opisem, informacjami o cenie oraz powierzchni nieruchomości.
Dodatkowo umożliwia filtrowanie ogłoszeń po ich atrybutach (rodzaj, maksymalna cena oraz minimalny metraż)
Przycisk "add announcement" pozwala na dodanie nowego ogłoszenia.
![image](https://github.com/waskon/HomeComando/assets/79586520/aa8c5c54-7a4b-499a-a0c0-87d2c77a1e15)

### Pasek nawigacji
Pasek nawigacji pozwala na sprawne poruszanie się po aplikacji, dzięki czemu możemy przechodzić do interesujących nas widoków lub wylogować się z aplikacji.

### Dodawanie nowego ogłoszenia
W widoku "addNotice" pojawia się formularz, który wymaga uzupełnienia danymi koniecznymi do utworzenia ogłoszenia w bazie danych.
![image](https://github.com/waskon/HomeComando/assets/79586520/7789c10e-046a-4dbb-8a7d-4f80f45ddcea)

### Pojedyncze Ogłoszenie
Po kliknięciu w tytuł wybranego ogłoszenia, użytkownik zostaje przekierowany do widoku "announcementDetails", który wyświetla zdjęcie oraz wszystkie informacje dotyczące danego ogłoszenia.
![image](https://github.com/waskon/HomeComando/assets/79586520/bb0f8037-da9f-45c4-a873-4aad7959ad6e)

### Dane profilowe
Widok "myData" wyświetla dane użytkownika, które podał przy rejestracji.
Docelowo planowane jest też wprowadzenie funkcjonalności zmiany hasła.

![image](https://github.com/waskon/HomeComando/assets/79586520/40498e62-218d-4ed5-91bf-129fff74e47b)

## Kontakt
Autor: Konrad Wąs

Email: 22konradwas22@gmail.com

Github: https://github.com/waskon

