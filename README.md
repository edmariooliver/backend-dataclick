# Clonando o projeto

Clonando Frontend
```bash
git clone https://github.com/edmariooliver/frontend-dataclick.git
```

Clonando Backend
```bash
git clone https://github.com/edmariooliver/backend-dataclick.git
```

# Configurando Backend

```bash
cd backend-dataclick
```

```bash
composer install
```

```bash
cp .env.example .env
```
```bash
php artisan key:generate
```
```bash
php artisan jwt:secret
```
```bash
sudo ./vendor/bin/sail up -d
```
Entre no .env e troque o "DB_HOST=127.0.0.1" para o IP local da sua máquina
```bash
DB_CONNECTION=mysql

DB_HOST=192.168.0.116

DB_PORT=3306
DB_DATABASE=teste
DB_USERNAME=root
DB_PASSWORD=password
```

Rodando as migrations
```bash
php artisan migrate:fresh --seed
```
Se ao rodar as migrations você der de cara com esse erro
```bash
The stream or file "backend-dataclick/storage/logs/laravel.log" could not be opened in append mode: Failed to open stream: Permission denied
```
Use este comando e rode as migrations novamente
```bash
sudo chmod -R 775 storage
```
E pronto o backend já está rodando

<br>

# Configurando Frontend

Volte um diretório 
```bash
cd ..
```
```bash
cd frontend-dataclick/
```
Instale as dependências
```bash
npm install
```

```bash
npm run dev
```

<hr>

O arquivo de collection do Postman está no projeto também! 
[Clique aqui](https://github.com/edmariooliver/backend-dataclick/blob/master/Gosto%20muito%20de%20vodka.postman_collection.json)
