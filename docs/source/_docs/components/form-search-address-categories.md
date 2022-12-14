---
title: Form Search Address Categories
description: Form Search Address Categories
extends: _layouts.documentation
section: content
path: it/docs/components
---

# Form Search Address Categories {#form-search-address-categories}

Richiama a sua volta un componente livewire (quindi in "real-time") per cercare un indirizzo usando le API di Google Maps

Nome Componente:
```php
x-form-search-address-categories
```

Non richiede parametri

E' necessario utilizzare l'API Key di Google Maps, che va impostata in:

```php
config('services.google.maps_key')
```

cioè nel file:

```console
config/services.php
```

Esempio:

```php
<x-form-search-address-categories>

</x-form-search-address-categories>
```

Per altre informazioni leggere documentazione sulle [API di Google Maps](https://developers.google.com/maps/documentation/javascript/overview).