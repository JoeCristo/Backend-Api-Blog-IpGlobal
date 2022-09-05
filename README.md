# App Blog para IpGlobal

## Docker

### Instalación:

- `make build` para crear todos los contenedores
- `make start`
- `make ssh-be` para entrar en el contenedor php

### Contenido y desarrollo:

- NGINX 1.19
- PHP 8.0.1
- MySQL 8.0
- Aunque trabajo actualmente en entorno con Docker, no lo implementé yo. Así que he tenido algunos problemas con ello, como la configuración del nginx, o la creación de la BBDD con doctrine:database:create, por ejemplo.

## Api

### Instalación:

- `composer install`

### Contenido y desarrollo

- Url: http://localhost:1000. Ese es el puerto que está definido en el docker-compose.yml. Si estuviera siendo utilizado habría que cambiarlo tanto en ese archivo como en el front.

- Problemas para la instalación de symfony 6 con symfony/skeleton, así que la he dejado en la 5.4 para no perder mucho tiempo. En otras circunstancias hubiera seguido peleándome con ello!.

- Añadidos con composer los paquetes de doctrine, doctrine-enum-bundle, api-platform, phpunit, phpstan, php-cs-fixer, así como sus dependencias. También he añadido el bundle nelmio/cors-bundle, por porblemas de CORS entre la Api y el Front. Lo he configurado en el .env.

- He creado solo una entidad, Post. Le he añadido algunos campos, de los cuales, categoría y autor, en un entorno más real, serían tablas diferentes, con sus relaciones con el post.
  Pero por no complicarme y por falta de tiempo, he creado un Enum y un tipo Embeddable respectivamente.

- He añadido un Validator y un Servicio (muy tontos), que comprueba si un post existe con el mismo título, y de ser así no deja crear o editar dicho post. He decidido no meter la lógica que comprueba en el validator y sacarlo a un servicio, porque ese servicio lo podemos utilizar en cualquier otro sitio (esto, al ser solo un campo lo podría haber definido como 'unique', pero era por meter algo más para la prueba).
- Con los tests unitarios, no sabía muy bien que hacer. Ya que, al tener api-platform, y con la lógica que habéis pedido, tampoco podía hacer mucho más, o eso creo yo!. Pero he hecho alguno muy muy básico. Así como del servicio que comprueba si existe un post.

- Php-stan ejecutado con su maximo nivel.

- Php-cd-fixer ejecutado en modo symfony

- En cuanto Swagger/OpenAPI, api plaform ya lo ofrece. Así que no he tenido que hacer mucho más (aunque entiendo que hubiéraís preferido que lo hubiera hecho yo un poco más "a mano", pero de nuevo el tiempo en mi contra). Url: http://localhost:1000/api-docs.

- La api devuelve los datos en formato JSON. Algo tuve que tocar en configuración de api-platform para sacarlo como yo quería, no recuerdo ahora mismo el qué.

## Front

### Instalación:

- `npm install`

### Contenido y desarrollo

- Utilizo Angular 12.2.16. Es el framework que conozco de JS y que acostumbro a usar en mi actual empresa.

- `ng serve` para correr el proyecto y visualizarlo con el host http://localhost:4200.

- He aprovechado los componentes de otro proyectiyo personal que tenía por ahí. Solo he tenido que cambiar nombre y ajustar algunas cosas.

- Listado de posts, donde se puede ver un post (estas dos gestiones eran las que se pedían en la prueba), además de poder editar, elimiar, y crear uno nuevo. Con sus diferentes pantallas.

- Me hubiera gustado tener más tiempo para cambiar la forma de trabajar los formularios. En su día lo hice con los NgForm, pero lo más correcto y eficiente, además de con lo que trabajo actualmente, sería los Reactive Forms. También en cuanto a estructuración está un poco pobre, están los componentes todos en un directorio 'components', y es algo que no me gusta y que hubiera cambiado.
  Tampoco existe un 'modelo' para Post, si no que es una interfaz.

- Utilizo bootstrap.

- Se utiliza scss. Aunque, sinceramente, al reutilizar los componentes de otro proyecto, creo que no he llegado ni tocar estos archivos, así que no estará ni bien utilizado. Actualmente utilizo más .less, pero creo, no se si me equivoco, que es más o menos lo mismo salvo por algunas particularidades.
