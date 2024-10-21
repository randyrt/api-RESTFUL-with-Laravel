# Introduction sur Laravel 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
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

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

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
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).






# API Documentation

## Installation et utilisation locale de l'API

### Prérequis
- PHP >= 8.x
- Composer
- MySQL (ou une autre base de données compatible)
- Git

### Étapes pour cloner et tester l'API

1. **[Cloner le projet depuis GitHub](#1-cloner-le-projet-depuis-github)**
2. **[Naviguer dans le répertoire du projet](#2-naviguer-dans-le-répertoire-du-projet)**
3. **[Installer les dépendances](#3-installer-les-dépendances)**
4. **[Configurer l'environnement](#4-configurer-lenvironnement)**
5. **[Générer une clé d'application](#5-générer-une-clé-dapplication)**
6. **[Démarrer le serveur local](#6-démarrer-le-serveur-local)**   
7. **[Exécuter les migrations de base de données](#7-exécuter-les-migrations-de-base-de-données)**


## Étapes pour l'installation de l'API			

### 1. Cloner le projet depuis GitHub

Pour cloner le projet, exécutez la commande suivante :
```bash
git clone https://github.com/ton-username/nom-du-projet.git
```

### 2. Naviguer dans le répertoire du projet
Ensuite, accédez au répertoire cloné avec la commande suivante :
```bash
cd nom-du-projet
```

### 3. Installer les dépendances
 Pour installer les dépendances, Vuillez tapez la commande suivante : 
 ```bash
composer install
```

### 4. Configurer l'environnement
Renommez le fichier .env.example en .env :
 ```bash
cp .env.example .env
```

### 5. Générer une clé d'application
```bash
php artisan key:generate
```

### 6. Démarrer le serveur local
```bash
php artisan serve
```

### 7. Exécuter les migrations de base de données
```bash
php artisan migrate 
php artisan db:seed
```

## Tester l'API

Pour tester cette API, vous pouvez utiliser des outils comme [Postman](https://www.postman.com/) ou [Insomnia](https://insomnia.rest/). Ces outils vous permettent d'envoyer des requêtes HTTP, de visualiser les réponses, et de gérer facilement les en-têtes et les paramètres d'authentification.

### Utilisation avec Postman ou Insomnia
 
### Étape 1 : Effectuer une requête GET pour l'inscription

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Méthode HTTP** : POST
3. **Entrez l'URL de l'API pour la connexion**.  ```bash http://localhost:8000/api/register  ```
4. **Ajoutez les en-têtes nécessaires** pour l'authentification et les informations utilisateur. Dans l'en-tête, vous pouvez inclure les informations suivantes en format JSON :
```json

{
    "name": "VotreNom",
    "email": "votre.email@example.com",
    "password": "VotreMotDePasse"
}
```

### Étape 2 : Obtention du Token : 
Pourquoi ? 
> Pour accéder aux endpoints protégés de l'API, vous devez d'abord faire une rêquette POST pour pouvoir obtenir un **Bearer Token** :

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Choisissez la méthode HTTP** : POST.
3. **Entrez l'URL de l'API pour la connexion**.  ```bash http://localhost:8000/api/login  ```

Body : 
   ```json
    {
        "email": "Votre email",
        "password": "Votre mot de passe"
    }
   ```

### Réponse de la requête de connexion
Après avoir envoyé la requête POST pour l'obtention de "Token", vous recevrez une réponse au format JSON. Voici un exemple de ce à quoi pourrait ressembler la réponse :

```json
{
    "status_code": 200,
    "status-message: "operation completed successfully",
    "success": true,
    "token": "{votre_token}"
}
```

### Étape 3 : Faire une autre requête avec le Bearer Token
Une fois que vous avez obtenu votre Bearer Token, vous devez effectuer une autre requête sur le même endpoint pour accéder aux ressources protégées. Voici comment procéder :

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Choisissez la méthode HTTP** : POST 
3. **Entrez l'URL de l'API pour le même endpoint** que précédemment : ```bash http://localhost:8000/api/login  ```

Remarque importante : L'opération est la même, mais cette fois-ci, vous devez inclure dans l'en tête du rêquete POST le Token d'autorisation. 
Voici un exemple de ce à quoi pourrait ressembler cela : 
En tête dans la section Authorization:
- Type : Bearer Token
- Token : "(Votre token)"
Body : 
 ```json
    {
        "email": "Votre email",
        "password": "Votre mot de passe"
    }
 ```

### Réponse de la requête avec le Bearer Token
Si tout se passe bien, après avoir envoyé votre requête avec le Bearer Token, vous recevrez une réponse au format JSON contenant les informations de l'utilisateur connecté. Voici un exemple de ce à quoi pourrait ressembler la réponse :
```json
{
    "status_code": 200,
    "status-message: "operation completed successfully",
    "success": true,
    "token": "{votre_token}"
}
```

### Étape 4 : Vérifier que vous êtes réellement connecté : 

1. **Créez une nouvelle requête** dans Postman ou Insomnia.
2. **Méthode HTTP** : GET
3. **Entrez l'URL de l'API : ```bash http://localhost:8000/api/protected ```
Si tout se passe bien, Voici un exemple de ce à quoi pourrait ressembler la réponse :
```json
{
    "status_code": 200,
    "success": true,
    "status-message: "you're connected",
    "user": {
       "id": "Votre id",
      "name": "Votre nom",
      "email": "Votre email"
   }
}
```


## Test du Premier Endpoint
### Vue d'ensemble de l'API

Cette API comporte deux endpoints majeurs pour la gestion de vos données :

1. **Endpoint Clients**
   - Utilisé pour gérer les données liées aux clients, comme la création, la mise à jour et la récupération d'informations sur les clients.
   - URL de base : `api/v1/api/customers`

2. **Endpoint Factures**
   - Utilisé pour gérer les factures, y compris la génération, la mise à jour et la récupération des enregistrements de factures.
   - URL de base : `api/v1/api/invoices`

Chaque endpoint offre des opérations spécifiques, et vous pouvez interagir avec eux en utilisant des méthodes HTTP telles que `GET`, `POST`, `PUT` et `DELETE`. Des instructions détaillées pour chaque endpoint sont fournies ci-dessous.

### Filtrer les rêquetes GET par ID : 
- `api/v1/api/customers/id`
- `api/v1/api/invoices/id`

### Requêtes Avancées :

L'API prend également en charge des requêtes avancées pour filtrer les données. Vous pouvez utiliser des opérateurs pour affiner les résultats selon vos besoins, tels que :

> `equal` : pour rechercher des valeurs égales à une certaine donnée.
> `greater_than` : pour rechercher des valeurs supérieures à un seuil donné.
> `less_than` : pour rechercher des valeurs inférieures à un seuil donné.
> `greater_than_equal` : rechercher des valeurs supérieures et égales à un seuil donné.
> `less_than_equal` : rechercher des valeurs inférieures et égales à un seuil donné.

#### Exemple d'utilisation 1 : 
- `api/v1/customers?type[equal]=company`
- `api/v1/invoices?status[equal]=Billed`

#### Exemple d'utilisation 2 : 
- `api/v1/customers?type[equal]=company`
- `api/v1/invoices?status[equal]=Billed&amount[greater_than]=350`
