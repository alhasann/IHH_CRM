# IHH_CRM

A modern Customer Relationship Management (CRM) system built with Laravel (backend) and React + TypeScript (frontend) in a monorepo architecture.

## 🚀 Tech Stack

### Backend
- **Laravel 12** - Latest stable PHP framework
- **PostgreSQL** - Primary database
- **Redis** - Cache and queue management
- **Laravel Sanctum** - SPA/API authentication
- **RBAC** - Role-based access control system

### Frontend
- **Vite** - Modern build tool
- **React 18** - UI library
- **TypeScript** - Type safety
- **TailwindCSS** - Utility-first CSS framework
- **React Router** - Client-side routing
- **Axios** - HTTP client

## 📋 Prerequisites

### Windows 10/11
- **PHP 8.3+** - Download from [php.net](https://windows.php.net/download/)
- **Composer** - Download from [getcomposer.org](https://getcomposer.org/download/)
- **Node.js 20+** - Download from [nodejs.org](https://nodejs.org/)
- **Docker Desktop** - Download from [docker.com](https://www.docker.com/products/docker-desktop/)

### Linux (Ubuntu/Debian)
```bash
# PHP 8.3
sudo apt update
sudo apt install -y php8.3 php8.3-cli php8.3-common php8.3-mbstring php8.3-xml php8.3-pgsql php8.3-redis php8.3-curl

# Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js 20
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Docker
sudo apt install -y docker.io docker-compose-v2
sudo systemctl enable --now docker
sudo usermod -aG docker $USER
```

## 🛠️ Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/alhasann/IHH_CRM.git
cd IHH_CRM
```

### 2. Start Docker Services (PostgreSQL + Redis)
```bash
# Start services in background
docker compose up -d

# Verify services are running
docker compose ps
```

### 3. Backend Setup

```bash
cd backend

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# Seed database with admin user and roles
php artisan db:seed

# Start Laravel development server (port 8000)
php artisan serve
```

**Default Admin Credentials:**
- Email: `admin@ihhcrm.local`
- Password: `Admin@123456`

### 4. Frontend Setup

```bash
cd frontend

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Start Vite development server (port 5173)
npm run dev
```

## 🌐 Access the Application

- **Frontend:** http://localhost:5173
- **Backend API:** http://localhost:8000/api
- **Health Check:** http://localhost:8000/api/health

## 🧪 Running Tests

### Backend Tests
```bash
cd backend
php artisan test
```

### Frontend Build Test
```bash
cd frontend
npm run build
```

### Code Quality (Backend)
```bash
cd backend
./vendor/bin/pint
```

### Code Quality (Frontend)
```bash
cd frontend
npm run lint
```

## 📁 Project Structure

```
IHH_CRM/
├── backend/               # Laravel API
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/
│   │   │   └── Traits/
│   │   └── Models/
│   ├── config/
│   ├── database/
│   │   ├── migrations/
│   │   └── seeders/
│   ├── routes/
│   │   └── api.php
│   └── .env.example
│
├── frontend/              # React + TypeScript SPA
│   ├── src/
│   │   ├── components/
│   │   │   └── layout/
│   │   ├── pages/
│   │   │   ├── auth/
│   │   │   ├── dashboard/
│   │   │   ├── files/
│   │   │   ├── messages/
│   │   │   ├── tasks/
│   │   │   ├── meetings/
│   │   │   └── settings/
│   │   ├── services/
│   │   ├── types/
│   │   └── utils/
│   └── .env.example
│
├── .github/
│   └── workflows/         # CI/CD pipelines
├── docker-compose.yml     # PostgreSQL + Redis
├── .editorconfig
├── .gitattributes
├── .gitignore
└── README.md
```

## 🔐 API Endpoints

### Health
- `GET /api/health` - System health check

### Authentication (Sanctum)
- `POST /api/auth/login` - User login
- `POST /api/auth/logout` - User logout
- `GET /api/auth/me` - Get authenticated user

## 🎨 Frontend Pages

- **Dashboard** - Overview and statistics
- **Files** - File management module (placeholder)
- **Messages** - Messaging system (placeholder)
- **Tasks** - Task management (placeholder)
- **Meetings** - Meeting scheduler (placeholder)
- **Settings** - Application settings (placeholder)

## 🔄 Development Workflow

1. Start Docker services: `docker compose up -d`
2. Backend: `cd backend && php artisan serve`
3. Frontend: `cd frontend && npm run dev`
4. Access: http://localhost:5173

## 🚨 Troubleshooting

### Docker Issues
```bash
# Stop all services
docker compose down

# Remove volumes and restart
docker compose down -v
docker compose up -d
```

### Backend Issues
```bash
# Clear Laravel cache
cd backend
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

### Database Connection
Ensure Docker PostgreSQL is running:
```bash
docker compose ps
# Should show postgres container as "running"
```

### Frontend Build Issues
```bash
cd frontend
rm -rf node_modules package-lock.json
npm install
```

## 📝 Environment Variables

### Backend (.env)
- `DB_CONNECTION=pgsql`
- `DB_HOST=localhost`
- `DB_PORT=5432`
- `DB_DATABASE=ihh_crm`
- `DB_USERNAME=ihh_user`
- `DB_PASSWORD=ihh_password`
- `REDIS_HOST=localhost`
- `REDIS_PORT=6379`
- `FRONTEND_URL=http://localhost:5173`

### Frontend (.env)
- `VITE_API_URL=http://localhost:8000/api`
- `VITE_API_BASE_URL=http://localhost:8000`

## 🤝 Contributing

1. Create a feature branch
2. Make your changes
3. Run tests and linters
4. Submit a pull request

## 📄 License

This project is proprietary software for IHH.

## 🆘 Support

For issues and questions, please open an issue on GitHub.
 
