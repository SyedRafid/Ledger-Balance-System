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
#### 1. ➕ Create Account

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

#### 2. 📋 List All Accounts
   GET /api/accounts
#### 3. 🔍 Show Single Account
   GET /api/accounts/{id}
#### 4. ✏️ Update Account
   PUT /api/accounts/{id}
   json
   Body:
```bash
   {
     "name": "Updated Cash Account",
     "accountType": "Cash"
   }
````
#### 5. ❌ Delete Account
   DELETE /api/accounts/{id}


### 💳 TRANSACTIONS
####➕ Add Transaction

POST /api/transactions
   json
   Body:
```bash
   {
  "account_id": 1,
  "type": "debit",
  "amount": 200,
  "note": "Deposit from sales"
}
````
### 📊 LEDGER REPORT (Bonus Task)

GET /api/ledger/report/{id}

Expected response:
```bash
{
  "account": "Cash Account",
  "accountType": "Cash",
  "total_debit": "1200.00",
  "total_credit": "450.00",
  "current_balance": "750.00"
}
```

---

## 🧩 Core Components

### 1. 🧱 Models
- Account — represents ledger accounts (Cash, Bank)
- Transaction — represents financial records (debit/credit)

### 2. ⚙️ Service Class
App\Services\LedgerService
Handles all business logic for balance updates and transactions.

### 3. 💡 Facade
Ledger::addTransaction($data)
Provides expressive syntax for handling transactions.

### 4. 🧮 Seeder
Pre-populates Cash and Bank accounts.

---

## 🧠 Evaluation Highlights
| Criteria             | Description |
|----------------------|------------------------------------------|
| Code Quality         | Clean, modular, and PSR-4 compliant      |
| Service Container    | Used via app(LedgerService::class)       |
| Logical Structure    | MVC + Service Layer separation           |
| Bonus Task           | Implemented successfully (Ledger Report) |

---
---
## 🧑‍💻 Author
Syed Rafid
- 📧 Email: Syed.shuvon@gmail.com
- 🌐 GitHub: https://github.com/SyedRafid
= 💼 Role: Laravel Developer
---

## 🏁 Final Note

This project demonstrates:

- Proficiency with Laravel Framework
- Understanding of OOP, MVC, Services, and Facade
- Real-world implementation of a SaaS-style accounting module
