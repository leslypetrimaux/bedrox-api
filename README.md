# Bedrox API

```diff
- Mise à jour le 03/02/2019 par Leslie Petrimaux
+ Avancement des développement en cours sur feature/Core.
+ Changelog :
+           - Intégration des normes PSR. Refactorisation et corrections. (En cours)
+           - Gestion des erreurs SGBD {nom connexion hôte/user/pass/etc...} (En cours)
+           - Intégration du SGBD "MariaDB"/"Oracle". (En cours)
+           - Optimisation des traitements de l'EntityManager. (En cours)
```

## Développement

### En cours

> __feature/Core__ : Optimisation de la lecture des configurations & des traitements de retours *(JSON/XML)*. Intégration de nouveaux SGBD pour le traitement des entités *(MariaDB/Oracle)*. Ajout de nouveaux traitement en base de données. Optimisation des traitements via __EntityManager__. Refactorisation et corrections du code pour l'intégration des normes PSR.

## Installation

_Cette section n'a pas encore été rédigée. Le framework est en tout début de développement. Il faudra préparer un package pour composer pour la version 1.0._

## Configurations

### Environnement

Pour configurer l'environnement de l'application, il faut remplir le fichier `./environnement.xml` avec la synthaxe suivante :

```xml
<app>
    <name>%NOM_APPLICATION%</name> <!-- Nom de l'application -->
    <version>%VERSION_NUMBER%</version> <!-- Version de l'application -->
    <env>dev|prod</env> <!-- Environnement du serveur -->
    <database encode="sgbd_encode()">  <!-- Paramètre de la BDD (+encodage de caractères) -->
        <driver>sgbd()</driver> <!-- SGBD utilisé dans la liste ci-dessous -->
        <host>%DB_HOSTNAME%</host> <!-- Nom d'hôte/Adresse IP du serveur BDD -->
        <user>%DB_USER%</user> <!-- Nom d'utilisateur -->
        <password>%DB_PASS%</password> <!-- Mot de passe utilisateur -->
        <schema>%DB_SCHEMA%</schema> <!-- Schema/SSID/ServiceName -->
    </database>
    <encodage>app_encode()</encodage> <!-- Encode de caractères des retours de l'application -->
    <format>app_format()</format> <!-- Format de retour de l'application -->
    <router>%RELATIVE_PATH_TO_ROUTER_FILE_FROM_ROOT_PROJECT%</router> <!-- Chemin du fichier pour le Router -->
    <security>%RELATIVE_PATH_TO_SECURITY_FILE_FROM_ROOT_PROJECT%</security> <!-- Chemin du fichier pour la Sécurité -->
</app>
```

<details>
<summary>Tableau des valeurs des SGBD disponibles :</summary>

```php
sgbd() = array(
    [0] => 'mysql' // PDO MySQL
);
```

</details>

<details>
<summary>Tableau des valeurs d'encodage de caractères du SGBD :</summary>

```php
sgbd_encode() = array(
    [0] => 'utf8'
);
```

</details>

<details>
<summary>Tableau des valeurs d'encodage de caractères de l'application :</summary>

```php
app_encode() = array(
    [0] => 'utf-8'
);
```

</details>

<details>
<summary>Tableau des valeurs des formats de retour de l'application :</summary>

```php
app_format() = array(
    [0] => 'json'
    [1] => 'xml'
);
```

</details>

### Security

Afin de configurer le firewall, il faut référencer le fichier `security.xml` dans le fichier d'__environnement__ et le remplir de la manière suivante :

```xml
<security>
    <firewall type="app_auth()">
        <token encode="token_algos()"
            secret="%APP_SECRET%" /> <!-- No "&" char, return critical error -->
        <anonymous>
            <route>%ROUTE_NAME%</route>
        </anonymous>
    </firewall>
</security>
```

<details>
<summary>Tableau des valeurs du type de firewall disponibles :</summary>

```php
app_auth() = array(
    [0] => 'auth'
    [1] => 'no-auth'
);
```

</details>

