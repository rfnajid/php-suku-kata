# PHP Suku Kata
Sebuah library untuk melakukan pengolahan suku kata Bahasa Indonesia. 

## Fitur

- Ekstraksi Suku kata
- Ekstraksi Huruf Vokal/Konsonan

## Bisa Digunakan Untuk
- Mencari rima pada sebuah kata
- Membuat karya sastra generator (Puisi, Sajak, Pantun, dsb.)
- Pengolahan kata tingkat lanjut

## Install

Via Composer
>$ composer require rfnajid/sukukata

## Cara Penggunaan
### Ekstraksi Suku Kata
>SukuKataLib::getSukuKata($string)

param : string, kata yang ingin diekstrak sukukatanya
return : array of string, suku kata

### Ekstraksi Konsonan
>SukuKataLib::getKonsonan($string)

param : string, kata yang ingin diekstrak konsonannya
return : string, huruf konsonan saja

### Ekstraksi Vokal
>SukuKataLib::getVokal($string)

param : string, kata yang ingin diekstrak huruf vokalnya
return : string, huruf vokal saja

### Mengecek Huruf Vokal
apakah sebuah huruf termasuk huruf vokal?
>SukuKataLib::isVokal($string)

param : string, huruf yang ingin dicek
return : boolean, true / false

### Menghitung jumlah Suku kata
>SukuKataLib::countSukuKata($string)

param : string, kata yang ingin hitung jumlah suku katanya
return : int, jumlah suku kata

### Menghitung Jumlah Huruf Vokal
>SukuKataLib::countVokal($string)

param : string, kata yang ingin hitung jumlah huruf vokalnya
return : int, jumlah huruf vokal

### Menghitung Jumlah Huruf Konsonan
>SukuKataLib::countKonsonan($string)

param : string, kata yang ingin hitung jumlah huruf konsonannya
return : int, jumlah huruf konsonan

### Menghapus Karakter yang Bukan Huruf
>SukuKataLib::removeNonLetter($string)

param : string
return : string

### Konversi Strip/Dash (-) menjadi spasi
>SukuKataLib::convertDashToSpace($string)

param : string
return : string

## License

Software ini didistribusikan dibawah lisensi MIT, lihat file LICENSE untuk informasi lebih lanjut

## Contact
Jika kamu menemukan bugs/error atau cuma sekedar tanya-tanya silahkan menghubungi author di me@rfnaj.id