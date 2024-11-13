# Dictionary API

<div align="center">
  <img src="https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white" alt="PHP Badge">
  <img src="https://img.shields.io/badge/postgres-%23316192.svg?style=for-the-badge&logo=postgresql&logoColor=white" alt="Postgres Badge">
  <img src="https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Badge">
  <img src="https://img.shields.io/badge/livewire-%234e56a6.svg?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire Badge">
</div>

## Descripción

**Dictionary API** es una API desarrollada en **Laravel** que permite acceder a un amplio diccionario de palabras en inglés. En el futuro, se añadirán otros idiomas para ampliar las posibilidades. Con esta API, puedes filtrar palabras por categorías, subcategorías y buscar términos específicos.

## Primeros pasos :memo:

Para comenzar a utilizar la API, consulta la **[documentación detallada](#)**, donde encontrarás guías y ejemplos sobre cómo implementar y utilizar los diferentes endpoints.

## Tecnologías Utilizadas

Este proyecto utiliza las siguientes tecnologías para su desarrollo:

- **PHP**: Un lenguaje de programación de uso general, especialmente adecuado para el desarrollo web.
- **Laravel**: Un framework de PHP para desarrollo de aplicaciones web con una sintaxis elegante y herramientas útiles.
- **Laravel Schema Rules**: Un paquete de Laravel que facilita la validación de esquemas de bases de datos.
- **Livewire**: Un framework de Laravel para construir interfaces dinámicas sin tener que escribir JavaScript.
- **Breeze**: Un paquete de Laravel que facilita la autenticación y la instalación rápida de las vistas predeterminadas.


## Instalación



1. clonacion de repositorio
   ```bash
   git clone git@github.com:jose-CR/dictionary-api.git
   
2. luego instalamos composer en la carpeta Glossary-API
   ```bash
   composer install
   
3. ahora hacemos la key
     ```bash
   php artisan key:generate
     
4. ya estando en el .env agregamos esto el 8000 al APP_URL por para que envie los correos de smtp en la misma aplicacion 
  - APP_URL=http://localhost::8000

5. ahora vamos a desargar breeze para poder hacer los test 
   ```bash
    composer require laravel/breeze --dev && php artisan breeze:install
   
6. en esta parte descartamos los cambios que hizo la instaacion de laravel breeze 

7. luego hacemos un migrate pero antes de esto configuramos antes a base de datos
   ```bash
    php artisan migrate:fresh && pa db:seed

# Creacin de usuario

 ## Ruta de Registro

1. La ruta `http://localhost:8000/register` existe, pero está deshabilitada por defecto. En lugar de acceder directamente a esta URL, puedes utilizar el siguiente comando para crear un nuevo usuario:
   ```bash
   php artisan user:new

2. Interfaz del Comando

Cuando ejecutes el comando, se abrirá una interfaz en la terminal donde podrás ingresar los datos necesarios para crear un usuario y si el usuario tiene algun problema tienes que hacer la conecion smtp que esta al pincipio de esta linea MAIL_MAILER=smtp y de ahi solo tienes qu verificar el correo via smtp y listo ya el usuario esta creado.
   
3. Acceso al Área Administrativa

Una vez que hayas creado el usuario, podrás acceder al área administrativa de la aplicación. Si no puedes acceder directamente, puedes usar la siguiente ruta para iniciar sesión:

http://localhost:8000/login

Si tienes problemas para acceder, puedes solicitar que se reenvíe el correo de activación a tu servidor smtp que utilices.