<details>
<summary>Tableau des valeurs d'encodage du token disponibles :</summary>

```php
// Basé sur la fonction PHP hash_algos()
token_algos() = array(
    [0] => 'md2'
    [1] => 'md4'
    [2] => 'md5'
    [3] => 'sha1'
    [4] => 'sha224'
    [5] => 'sha256'
    [6] => 'sha384'
    [7] => 'sha512/224'
    [8] => 'sha512/256'
    [9] => 'sha512'
    [10] => 'sha3-224'
    [11] => 'sha3-256'
    [12] => 'sha3-384'
    [13] => 'sha3-512'
    [14] => 'ripemd128'
    [15] => 'ripemd160'
    [16] => 'ripemd256'
    [17] => 'ripemd320'
    [18] => 'whirlpool'
    [19] => 'tiger128,3'
    [20] => 'tiger160,3'
    [21] => 'tiger192,3'
    [22] => 'tiger128,4'
    [23] => 'tiger160,4'
    [24] => 'tiger192,4'
    [25] => 'snefru'
    [26] => 'snefru256'
    [27] => 'gost'
    [28] => 'gost-crypto'
    [29] => 'adler32'
    [30] => 'crc32'
    [31] => 'crc32b'
    [32] => 'fnv132'
    [33] => 'fnv1a32'
    [34] => 'fnv164'
    [35] => 'fnv1a64'
    [36] => 'joaat'
    [37] => 'haval128,3'
    [38] => 'haval160,3'
    [39] => 'haval192,3'
    [40] => 'haval224,3'
    [41] => 'haval256,3'
    [42] => 'haval128,4'
    [43] => 'haval160,4'
    [44] => 'haval192,4'
    [45] => 'haval224,4'
    [46] => 'haval256,4'
    [47] => 'haval128,5'
    [48] => 'haval160,5'
    [49] => 'haval192,5'
    [50] => 'haval224,5'
    [51] => 'haval256,5'
);
```

</details>

### Routes

Vous pouvez déclarer autant de route et de controller que vous le souhaitez. Afin de configurer une route, référencez le fichier `routes.xml` dans le fichier d'__environnement__. Vous pouvez le remplir de la manière suivante :

```xml
<routes>
    <!-- Route sans paramètre -->
    <route name="%ROUTE_NAME%"
        path="%ROUTE_PATH%"
        controller="%NAMESPACE_CLASSNAME%::%FUNCTION_NAME%"
        (render="app_format()") />
    <!-- Route avec paramètre(s) -->
    <route name="%ROUTE_NAME%"
        path="%ROUTE_PATH%{%PARAM%}"
        controller="%NAMESPACE_CLASSNAME%::%FUNCTION_NAME%"
        (render="app_format()") >
        <params>
            <entity /> <!-- entity AS %PARAM% -->
        </params>
    </route>
</routes>
```

# Exemple de configuration

`./environnement.xml`
```xml
<app>
    <name>Mon Application</name>
    <version>0.0.1</version>
    <env>dev</env>
    <database encode="utf8">
        <driver>mysql</driver>
        <host>localhost</host>
        <user>framework</user>
        <password>framework</password>
        <schema>framework</schema>
    </database>
    <encodage>utf-8</encodage>
    <format>json</format>
    <router>./routes.xml</router>
    <security>./security.xml</security>
</app>
```

`./security.xml`
```xml
<security>
    <firewall type="auth">
        <token encode="sha256"
            secret="!+rh$Cvd^R*c3c272-!TLV=#CcW#_Bg8" />
        <anonymous>
            <route>home</route>
        </anonymous>
    </firewall>
</security>
```

`./routes.xml`
```xml
<routes>
    <route name="home"
        path="/"
        controller="App\Controllers\DefaultController::default" />
    <route name="users_list"
        path="/users"
        controller="App\Controllers\DefaultController::list" />
    <route name="users_get"
        path="/users/get/{users}"
        controller="App\Controllers\DefaultController::card" >
        <params>
            <users />
        </params>
    </route>
</routes>
```

