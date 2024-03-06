<h1 align="center"> AsanaSynergy</h1>
<p align="center"> Desarrollado por: </p>
<p align="center">
   <img src="https://i.postimg.cc/GmZqhrCS/ABMODEL.jpg"/>
</p>

## Tabla de contenidos

- [Tabla de contenidos](#tabla-de-contenidos)
- [Descripción y contexto](#descripción-y-contexto)
  - [AsanaSynergy: Elevando la Experiencia de Yoga a Nuevas Alturas](#asanasynergy-elevando-la-experiencia-de-yoga-a-nuevas-alturas)
- [Funcionalidad](#funcionalidad)
  - [Características Destacadas](#características-destacadas)
- [Acceso al Proyecto sin necesidad del código](#acceso-al-proyecto-sin-necesidad-del-código)
- [Proceso de Ejecución haciendo uso del repositorio versiones 1 y 2](#proceso-de-ejecución-haciendo-uso-del-repositorio-versiones-1-y-2)
- [Proceso de Ejecución haciendo uso del repositorio version 3](#proceso-de-ejecución-haciendo-uso-del-repositorio-version-3)
- [Autores](#autores)
- [Información adicional](#información-adicional)
  - [ABMODEL empresa de desarrollo en crecimiento](#abmodel-empresa-de-desarrollo-en-crecimiento)

## Descripción y contexto

### AsanaSynergy: Elevando la Experiencia de Yoga a Nuevas Alturas

Bienvenido a AsanaSynergy, tu puente entre el mundo diverso de las posturas de yoga y la armonía de la comprensión multilingüe. Nuestra plataforma está diseñada para los amantes del yoga y los practicantes que desean explorar la riqueza de las posturas en español, inglés y sánscrito, ofreciendo una experiencia completa y enriquecedora.

AsanaSynergy no es solo una plataforma de traducción, es un portal que te invita a explorar, comprender y conectar con la esencia de cada postura. Únete a nosotros mientras llevamos tu experiencia de yoga a nuevas alturas, donde la sinergia de los idiomas se encuentra con la armonía del cuerpo y la mente. ¡Namaste!

## Funcionalidad

### Características Destacadas

1. **Traducción Tri-Idiomática:**
   Explora las posturas de yoga con facilidad en español, inglés y sánscrito. AsanaSynergy te proporciona la información completa en los tres idiomas, permitiéndote sumergirte completamente en la esencia de cada postura.

2. **Visualización Clara y Concisa:**
   Sumérgete en la experiencia visual con representaciones detalladas de cada postura. AsanaSynergy no solo te ofrece el nombre de la postura en los tres idiomas, sino que también te brinda una representación gráfica para una comprensión más profunda.

3. **Morfemas Sánscritos:**
   Descubre la raíz de cada postura explorando los morfemas sánscritos que la componen. AsanaSynergy te proporciona un conocimiento más profundo al desglosar la estructura lingüística de cada postura en su forma original.

4. **Navegación Intuitiva:**
   Nuestra interfaz fácil de usar garantiza que puedas encontrar la postura que buscas de manera rápida y eficiente. Explora categorías, niveles de dificultad o simplemente busca por nombre, ¡AsanaSynergy te guiará en tu viaje de descubrimiento!

## Acceso al Proyecto sin necesidad del código

AsanaSynergy: [https://asanasinergy.online/](https://asanasinergy.online/)

## Proceso de Ejecución haciendo uso del repositorio versiones 1 y 2

1. Descarga e instala XAMPP en tu máquina.
2. Clona o descarga el repositorio del proyecto.
3. Extrae todos los archivos de la carpeta versión-1 y muévelos a la carpeta 'htdocs' de tu directorio XAMPP. (No los ingreses en una carpeta extra, solo copialos directamente en htdocs)
4. Inicia Apache y MySQL en el panel de control de XAMPP.
5. Abre tu navegador web y escribe 'localhost/phpmyadmin'.
6. En la página de phpMyAdmin, crea una nueva base de datos desde el panel izquierdo y nómbrala como 'diccionario'.
7. Importa el archivo 'diccionario.sql' ubicado en la carpeta 'database' dentro de la base de datos recién creada y haz clic en OK.
8. Abre una nueva pestaña y escribe 'localhost' en la URL de tu navegador.
9. ¡Listo! Eso es todo.

## Proceso de Ejecución haciendo uso del repositorio version 3

1. **Clonar el Repositorio del Proyecto en Laravel**:
   - Abre una terminal o consola de comandos.
   - Clona el repositorio haciendo uso del comando
      ```
      git clone
      ```

2. **Instalar las Dependencias del Proyecto**:
   - En caso de que no tengas instalado "COMPOSER" instalalo desde su página oficial.
   - Navega hasta el directorio de tu proyecto clonado (hasta el directorio asanasynergy).
   - Ejecuta el siguiente comando para instalar las dependencias de PHP con Composer:
     ```
     composer install
     ```
     Si es necesario, también puedes usar `composer update` en lugar de `composer install`.

3. **Generar el Archivo `.env`**:
   - El archivo `.env` está excluido del repositorio por razones de seguridad.
   - Para generar uno nuevo, utiliza el archivo `.env.example` como plantilla:
     ```
     cp .env.example .env
     ```

4. **Generar la Clave de Aplicación (APP_KEY)**:
   - La clave de aplicación es necesaria para que Laravel funcione correctamente.
   - Ejecuta el siguiente comando en la terminal:
     ```
     php artisan key:generate
     ```
     Esto agregará una nueva clave al archivo `.env`.

5. **Crear la Base de Datos**:
   - Si tu proyecto en Laravel utiliza una base de datos, crea una nueva base de datos.
   - Abre la consola de MySQL con el siguiente comando:
     ```
     mysql -u root -p
     ```
   - Crea la base de datos con el nombre deseado:
     ```
     CREATE DATABASE nombreDeTuDBAqui CHARACTER SET utf8 COLLATE utf8_spanish_ci;
     ```
   - Para salir de la consola de MySQL, escribe `exit` y presiona Enter.

6. **Agregar Variables Globales al Archivo `.env`**:
   - En el archivo `.env`, se guardan las variables globales necesarias para que tu proyecto funcione sin errores.
   - Asegúrate de incluir todas las variables requeridas, como las credenciales de bases de datos, API keys, etc.

7. **Ejecutar el proyecto**:
	- Ejecuta el siguiente comando 
	
     ```
     php artisan serve
     ```
¡Listo! Siguiendo estos pasos, podrás clonar un proyecto de Laravel desde GitHub y ejecutarlo con Composer. ¡Buena suerte! 🚀.

## Autores

| [<img src="https://i.postimg.cc/G29HqXq0/image-2023-12-08-224726114.png" width=115><br><sub>Nardy Cachipuendo</sub>](https://github.com/desnes) |  [<img src="https://i.postimg.cc/DwHfd180/image-2023-12-08-224926109.png" width=115><br><sub>Joel Delgado</sub>](https://github.com/JoelDelgado246) | [<img src="https://i.postimg.cc/gJ5PdsdP/Sebastian.jpg" width=115><br><sub>Sebastian Moyano</sub>](https://github.com/WSebastianML) |  [<img src="https://avatars.githubusercontent.com/u/151577243?v=4" width=115><br><sub>Cristofer Paucar</sub>](https://github.com/Cristof10) |  [<img src="https://i.postimg.cc/4d8p3KFG/image-2023-12-08-224641740.png" width=115><br><sub>Nathaly Simba</sub>](https://github.com/Nathaly07) 
| :---: | :---: | :---: | :---: | :---: |

## Información adicional

### ABMODEL empresa de desarrollo en crecimiento

ABMODEL es una empresa por jovenes aspirantes a ingenieros en software que buscan ofrecer servicios de desarrollo. Nuestras fronteras estan abiertas a proyectos de cualquier tipo y asesoria en la gestion de proyectos.
