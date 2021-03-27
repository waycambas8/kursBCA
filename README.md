# KURS BANK BCA

![GitHub Logo](https://www.bca.co.id/assets/images/logo-bca.gif;bcad93b5a3b4897622d)
![GitHub Logo_laravel](https://laravel.com/img/logotype.min.svg)

This package retrieves the kurs data from BCA Bank

Include 13 currency around the world to IDR Indonesia Rupiah
- Dollar America
- Dollar Singapore
- Euro
- Dollar Australia
- Kroner Denmark
- Kronor Swedia
- Dollar Canada
- Franc Swiss
- Dollar Islandia Baru
- Ponsterling Inggris
- Dollar Hong-Kong
- Riyal Arab Saudi
- Yuan China / Tiongkok

# How To install
To run this project, install it locally using composer:

```
$ composer require waycambas8/kursbca
$ composer update
```

# How to use 
There is some <b>YOUR_PARAMETER</b> that you must be entered when you want to call the class/function

- usd (Dollar America)
- sgd (Dollar Singapore- Euro)
- eur (Euro)
- aud (Dollar Australia)
- dkk (Kroner Denmark)
- sek (Kronor Swedia)
- cad (Dollar Canada)
- chf (Franc Swiss)
- nzd (Dollar Islandia Baru)
- gbp (Ponsterling Inggris)
- hkd (Dollar Hong-Kong)
- sar (Riyal Arab Saudi)
- cnh (Yuan China / Tiongkok)

next you have to call this class

```
\KursBca\ScrappyData
```

public function

```
kurs_bca(YOUR_PARAMETER)
```

# How to Intergrate with your Controller

open your controller, and put this code on your variable or using <b>use</b>

```
\KursBca\ScrappyData::kurs_bca(YOUR_PARAMATER)
```

Parameter <b>Must be array</b> and the name of <b>ARRAY</b> must be 'kode'

```
variable = array('kode' => 'usd')
```

# Example

take the exchange rate data from the American dollar (usd) to the Indonesian rupiah (idr)

```
YOUR_VARIABLE = array('kode' => 'usd')

\KursBca\ScrappyData::kurs_bca(YOUR_VARIABLE)
```

# Final 

the datas automatically updated when the kurs BCA has been changed


<b>update 0.0.2 will be done soon :)</b>
