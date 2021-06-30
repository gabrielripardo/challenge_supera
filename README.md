<h1>Challenge Supera</h1>

<h2>Description<h2>
<p>
    The challenge_supera repostory contains the challenge proposed by the company Supera.
    This project is a system developed in Laravel to register car tips.
    This solution was created usigh the the Framework PHP Laravel, Jquery and Bootstrap.
</p>
<hr>
<h2>Prerequisites</h2>
    <ul>
        PHP Server
    </ul>
    <ul>
        Composer
    </ul>
    <ul>
        MySQL
    </ul>
    <ul>
        Docker
    </ul>
 <hr>
<h2>Commands</h2>
<h3>Run Docker through Laradock</h3>
cd laradock
docker-compose up -d nginx mysql phpmyadmin 

<h3>Artisan</h3>
php artisan migrate
php artisan db:seed --class=DatabaseSeeder

<h3>Browser</h3>
http://localhost:9090



    
     
    

    
