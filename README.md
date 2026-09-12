# StockEase

StockEase es una aplicación web para gestionar el control de inventario, productos, proveedores, categorías, usuarios y ventas en una pequeña o mediana empresa. El sistema está diseñado para separar dos perfiles principales:

- **Administrador**: gestiona usuarios, productos, categorías, proveedores y visualiza ventas generales.
- **Vendedor**: registra ventas, consulta su historial y observa el inventario disponible.

## Funcionalidades principales

- Administración de productos con stock, precio y categoría.
- Registro de proveedores y categorías de productos.
- Administración de usuarios y perfiles de acceso.
- Dashboard administrativo con métricas de ventas, productos, proveedores y productos con stock bajo.
- Dashboard para vendedores con información de ventas del mes y productos con stock bajo.
- Registro de ventas con actualización automática del stock.
- Rutas protegidas según el rol de usuario.

## Tecnologías

- PHP 8.1+
- Laravel 10
- Composer
- MySQL
- Node.js y npm
- Vite
- Bootstrap / Tailwind

## Requisitos para ejecutar

Antes de iniciar el proyecto, asegúrate de tener instalado:

- PHP 8.1 o superior
- Composer
- Node.js 18 o superior
- npm
- MySQL o MariaDB
- Git

## Instalación

1. Clona el repositorio:

   ```bash
   git clone <url-del-repositorio>
   cd stockeasy
   ```

2. Instala las dependencias de PHP:

   ```bash
   composer install
   ```

3. Instala las dependencias de frontend:

   ```bash
   npm install
   ```

4. Copia el archivo de ejemplo de variables de entorno:

   ```bash
   copy .env.example .env
   ```

5. Configura la base de datos en el archivo `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3307
   DB_DATABASE=stockeasy
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Genera la clave de la aplicación:

   ```bash
   php artisan key:generate
   ```

7. Ejecuta las migraciones y seeders:

   ```bash
   php artisan migrate --seed
   ```

8. Compila los assets frontend:

   ```bash
   npm run build
   ```

9. Inicia el servidor local:

   ```bash
   php artisan serve
   ```

Luego abre la aplicación en:

http://127.0.0.1:8000

## Usuarios de prueba

El proyecto incluye usuarios de ejemplo configurados en los seeders:

- Admin: `admin@example.com`
- Vendedor: `vendedor@example.com`
- Contraseña para ambos: `password`

## Estructura principal

```text
app/                  Aplicación Laravel
resources/views/     Vistas Blade
resources/js/        Assets frontend
routes/web.php       Rutas web principales
public/               Archivos públicos
config/               Configuración de Laravel
```

## Comandos útiles

```bash
php artisan migrate
php artisan db:seed
php artisan serve
npm run dev
npm run build
```
## laragon link aqui
https://www.filepuma.com/es/download/laragon_7.0.6-45264/
## Licencia

Este proyecto se entrega como una aplicación de ejemplo para gestión de inventario y ventas.
