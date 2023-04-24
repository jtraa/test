Om dit project te starten:
- Server opstarten: (bijvoorbeeld) php -S 127.0.0.1:8000
- Composer install voor de autoload.php
- /public/index.php is de route

Hier is de lijst met aannames die ik heb gemaakt om deze opdracht af te ronden:
- De codebase bevindt zich op een lokale machine en wordt uitgevoerd met behulp van PHP 8.0 of hoger en de ingebouwde webserver.
- De codebase volgt de PSR-4 standaard voor autoloading van klassen.
- De PHP DateTime klasse is beschikbaar en kan worden gebruikt om met datums en tijden te werken, beter dan Carbon omdat we die via Composer moeten inladen.
- De externe systeemklasse is niet geïmplementeerd en de methode om prijzen op te halen is een placeholder.
- De output van de applicatie is bedoeld om naar de standaard uitvoerstroom te gaan (d.w.z. de console) en niet naar een webpagina.    
