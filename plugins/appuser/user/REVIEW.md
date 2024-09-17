# REVIEW

## General
Celkovo logiku máš fajn, aj routes.php, väčšina vecí čo spomínam sú len moje recommendations alebo tips
Admin Area si pozri čo píšem a oprav, inak super :DD

## Admin Area a OctoberCMS Controlleri
Tvoj Admin Area nefunguje pretože v appuser/user/controllers ti chýba niekoľko vecí
Boli by dosť otravne kebyže toto všetko čo tam nemáš musíš tvoriť ručne, a preto sa to skôr robí cez commandy (pozri nižšie)
Odporúčam premazať čo teraz máš v appuser/user/controllers a spraviť to na novo cez commandy

## Controlleri a Modeli
Celkovo keď sa pozriem na tvoje modely a controllery tak sú také 'prázdne', prepokladám že si ich celé vytváral manuálne.
Určite odporúčam vytvárať cez
php artisan create:controller
php artisan create:model