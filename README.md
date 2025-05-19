🏨 Hotel Reservation Website

Sebuah website reservasi hotel berbasis Laravel yang dibuat sebagai bagian dari proyek ujikom jurusan RPL. Proyek ini mencakup fitur booking kamar oleh user dan CRUD data kamar serta pemesanan oleh admin

✨ Fitur Utama

👥 Untuk Pengunjung / User:
- Lihat daftar kamar hotel
- Lihat detail kamar
- Booking kamar secara online

🔐 Untuk Admin:
- Login ke dashboard admin
- CRUD Data Kamar (Create, Read, Update, Delete)
- CRUD Data Pemesanan
- Lihat daftar user yang melakukan booking

⚙️ Tools yang Digunakan

- Laravel 11
- XAMPP (Apache + MySQL)
- Template admin & landing page berbasis HTML/CSS (menggunakan template yang dimodifikasi)

🚀 Cara Menjalankan Proyek

1. Clone repository ini:
   ```bash
   git clone https://github.com/USERNAME/Hotel-Reservation.git
2. Jalankan perintah ini di terminal:
   - composer install
   - cp .env.example .env
   - php artisan key:generate
3. Buat database, misalnya hotel, lalu sesuaikan file .env;
   #DB_DATABASE=hotel
   #DB_USERNAME=root
   #DB_PASSWORD=

4. Atau import file SQL yang ada di folder:
   /database/hotel.sql

5. Jalankan:
   - php artisan migrate
   - php artisan serve

📸 Tampilan
![Landing Page](https://github.com/user-attachments/assets/b729111a-94c1-46c1-b9fc-1bfa80e2c417)

![Booking Form](https://github.com/user-attachments/assets/7e581a50-1e28-4e84-8c16-10de240e0385)

![Dashboard Admin](https://github.com/user-attachments/assets/8e6e4457-0f76-49c1-84e4-752de82e3b25)

![Room Data](https://github.com/user-attachments/assets/820c6a56-230a-4c20-9647-2eceac01d53e)

![Booked Data](https://github.com/user-attachments/assets/49cb0b2a-f550-4990-b4cf-af23b392ae2a)

