# Laravel Login API REST

API REST simple para autenticación de usuarios con Laravel y Sanctum.

## Características

- ✅ Registro de usuarios
- ✅ Login con autenticación por tokens
- ✅ Logout (invalidación de tokens)
- ✅ Obtener usuario actual autenticado
- ✅ Validación de requests
- ✅ Respuestas JSON consistentes
- ✅ Autenticación con Laravel Sanctum

## Requisitos

- PHP >= 8.2
- Composer
- Base de datos (MySQL, PostgreSQL, SQLite, etc.)

## Instalación

1. Clonar el repositorio o navegar al directorio del proyecto

2. Instalar dependencias:
```bash
composer install
```

3. Copiar el archivo de configuración:
```bash
cp .env.example .env
```

4. Generar la clave de aplicación:
```bash
php artisan key:generate
```

5. Configurar la base de datos en el archivo `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña
```

6. Ejecutar las migraciones:
```bash
php artisan migrate
```

7. Publicar la configuración de Sanctum (si es necesario):
```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

8. Iniciar el servidor de desarrollo:
```bash
php artisan serve
```

El servidor estará disponible en `http://localhost:8000`

## Endpoints de la API

### 1. Registro de Usuario

**POST** `/api/register`

**Body:**
```json
{
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Respuesta exitosa (201):**
```json
{
    "status": true,
    "message": "Usuario registrado exitosamente",
    "data": {
        "user": {
            "id": 1,
            "name": "Juan Pérez",
            "email": "juan@example.com",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "updated_at": "2024-01-01T00:00:00.000000Z"
        },
        "token": "1|xxxxxxxxxxxx"
    }
}
```

### 2. Login

**POST** `/api/login`

**Body:**
```json
{
    "email": "juan@example.com",
    "password": "password123"
}
```

**Respuesta exitosa (200):**
```json
{
    "status": true,
    "message": "Login exitoso",
    "data": {
        "user": {
            "id": 1,
            "name": "Juan Pérez",
            "email": "juan@example.com",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "updated_at": "2024-01-01T00:00:00.000000Z"
        },
        "token": "2|xxxxxxxxxxxx"
    }
}
```

**Respuesta de error (401):**
```json
{
    "status": false,
    "message": "Credenciales incorrectas",
    "data": null
}
```

### 3. Logout

**POST** `/api/logout`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
    "status": true,
    "message": "Sesión cerrada exitosamente",
    "data": null
}
```

### 4. Usuario Actual

**GET** `/api/user`

**Headers:**
```
Authorization: Bearer {token}
```

**Respuesta exitosa (200):**
```json
{
    "status": true,
    "message": "Usuario obtenido exitosamente",
    "data": {
        "user": {
            "id": 1,
            "name": "Juan Pérez",
            "email": "juan@example.com",
            "created_at": "2024-01-01T00:00:00.000000Z",
            "updated_at": "2024-01-01T00:00:00.000000Z"
        }
    }
}
```

## Autenticación

Los endpoints protegidos (`/api/logout` y `/api/user`) requieren autenticación mediante un token Bearer.

Incluye el token en el header `Authorization` de todas las peticiones protegidas:

```
Authorization: Bearer {token}
```

El token se obtiene al hacer login o registro exitoso.

## Validaciones

### Registro
- `name`: Requerido, string, máximo 255 caracteres
- `email`: Requerido, email válido, único en la tabla users
- `password`: Requerido, mínimo 8 caracteres, debe coincidir con `password_confirmation`

### Login
- `email`: Requerido, email válido
- `password`: Requerido

## Estructura del Proyecto

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       └── AuthController.php    # Controlador de autenticación
│   └── Requests/
│       ├── LoginRequest.php          # Validación de login
│       └── RegisterRequest.php       # Validación de registro
├── Models/
│   └── User.php                      # Modelo de usuario (con HasApiTokens)
└── Traits/
    └── ApiResponse.php               # Trait para respuestas JSON consistentes
routes/
└── api.php                           # Rutas de la API
bootstrap/
└── app.php                           # Configuración de la aplicación
```

## Seguridad

- Las contraseñas se almacenan hasheadas usando bcrypt
- Los tokens se generan usando Laravel Sanctum
- Validación de datos en todos los endpoints
- Middleware de autenticación en rutas protegidas

## Ejemplo de Uso con cURL

### Registro:
```bash
curl -X POST http://localhost:8000/api/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

### Login:
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "juan@example.com",
    "password": "password123"
  }'
```

### Usuario Actual:
```bash
curl -X GET http://localhost:8000/api/user \
  -H "Authorization: Bearer {token}"
```

### Logout:
```bash
curl -X POST http://localhost:8000/api/logout \
  -H "Authorization: Bearer {token}"
```

## Licencia

Este proyecto está bajo la licencia MIT.
