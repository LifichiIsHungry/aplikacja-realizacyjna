# Po co?
Aplikacja ma służyć do zarządzania projektami/umowami w firmach świadczących jakieś usługi. Umową może być:

 * Regularna dostawa pieczywa do sklepów, które mają podpisaną umowę z piekarnią (umowa długo-terminowa, z fakturami wystawianymi codziennie za dostawę lub pod koniec miesiąca rozliczeniowego, jako jedna faktura za dostarczone wypieki z okresu miesiąca),
 * Jednorazowa usługa zainstalowania systemu kamer w budynku (umowa jednorazowa, koszty są szacowane na początku umowy, dostawy sprzętu i realizacja mogą być podzielone na kilka mniejszych płatności i suma wartości tych płatności to koszty realne)

# Ogólny zarys
Firma posiada klientów. Klienci są identyfikowani danymi:
 - Nazwa firmy
 - NIP
 - Adres siedziby
 - Osoba kontaktowa (Imię, Nazwisko, Stanowisko, Telefon, E-mail)

Z klientami są podpisywane umowy:
 - Jednorazowe
 - Długo-terminowe

# Umowy jednorazowe
Realizowany jest ustalony wcześniej przedział obowiązków, bez okresowego wystawiania faktur. 
Ustalane są takie rzeczy jak:
 - Osoba odpowiedzialna (kierownik projektu)
 - Data podpisania umowy
 - Wartość umowy
 - Koszty planowane
 - Etapy realizacji (planowana data rozpoczęcia i zakończenia prac)

Firma w ramach umowy ponosi koszty, głównie koszt sprzętu i serwis od jego producenta. Suma poszczególnych kosztów to realne koszty umowy.

### Przykład: Instalacja i realizacja sieci SIP.

Wartość umowy:      150 000 zł
Planowane koszty:   100 000 zł

Etapy projektu:
 - Zamówienie i dostawa elementów:  start:  1 stycznia 2023, koniec:  7 stycznia 2023 (6 dni)
 - Konfirugracja telefonów:         start:  8 stycznia 2023, koniec: 15 stycznia 2023 (7 dni)
 - Montarz telefonów:               start: 16 stycznia 2023, koniec: 30 stycznia 2023 (14 dni)

### Realizacja

Realna realizacja etapów projektu:
 - Zamówienie i dostawa elementów: start:  1 stycznia 2023, koniec:  9 stycznia 2023 (poślizg o 2 dni: 9 dni)
 - Konfiguracja telefonów:         start: 10 stycznia 2023, koniec: 15 stycznia 2023 (udało się szybciej: 5 dni)
 - Montarz telefonów:              start: 16 stycznia 2023, koniec:  2 lutego 2023   (naprawianie usterek: 17 dni) 

Firma w trakcie realizacji poniosła koszty w ramach realizacji projektu:
 - Telefony SIP VoiceProSkater x100:    110 000 zł (telefony podrożały o 100 zł po podpisaniu umowy)
 - Okablowanie Rj45:                      2 000 zł
 - Kary umowne za nieterminowe wyk.:      3 000 zł

Koszty realne: 115 000 zł
Realna marża:  150 000 zł - 115 000 zł = __35 000 zł__

