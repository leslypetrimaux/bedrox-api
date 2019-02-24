# Bedrox API

## Installation

_Cette section n'est pas encore complète. Le framework est en tout début de développement._

Pour installer le projet et utiliser le framework, utiliser la commande composer :
```
composer create-project bedrox/bedrox-api mon_projet
```

## Configurations

### Environnement

Pour configurer l'environnement de l'application, il faut remplir le fichier `./config/env.yaml` avec la synthaxe suivante :

```yaml
app:
  name: '%APP_NAME%'
  version: '%APP_VERSION%'
  env: 'dev'
  database:
    ### Voir les exemples pour les différents SGBD
  encodage: 'app_encode()'
  format: 'app_format()'
  router: '%RELATIVE_PATH_TO_ROUTER_FILE_FROM_ROOT_PROJECT%'
  security: '%RELATIVE_PATH_TO_SECURITY_FILE_FROM_ROOT_PROJECT%'
```

<details>
<summary>Tableau des valeurs des SGBD disponibles :</summary>

```php
sgbd() = array(
    [0] => 'mysql' // PDO MySQL
    [1] => 'mariadb' // PDO MySQL
    [2] => 'firebase' // Firebase Realtime Database
    [3] => 'firestore' // Firebase Cloud Firestore
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

Afin de configurer le firewall, il faut référencer le fichier `./config/security.yaml` dans le fichier d'__environnement__ et le remplir de la manière suivante :

```yaml
security:
  firewall:
    type: 'app_auth()'
    token:
      encode: 'token_algos()'
      secret: '%APP_SECRET%'
    anonymous:
      %ROUTE_NAME%
      %ROUTE_NAME%
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

Vous pouvez déclarer autant de route et de controller que vous le souhaitez. Afin de configurer une route, référencez le fichier `./config/routes.yaml` dans le fichier d'__environnement__. Vous pouvez le remplir de la manière suivante :

```yaml
%ROUTE_NAME%:
  path: '%ROUTE_PATH%'
  controller: '%NAMESPACE\CLASSNAME%::%FUNCTION_NAME%'

%ROUTE_NAME%:
  path: '%ROUTE_PATH%{%PARAM%}'
  controller: '%NAMESPACE\CLASSNAME%::%FUNCTION_NAME%'
  params:
    %PARAM%
```

# Exemple de configuration

`./environnement.xml`

> Configuration avec MySQL ou MariaDB :
```yaml
app:
  name: 'Mon Application'
  version: '0.1.6'
  env: 'dev'
  database:
    driver: 'mariadb'
    host: 'localhost'
    port: '3306'
    user: 'framework'
    password: 'framework'
    schema: 'framework'
  encodage: 'utf-8'
  format: 'json'
  router: './routes.yaml'
  security: './security.yaml'
```

> Configuration avec Firebase Realtime Database :
```yaml
app:
  name: 'Mon Application'
  version: '0.1.6'
  env: 'dev'
  database:
    driver: 'firestore'
    host: 'projectId'
    apiKey: 'apiKey'
    clientId: 'clientId'
    oAuthToken: 'googleCloudOAuthToken'
    type: 'public'
  encodage: 'utf-8'
  format: 'json'
  router: './routes.yaml'
  security: './security.yaml'
```
```diff
- ATTENTION ! Pour le moment, seuls les bases accessibles en lecture/écriture public sur Firebase fonctionnent. L'authentification Firebase n'est pas encore supportée.
```

`./security.xml`
```yaml
security:
  firewall:
    type: 'auth'
    token:
      encode: 'sha256'
      secret: '!+rh$Cvd^R*c3c272-!TLV=#CcW#_Bg8'
    anonymous:
      home
```

`./routes.xml`
```yaml
home:
  path: '/'
  controller: 'App\Controllers\DefaultController::default'

users_list:
  path: '/users'
  controller: 'App\Controllers\DefaultController::list'

users_get:
  path: '/users/get/{users}'
  controller: 'App\Controllers\DefaultController::card'
  params:
    users
```

