<?php

/*

  Zadatak

  Definisati funkciju: isJMBGValid - koja proverava da li je JMBG validan.
  Funkcija za parametre ima $jmbg u kojem se nalazi JMBG koji treba da se proveri
  Funkcija treba da vrati boolean, odnosno true ako je JMBG ispravan ili false ako je neispravan.

  JMBG se sastoji iz 13 brojeva, neka su ti brojevi oznaceni sa:

  ABCDEFGHIJKLM

  AB - je dan rodjenja sa nulom na primer: 01, 03, 21, 11 itd
  CD - je mesec rodjenja sa nulom na primer: 02, 11, 12 itd

  EFG - su poslednje 3 cifre od godine rodjenja na prmer: 984, 000, 001 ...

  HI - su dve cifre koje odredjuju opstinu, to su bilo koje dve cifre bez pravila...

  JKL - su tri cifre koje odredjuju pol ali takodje mogu da budu bilo koje cifre bez pravila

  M - je kontrolni broj koji se izracunava po sledecoj formuli:

  Prvo se izracuna M11 = 11 - ((7*(A+G) + 6*(B+H) + 5*(C+I) + 4*(D+J) + 3*(E+K) + 2*(F+L)) % 11)
  Ako je M11 vece od 9 onda je M = 0
  A ako je M11 manje ili jednako 9 onda je M = M11
 */

/* * ******* DEFINICIJA FUNKCIJA *********** */
/**
 * Funkcija ispituje validnost unetog stringa. Da bi string bio validan, mora da ispuni sledece uslove :
 * -da sadrzi tacno 13 karaktera
 * -da prvih sedam karaktera predstavljaju realne datume 
 * -da poslednji karatkter stringa bude ispisan u zavisnosti od rezultata M11 koji se izracunava po sledecoj formuli :
 *      -M11 = 11 - ((7*(A+G) + 6*(B+H) + 5*(C+I) + 4*(D+J) + 3*(E+K) + 2*(F+L)) % 11) , gde  'ABCDEFGHIJKLM' predstavlja
 *       vrednost stringa (A - prvi karakter, B - drugi karakter, itd..)
 * 
 * @param type string
 * @return boolean
 */
function isJMBGvalid($jmbg) {
    if (strlen($jmbg) != 13) {
        return false;
    } elseif (substr($jmbg, 0, 2) > 31 || substr($jmbg, 0, 2) <= 0) {
        return false;
    } elseif (substr($jmbg, 2, 2) == 2 && substr($jmbg, 0, 2) > 29) {
        return false;
    } elseif (substr($jmbg, 4, 3) % 4 != 0 && substr($jmbg, 2, 2) == 2 && substr($jmbg, 0, 2) > 28) {
        return false;
    } elseif (substr($jmbg, 2, 2) > 12 || substr($jmbg, 2, 2) <= 0) {
        return false;
    } elseif ((substr($jmbg, 2, 2) == 4 || substr($jmbg, 2, 2) == 6 || substr($jmbg, 2, 2) == 9 || substr($jmbg, 2, 2) == 11) && substr($jmbg, 0, 2) > 30) {
        return false;
    } elseif (substr($jmbg, 4, 3) > 999 || substr($jmbg, 2, 2) < 0) {
        return false;
    } elseif (11 - ((7 * (substr($jmbg, 0, 1) + substr($jmbg, 6, 1)) + 6 * (substr($jmbg, 1, 1) + substr($jmbg, 7, 1)) + 5 * (substr($jmbg, 2, 1) + substr($jmbg, 8, 1)) + 4 * (substr($jmbg, 3, 1) + substr($jmbg, 9, 1)) + 3 * (substr($jmbg, 4, 1) + substr($jmbg, 10, 1)) + 2 * (substr($jmbg, 5, 1) + substr($jmbg, 11, 1))) % 11) > 9 && substr($jmbg, 12, 1) != 0) {
        return false;
    } elseif (11 - ((7 * (substr($jmbg, 0, 1) + substr($jmbg, 6, 1)) + 6 * (substr($jmbg, 1, 1) + substr($jmbg, 7, 1)) + 5 * (substr($jmbg, 2, 1) + substr($jmbg, 8, 1)) + 4 * (substr($jmbg, 3, 1) + substr($jmbg, 9, 1)) + 3 * (substr($jmbg, 4, 1) + substr($jmbg, 10, 1)) + 2 * (substr($jmbg, 5, 1) + substr($jmbg, 11, 1))) % 11) < 9 &&
            11 - ((7 * (substr($jmbg, 0, 1) + substr($jmbg, 6, 1)) + 6 * (substr($jmbg, 1, 1) + substr($jmbg, 7, 1)) + 5 * (substr($jmbg, 2, 1) + substr($jmbg, 8, 1)) + 4 * (substr($jmbg, 3, 1) + substr($jmbg, 9, 1)) + 3 * (substr($jmbg, 4, 1) + substr($jmbg, 10, 1)) + 2 * (substr($jmbg, 5, 1) + substr($jmbg, 11, 1))) % 11) != substr($jmbg, 12, 1)) {
        return false;
    } else {
        return true;
    }
}

//ovde definisati i DOKUMENTOVATI funkciju

/* * ******* DEFINICIJA FUNKCIJA *********** */


//Ulazni parametri

$jmbg = '2702983783912';
$m = 11 - ((7 * (substr($jmbg, 0, 1) + substr($jmbg, 6, 1)) + 6 * (substr($jmbg, 1, 1) + substr($jmbg, 7, 1)) + 5 * (substr($jmbg, 2, 1) + substr($jmbg, 8, 1)) + 4 * (substr($jmbg, 3, 1) + substr($jmbg, 9, 1)) + 3 * (substr($jmbg, 4, 1) + substr($jmbg, 10, 1)) + 2 * (substr($jmbg, 5, 1) + substr($jmbg, 11, 1))) % 11);


//Ulazni parametri
//print_r(substr($jmbg, 0, 1));
//echo '<br>';
//print_r(substr($jmbg, 1, 1));
echo ' <br> Dan: ';
print_r(substr($jmbg, 0, 2));
echo '<br> Mesec: ';
print_r(substr($jmbg, 2, 2));
echo '<br> Godina: ';
print_r(substr($jmbg, 4, 3));
echo '<br> M: ';
print_r(substr($jmbg, 12, 1));
echo '<br>';
echo '<br> M11 :';
print_r($m);
echo '<br>';


  
if (!isJMBGValid($jmbg)) {
    echo "Navedeni jmbg " . $jmbg . " je neispravan!";
} else {
    echo "Navedeni jmbg " . $jmbg . " je ispravan!";
}