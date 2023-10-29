Project developed with Laravel 10 and php^8.1.

### Set-up guide
 - Open the terminal inside the root of the project.
 - Launch the command <em>./vendor/bin/sail up</em> to build the docker.
 - Then run the command <em>./vendor/bin/sail composer install</em>.
 - duplicate the <em>.env.example</em> and rename it to <em>.env</em>
 - Migrate the database with the command <em>./vendor/bin/sail php artisan migrate</em>
 - When the docker is up and running, launch the command <em>npm install</em> and after that the command <em>npm run dev</em> to instal and compile the frontend dependecies.
 - Then open the browser and go to the page <em>http://localhost</em>. You should see the login page of the site.

### User creation notes:
 - Click <em>register</em> to create a new user.
    For this example app, the first user created will be an admin user.
    All the other users create after the first one will be operators.
    Differences between roles: 
        - Admin can interact with all the task.
        - Operators can see (and interact) only with theirs task.
