<p align="center">
	Desarrollado en Laravel por Brayan Angarita
	
</p>

<p align="center">
	<img src="https://laravel.com/assets/img/components/logo-laravel.svg">
</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre el proyecto

Esta es una simulación de memoria dinámica con 64 bytes para RAM y 64 bytes para Virtual, donde se guardan los primeros 64 bytes en RAM y los siguientes 64 en memoria virtual.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## ¿Cómo instalar Laravel en el PC?

Esta es la [documentación](https://laravel.com/docs) oficial. Encontrarás los requisitos para ejecutar este proyecto en tu servidor, aunque por comodidad te recomiendo usar [laragon](https://laragon.org/download) y descargar la versión Full (130 MB).

- Acceder a la raíz del servidor local  **(C:\laragon\www)**
- Abrir la consola y digitar ```git clone https://github.com/BrayanAngaritaR/memory.git```
- Dentro de la consola digitar ``` cd memoria ``` ó ``` cd memory ``` 
- Digitar ```composer install``` (Esto instalará las diferentes dependencias utilizadas en Laravel y en este proyecto)
- Digitar ```cp .env.example .env``` (Esto hará que las variables de entorno sean diferentes)
- Finalmente digitar ```php artisan key:generate``` (Esto hará que la aplicación tenga una clave única)

The Laravel framework es software de código abierto licenciado bajo [MIT license](https://opensource.org/licenses/MIT).
