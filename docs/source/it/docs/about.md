---
title: About Geo
description: About Geo
extends: _layouts.documentation
section: content
language: it
---

# About Geo {#about-geo}

Il modulo "module_geo" è un pacchetto per Laravel che fornisce funzionalità per la gestione delle informazioni geografiche all'interno di un'applicazione Laravel. Il modulo include metodi per gestire le informazioni geografiche, come le nazioni, le regioni, le città e gli indirizzi, nonché per utilizzare servizi di geocodifica per ottenere informazioni geografiche a partire da coordinate geografiche o indirizzi.

Per utilizzare il modulo, è necessario installarlo tramite Composer con il comando composer require laraxot/module_geo. Una volta installato, il modulo può essere utilizzato nell'applicazione Laravel tramite il seguente codice:

Copy code
use Laraxot\ModuleGeo\Facades\ModuleGeo;
Il modulo include diverse funzionalità per la gestione delle informazioni geografiche, come ad esempio il metodo getCountries() per recuperare tutte le nazioni, o il metodo getAddresses() per recuperare gli indirizzi salvati nel database.

Per utilizzare il modulo, è necessario prima configurare l'applicazione per supportare le funzionalità geografiche. La configurazione può essere eseguita tramite il comando Artisan php artisan geo:install, che creerà le tabelle del database necessarie per gestire le informazioni geografiche e importerà i dati di base per le nazioni, le regioni e le città. Inoltre, sarà necessario configurare l'accesso a un servizio di geocodifica per poter utilizzare le funzionalità di geocodifica del modulo.

Una volta configurato il modulo, è possibile utilizzarlo per gestire le informazioni geografiche, come ad esempio per recuperare le nazioni, le regioni e le città, o per geocodificare indirizzi o coordinate geografiche. Ad esempio, per geocodificare un indirizzo e recuperare le coordinate geografiche corrispondenti, è possibile utilizzare il seguente codice:

Copy code
$geocoder = ModuleGeo::getGeocoder();
$result = $geocoder->geocode('Via Roma, 1, Milano, Italia');

$latitude = $result->first()->getCoordinates()->getLatitude();
$longitude = $result->first()->getCoordinates()->getLongitude();

Il codice precedente utilizzerà il servizio di geocodifica configurato per geocodificare l'indirizzo "Via Roma, 1, Milano, Italia" e restituire le coordinate geografiche corrispondenti. In questo modo, è possibile utilizzare le funzionalità del modulo per gestire e utilizzare le informazioni geografiche all'interno dell'applicazione Laravel.

Per ulteriori informazioni su come utilizzare il modulo e su tutte le sue funzionalità, consultare la documentazione disponibile nel repository su GitHub.
