<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


ManagementBank Laravel App Instructions

																					LARAVEL PROJECT “MANAGEMENT OF BANK”
 
Projekat “Upravljanje bankom” ili “Management Bank” je Laravel (verzija 8) projekat baziran na programskom jeziku PHP-u. 
Laravel projekat “Upravljanje bankom” je projekat predviđen za upravljanje sistemom rada u bankama uključujući sve elemente bankovnog sistema koji su međusobno povezani. 
Za izradu ovog Laravel projekta korištena su okruženja: 
	1. Visual Studio Code za definisanje osnovne logike zasnovane uglavnom na programskom jeziku PHP-u 
	2. MySQL Workbench za definisanje logike bazirane na programskom jeziku SQL-u (Structured Query Language-u) koji pruža mogućnosti definisanja različitih SQL upita (SQL Queries)  
Ovaj Laravel projekat je zasnovan na MVC (Model-View-Controller) patternu. 
Definisane tabele baze podataka “Management Bank” su: 
	1. Table bankemployees (Tabela zaposlenici banke) 
	2. Table bankemployeetypes (Tabela tipovi zaposlenika banke) 
	3. Table bankclients (Tabela klijenti banke) 
	4. Table issuedcards (Tabela izdate kartice) 
	5. Table accounts (Tabela računi) 
	6. Table transactions (Tabela transakcije) 
Sve gore navedene tabele – objekti baze podataka “Management Bank” su mapirane u ORM Laravel model. 

																					SPECIFIČNOSTI LARAVEL PROJEKTA “UPRAVLJANJE BANKOM”
								
1. Projekat posjeduje formu za logovanje (prijavu) zaposlenika banke. 
2. Prilikom uspješnog logovanja zaposlenika banke tipa administrator otvara se default-na stranica za prikazivanje liste zaposlenika banke, dok se prilikom uspješnog logovanja zaposlenika banke tipa korisnik otvara default-na    
   stranica za prikazivanje liste klijenata banke. 
3. Nakon uspješnog logovanja zaposlenika banke tipa administrator u navigacionom dijelu stranice za prikazivanje liste zaposlenika banke automatski su administratoru dostupni sljedeći linkovi: 
	- link za odjavu sa stranice (LOGOUT) 
	- link za prikazivanje liste zaposlenika banke (BANKEMPLOYEES) 
	- link za prikazivanje liste klijenata banke (BANKCLIENTS) 
	- link za prikazivanje liste izvršenih transakcija (TRANSACTIONS) 
4. Nakon uspješnog logovanja zaposlenika banke tipa korisnik u navigacionom dijelu stranice za prikazivanje liste klijenata banke su dostupni sljedeći linkovi: 
	- link za odjavu sa stranice (LOGOUT) 
	- link za prikazivanje liste klijenata banke (BANKCLIENTS) 
	- link za prikazivanje liste izvršenih transakcija (TRANSACTIONS) 
5. Prilikom kreiranja klijenata banke za svakog klijenta banke se automatski kreira njegov bankovni račun.  
6. Pored forme za kreiranje novih zaposlenika banke (CREATE BANKEMPLOYEES) projekat posjeduje i formu za izmjenu postojećih zaposlenika banke u bazi podataka (EDIT BANKEMPLOYEES), kao i formu za brisanje postojećih zaposlenika    
   banke (DELETE BANKEMPLOYEES). 
7. Uz posjedovanje forme za kreiranje novih klijenata banke (CREATE BANKCLIENTS) projekat sadrži i formu za izmjenu postojećih klijenata banke u bazi podataka (EDIT BANKCLIENTS), kao i formu za brisanje postojećih klijenata banke   
   (DELETE BANKCLIENTS). 
8. Projekat posjeduje logiku za definisanje sprječavanja (prevencije) podudarnosti korisničkih imena (usernames) prilikom kreiranja novih zaposlenika banke.  
9. Ovaj Laravel projekat sadrži i definisanu logiku za sprječavanje (prevenciju) podudarnosti JMBG-ova (Personal ID Numbers) prilikom kreiranja novih klijenata banke. 
10. Projekat posjeduje logiku za izvršavanje postojećih transakcija i u tu svrhu je definisana specifična forma za kreiranje transakcija odn. izvršavanje transakcija (CREATE TRANSACTIONS) koja je podijeljena na dva dijela:   
		- lijeva strana forme sastoji se od izabranog klijenta banke koji predstavlja platioca određenog iznosa sa svog bankovnog računa 
		- desna strana forme sastoji se od definisanog dropdown-a koji ima mogućnost biranja određenog klijenta banke koji predstavlja primaoca određenog iznosa na svoj bankovni račun 
11. Projekat je baziran na logici za sprječavanje (prevenciju) pristupa određenim stranicama upotrebom Middleware-a koji posjeduje definisanu logiku za preusmjeravanje nadolazećih ruta za pristup određenim stranicama na rutu za  
    logovanje (prijavu) zaposlenika banke što znači da nije moguć pristup nijednoj definisanoj stranici bez logovanja (prijave) zaposlenika banke.   
12. Za ovaj Laravel projekat odrađena je i logika za enkripciju (šifriranje) šifri (passwords) svih postojećih zaposlenika banke u bazi podataka u cilju zaštite povjerljivosti podataka.