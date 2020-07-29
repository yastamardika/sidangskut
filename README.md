# How to Use
1. Clone the repository
2. Open terminal/command prompt/powershell
3. Run composer install
4. Create db via Phpmyadmin/adminer
5. Rename .env example to .env
6. Configure the .env file and fill the DB_DATABASE same as the db name created before
7. Run php artisan migrate --seed
8. Run php artisan serve
9. Ready to go

---

# Newest Progress of Sidasi (sistem informasi daftar sidang)

### on Branch Dev :
- Merged with db structure branch
    consist of:
    - all migration db 
    - foreign key
- Merged with role_management branch
    consist of:
    - role management setting rule by super-admin
    - every role and permission passed via middleware on route->web.php
- Merged with kaprodi_features branch
    consist of:
    - default user role assigned as mahasiswa after register
    - web.php routing modified
    - added controller for all kaprodi features inside MhsDiajukanController

