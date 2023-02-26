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
 - Data rozpoczęcia realizacji
 - Data końca realizacji
 - Wartość umowy
 - Koszty planowane
 - Etapy realizacji (planowana data rozpoczęcia i zakończenia prac)

Firma w ramach umowy ponosi koszty, głównie koszt sprzętu i serwis od jego producenta. Suma poszczególnych kosztów to realne koszty umowy.

### Przykład: Instalacja i realizacja sieci SIP.

Wartość umowy:      150 000 zł
Planowane koszty:   100 000 zł
Planowana marża:     50 000 zł

Data rozpoczęcia projektu:  1 stycznia 2023
Data zakończenia projektu: 30 stycznia 2023

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

# Umowy długo-terminowe
Realozowanie usługi przez dłuższy czas, na przykład regularne dostawy maretiałów albo usługi serwisowe.
Określane są:
 - Osoba odpowiedzialna (opiekun handlowy)
 - Data podpisania umowy
 - Data wygaśnięcia umowy
 - Okres rozliczeniowy (dzienny czy miesięczny)

Sposób gromadzenia kosztów jest zależny od natury usługi. Generalnie jednak, co miesiąc jest naliczany stały koszt w postaci opłaty serwisowej. Jeśli serwis wymagał kupna elementów dla klienta, to do następnej faktury można doliczyć koszt tych elementów.

Opiekun handlowy może być poinformowany przez aplikację o niedługim wygaśnięciu umowy, tak aby mógł on wynegocjować z klientem jej przedłużenie.

### Przykład, serwis telefonów SIP

Data początku światczenia usług: 1 stycznia 2023
Koniec świadczenia usług: 1 stycznia 2024
Okres rozliczeniowy: miesiąc
Podstawowa kwota naliczana co miesiąc (*podstawowy koszt*): 5 000 zł

Koszty poniesione miesięcznie:
 - Podstawowa opłata serwisowa: 5 000 zł
 
Miesięcza wartość faktury dla klienta: __5 000 zł__

W sierpniu uszkodził się jeden telefon i trzeba było kupić nowy za 1 000 zł

Koszty poniesione w miesiącu:
 - Podstawowa opłata serwisowa: 5 000 zł
 - Nowy telefon SIP:            1 000 zł

Wartość faktury dla klienta w sierpniu: __6 000 zł__
