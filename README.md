# EMWORK Project

## 📌 About This Project

This project is built using **Laravel 11** and provides a simple transaction management system with authentication, user management, and a temple information page.

---

## ⚡ Installation Guide

Follow these steps to set up the project locally:

### 1️⃣ **Clone the Repository**

```sh
git clone https://github.com/paspriten/test_emwork.git
cd test_emwork
```

### 2️⃣ **Install Dependencies**

```sh
composer install
npm install && npm run build
```

### 3️⃣ **Setup Environment**

Copy the `.env.example` file to `.env` and update your database credentials.

```sh
cp .env.example .env
```

Then update these fields in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=emwork_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ **Generate Application Key**

```sh
php artisan key:generate
```

### 5️⃣ **Run Database Migration & Seed**

```sh
php artisan migrate --seed
```

This will create the necessary database tables and seed the default admin user:

- **Email:** `admin@emwork.com`
- **Password:** `password`

### 6️⃣ **Start the Development Server**

```sh
php artisan serve
```

The project will be available at [**http://127.0.0.1:8000**](http://127.0.0.1:8000)

---

## 🔑 Default Login Credentials

| Role  | Email                                        | Password |
| ----- | -------------------------------------------- | -------- |
| Admin | [admin@emwork.com](mailto\:admin@emwork.com) | password |

---

## 📌 API Endpoints

### **🔹 Transactions**

| Method | Endpoint                  | Description                   |
| ------ | ------------------------- | ----------------------------- |
| GET    | `/transactions`           | View all transactions         |
| GET    | `/transactions/create`    | Create a new transaction form |
| POST   | `/transactions`           | Store a new transaction       |
| GET    | `/transactions/{id}/edit` | Edit a transaction            |
| PUT    | `/transactions/{id}`      | Update a transaction          |
| DELETE | `/transactions/{id}`      | Delete a transaction          |
| GET    | `/transactions/report`    | View transaction report       |

### **🔹 Temple Information**

| Method | Endpoint  | Description               |
| ------ | --------- | ------------------------- |
| GET    | `/temple` | View temple carousel page |

---

## 🛠 Development Commands

### **Run Laravel Queues (If needed)**

```sh
php artisan queue:work
```

### **Clear Cache & Config**

```sh
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### **Run Tests**

```sh
php artisan test
```

---

## 🎯 Contributing

If you'd like to contribute, feel free to fork the repository and submit a pull request!

---

## 📜 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

