# anhr-connect
HR Connect dibuat yang bertujuan untuk pendataan karyawan masuk dan keluar. Candidate bisa langsung apply hingga track apply.

## Stack
<div align="left">
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" height="40" alt="Bootstrap" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" height="40" alt="Laravel" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/livewire/livewire-original.svg" height="40" alt="Livewire" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-original.svg" height="40" alt="PostgreSQL" />
    <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/redis/redis-original.svg" height="40" alt="Redis" />
</div>

## ERD

## Flowchart

## Role
1. Admin
2. HRD

## Account
### Admin
- Email: lamens@domain.test
- Password: test1234

### HRD
- Email: maguire@domain.test
- Password: test1234
- Email: shaw@domain.test
- Password: test1234
- Email: sesko@domain.test
- Password: test1234

## Config
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan db:seed`
- `wsl`
- `sudo service redis-server start`

## Plugin / Libraries
- Sweetalert 2
- Predis

## Feature

## Note
- Status Candidate: 
    - applied 
    - screening 
    - interview_hrd
    - interview_user 
    - psikotest
    - technical_test 
    - mcu
    - on_boarding 
    - hired
    - rejected

## Screenshot Aplikasi