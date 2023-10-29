# task-app
Demo Task app

Project developed with Laravel 10 and php^8.1.

### Set-up guide
 - duplicate the <em>.env.example</em> and rename it to <em>.env</em>
 - Open the terminal inside the root of the project.
 - Launch the command <em>docker compose up -d</em> to build the docker.
 - From the docker terminal, run <em>php composer.phar install</em>.
 - Open the terminal in the root of the project
 - Migrate the database with the command <em>./vendor/bin/sail php artisan migrate</em>
 - launch the command <em>./vendor/bin/sail npm install</em> and after that the command <em>./vendor/bin/sail npm run dev</em> to instal and compile the frontend dependecies.
 - Then open the browser and go to the page <em>http://localhost</em>. You should see the login page of the site.

### User creation notes:
 - Click <em>register</em> to create a new user.
    For this example app, the first user created will be an admin user.
    All the other users create after the first one will be operators.
    Differences between roles: 
        - Admin can interact with all the task.
        - Operators can see (and interact) only with theirs task.

