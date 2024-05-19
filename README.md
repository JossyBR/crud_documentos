# Sistema creación de documentos

## Descripción

Aplicación para gestionar documentos, implementada en PHP utilizando Laravel y Vue.js para el frontend.

## Requisitos

-   PHP 8
-   MySQL
-   Composer
-   Node.js y NPM

## Instalación

1. Clonar el repositorio git clone https://github.com/JossyBR/crud_documentos.git
2. Ejecutar `composer install`
3. Configurar la base de datos en `.env`
4. Ejecutar `php artisan migrate --seed`
5. Ejecutar `npm install && npm run dev`
6. Levantar el servidor local con `php artisan serve`

### Configurar la Base de Datos

1. Crea una base de datos en MySQL llamada `crud_documentos`.
2. Configura el archivo `.env` con las credenciales de tu base de datos.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crud_documentos
    DB_USERNAME=tu_usuario_mysql
    DB_PASSWORD=tu_contraseña_mysql
    ```

3. Ejecuta las migraciones y seeders:

    ```
    php artisan migrate
    php artisan db:seed
    ```

### Instalar Dependencias

composer install
npm install
npm run dev

## Ejecución

Para iniciar la aplicación, ejecuta:
php artisan serve

-   Navegar a `http://localhost:8000` en tu navegador.

## Credencial de prueba

-   Usuario: `admin@gmail.com`
-   Contraseña: `admin12345`

## Tecnologías y Paquetes Utilizados

-   Laravel (Framework de PHP)
-   Laravel UI vue (Para la generación de la interfaz de autenticación)

## Diagramas
