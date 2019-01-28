# gogoprint
<h1>Requirements</h1>
<p>
This app uses Laravel 5.6 so you need to have the following requirements before running this app:
</p>

<ul>
    <li>PHP >= 7.1.3</li>
    <li>OpenSSL PHP Extension</li>
    <li>PDO PHP Extension</li>
    <li>Mbstring PHP Extension</li>
    <li>Tokenizer PHP Extension</li>
    <li>XML PHP Extension</li>
    <li>Ctype PHP Extension</li>
    <li>JSON PHP Extension</li>
    <li>Composer installed in your machine</li>
    <li>MySQL Database</li>
</ul>

<h1>Set-Up</h1>
<p>After fulfilling the following requirements, follow this set-up</p>

<ul>
    <li>1. Create database named gogoprint.</li>
    <li>2. Open the .env file. You will see a database connection there. Edit it with your username and password.</li>
    <li>3. Open your terminal, go to gogoprint directory then declare "php artisan migrate". If this is success, it will create tables inside gogoprint database.</li>
    <li>Declare "php artisan db:seed" to populate tables in the database.</li>
    <li>After this, run "php artisan serve". Try to navigate in the URL provided and you should see the web page in the web browser</li>
    <li>If you want to try the frontend builder, you can do so by running "npm run watch". "npm run dev" or "npm run production" in a separate Terminal window</li>
    <li>In a separate Terminal window, you can run "vendor/bin/phpunit" to see the test results of API endpoints</li>
</ul>

<h1>Technologies Used</h1>
<ul>
    <li>Laravel 5.6</li>
    <li>MySQL Database</li>
    <li>PHPUnit (I use TDD to build this app)</li>
    <li>php-cs-fixer (I did not do PSR2 manually, rather I use this tool to automatically make my source code into PSR2)</li>
    <li>Webpack</li>
    <li>Vue.JS</li>
    <li>Axios</li>
    <li>Moment (A javascript plugin. I use this for displaying updated delivery dates in table header)</li>
    <li>W3.CSS (Like Bootstrap framework but this one has no jQuery)</li>
    <li>JavaScript / EcmaScript</li>
</ul>

<h5>Feel free to ask me via email if you have question. Thanks :)</h5>
