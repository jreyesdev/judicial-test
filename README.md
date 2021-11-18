# Poder Judicial Virtual

Prueba Laravel para Poder Judicial Virtual

# Requerimientos

Necesitas tener instalado **PHP, Composer y Nodejs**

# Instalación

Clonar repositorio.

## Variables de entorno

Crear un archivo `.env` en la raíz del proyecto y copiar el contenido del archivo `.env.example`

En el archivo `.env` agregar los datos de la base de datos.

```
...

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

...
```

## Instalar dependencias

Ejecutar los siguientes comandos para instalar dependencias de Laravel y Node

```
composer install

npm install

npm run dev
```

## Generar KEY

```
php artisan key:generate
```

## Migraciones

```
php artisan migrate
```

## Seeders

```
php artisan db:seed
```

# IMPORTANTE

Si estas en **Linux** debes dar permisos de escrituras a las capetas **Framework y Logs** que están ubicadas en el directorio **storage/**

```
chmod -R 777 storage/{framework,logs}
```
