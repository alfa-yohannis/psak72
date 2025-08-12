# PSAK72  
An App for Calculating PSAK72 (Revenue Recognition) with Laravel & SQL Server

## 📦 Requirements
- Docker & Docker Compose
- PHP 8.2+ (jika menjalankan Laravel di host)
- Composer
- SQLSRV / PDO_SQLSRV PHP extension (jika konek ke SQL Server dari host)
- Node.js + npm (jika ada asset frontend)

## 🚀 Getting Started

### 1. Run SQL Server with Docker
#### Option A: Quick Run
Under directory `App`, execute these commands:

```bash
docker run -e "ACCEPT_EULA=Y" \
  -e "MSSQL_SA_PASSWORD=Abcd123!" \
  -p 1433:1433 \
  --name sql1 \
  --hostname sql1 \
  -d mcr.microsoft.com/mssql/server:2022-latest
```

#### Option B: With Persistent Volume
```bash
docker volume create mssql-data
docker run -e "ACCEPT_EULA=Y" \
  -e "MSSQL_SA_PASSWORD=Abcd123!" \
  -p 1433:1433 \
  -v mssql-data:/var/opt/mssql \
  --name sql1 \
  --hostname sql1 \
  -d mcr.microsoft.com/mssql/server:2022-latest
```

#### Create Database
```bash
sudo docker exec -it sql1 /opt/mssql-tools18/bin/sqlcmd \
  -S localhost -U sa -P 'Abcd123!' -C \
  -Q "CREATE DATABASE psak72"
```

### 2. Install Project Dependencies
# Install PHP dependencies
```bash
composer install
```

# Install Node.js dependencies (if package.json exists)
```bash
npm install
```

# Generate Laravel application key
```bash
php artisan key:generate
```

# Clear and cache configuration
```bash
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan view:clear
```

### 3. Run Migrations & Seeder
```bash
php artisan migrate:fresh --seed
```

### 4. Verify Database
#### Using DBeaver or Other Client
1. New Connection → SQL Server.
2. Host: localhost (or Docker service name)
3. Port: 1433
4. Database: psak72
5. User: sa
6. Password: Abcd123!
7. Driver properties:
   - encrypt = true
   - trustServerCertificate = true
8. Test Connection → Finish.

#### Sample Query
```SQL
SELECT TOP 10 * FROM STOK;
```

## 🛠 Troubleshooting
- Login failed for user `sa` → Password too weak or wrong. Restart container and try again.
- Foreign key error during migrate → Check migration order or split FK into a separate migration.
- Cannot connect from Laravel container → Use `DB_HOST=mssql` (Docker service name), not `127.0.0.1`.
- Port conflict → Change mapping `-p 1433:1433` to `-p 11433:1433` and update .env.

## 📄 License
MIT
