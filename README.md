## Backend Setup

1. Navigate to the Backend Directory:
    ```
    cd Backend
    ```
2. Install Dependencies:
    ```
    composer install
    ```

3. Setup Environment:
    ```
    cp .env.example .env
    php artisan key:generate
    ```


4. Configure Database:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5. Run Migrations:
    ```
    php artisan migrate
    ```

6. Seed the Database:
    ```
    php artisan db:seed
    ```

7. Start MailHog:

    [MailHog installation](https://github.com/mailhog/MailHog)

    ```
    MailHog
    ```
Access MailHog Ui at `http://localhost:8025

8. Run the Backend:
    ```
    php artisan serve
    ```

9. Run the Queue Worker:
    ```
    php artisan queue:work
    ```

## Frontend

1. Navigate to the Frontend Directory:
    ```
    cd Frontend
    ```

2. Install Dependencies:
    ```
    npm ci
    ```

3. Run the Frontend:
    ```
    npm run serve
    ```
## Testing the Software

### Access the Application
- Backend: `http://localhost:8000`
- Frontend: `http://localhost:3000`
- Email: `http://localhost:8025`

### Admin Credentials
- Email: admin@gmail.com
- Password: admin123

### User Credentials
- Email: user@gmail.com
- Password: user123