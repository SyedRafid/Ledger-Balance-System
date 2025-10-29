# 💰 Mini Accounting Ledger System (Laravel)

A simplified **Accounting Ledger System** built with **Laravel**, designed to record financial transactions (debits & credits), maintain real-time balances, and generate ledger reports.

> 🧠 Developed as part of a technical assessment for a Laravel Developer position.

---

## 🚀 Features

✅ Account Management  
✅ Transaction Management (Debit / Credit)  
✅ Automatic Balance Updates  
✅ Ledger Service Class for Business Logic  
✅ Ledger Facade for Clean Syntax  
✅ API-Ready Endpoints (Tested with Thunder Client)  
✅ Bonus: Ledger Report Endpoint (Total Debit, Credit, Balance)  
✅ Clean Code, MVC Structure, and Laravel Service Container used  

---

## 🏗️ Tech Stack

- **Framework:** Laravel (Latest Version)
- **Language:** PHP 8+
- **Database:** MySQL
- **Tools:** XAMPP / phpMyAdmin
- **Version Control:** Git / GitHub
- **API Testing:** Thunder Client / Postman

---

## ⚙️ Setup Instructions

### 1️⃣ Clone Repository
```bash
git clone https://github.com/yourusername/Ledger-Balance-System.git
cd Ledger-Balance-System
```
### 2️⃣ Install Dependencies
```bash
composer install
```
### 3️⃣ Configure .env
```bash
cp .env.example .env
```
### 4️⃣ Generate Key
```bash
php artisan key:generate
```
### 5️⃣ Run Migrations & Seeders
```bash
php artisan migrate --seed
```
💾 This will automatically create:

Two default accounts: Cash and Bank

### 6️⃣ Serve Application
```bash
php artisan serve
```

## 📘 API Endpoints

All routes are under /api/.

### 🧾 ACCOUNTS
#### ➕ Create Account

POST /api/accounts

json
Body:
```bash
{
  "name": "Main Bank",
  "accountType": "Bank",
  "balance": 1000
}
````
Automatically adds an "Initial Deposit" transaction if balance > 0.
