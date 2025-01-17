### 1. Vereisten
Zorg ervoor dat de volgende software geïnstalleerd is:

- PHP >= 8.0
- Composer
- MySQL (of een andere database zoals SQLite of PostgreSQL)
- Laravel >= 9.x

### 2. Installeer het project
Volg de onderstaande stappen om het project te installeren en in te stellen:

1. **Clone het project**:

   git clone <repository_url>

2. **Navigeer naar de projectmap**:
   cd <backend_portfolio>


3. **Installeer de afhankelijkheden met Composer**:

   composer install

### 3. Configuratie

1. **Maak een kopie van het `.env.example` bestand en noem het `.env`**:
   cp .env.example .env

2. **Stel de database-instellingen in het `.env` bestand in**:

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=backend
   DB_USERNAME=root
   DB_PASSWORD=PikaVolt2005


### 4. Migraties en Seeders

1. **Voer de migraties uit**:
   Dit maakt de benodigde tabellen aan in de database.

   php artisan migrate


2. **Voer de seeders uit om testgegevens in te voeren**:

   php artisan db:seed


### 5. Start de Laravel Server

php artisan serve

Bezoek [http://localhost:8000](http://localhost:8000) in je browser.

### 6. Gebruikers en Admin Toegang

- **Testgebruiker**:
  - E-mail: `user@ehb.com`
  - Wachtwoord: `password`

- **Admingebruiker**:
  - E-mail: `admin@ehb.be`
  - Wachtwoord: `Password!321`

Na inloggen kan de admin nieuws en activiteiten beheren, evenals gebruikersprofielen.

### 7. Routes en Functionaliteit

De applicatie bevat de volgende routes en functionaliteiten:

- **Dashboard**: Toegankelijk voor alle ingelogde gebruikers.
- **Nieuws**: Gebruikers kunnen nieuwsitems bekijken. Alleen admins kunnen nieuws toevoegen of verwijderen.
- **Activiteiten**: Gebruikers kunnen activiteiten bekijken en, indien ingelogd, nieuwe activiteiten aanmaken.
- **Profiel**: Gebruikers kunnen hun profiel bewerken, inclusief hun geboortedatum en andere gegevens.

### 8. Standaard Functies

- **Nieuwsitems**: Gebruikers kunnen nieuwsitems bekijken en toevoegen.
- **Activiteiten**: Gebruikers kunnen activiteiten bekijken en toevoegen.
- **Profielpagina**: Gebruikers kunnen hun profiel bewerken, waaronder hun naam en e-mailadres.

### 9. Belangrijke Bestanden

- **`routes/web.php`**: Bevat de routeconfiguratie van de applicatie.
- **`app/Models`**: Bevat de modelbestanden voor gebruikers, nieuwsitems, activiteiten, etc.
- **`resources/views`**: Bevat de weergaven voor de front-end van de applicatie.

### 10. Bronvermeldingen


https://www.youtube.com/watch?v=bvi37IbJXS4 
 
https://chatgpt.com (wegens photo's kan ik de chat niet delen)

Mailtrap.io 
