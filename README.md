# Yapwttt: Yet another personal work time tracking thingie

Name says it all. Except that this project very WIP at the moment, but that might 
change while the name probably wont.

## Why

Because I wanted a personal work time tracking thingie and with every existing 
solution that I know of there are issues that make me want to not use them.

More documentation will be coming once this actually is a thing that exists and 
does things.

## Deployment guide

At the current state this project is *not* usable. Please do not deploy it until
this message is removed from the readme unless you want to help make it usable.

1. Make sure you have a current version of PHP (this app is tested in 7.4.2) 
installed
2. Make sure you have a current version of Python installed.
3. Make sure you have the `bcrypt` Python extension installed. If you have not 
run `pip(3) install bcrypt`.
4. Clone this repo
5. Run `python(3) setup.py` and fill in the prompts
6. Set up a PHP-Compatible web server to serve the `public/` folder. Make sure 
that the server has access to the entire repo.
    - For development purposes the server that comes with PHP is sufficient. To 
    use it run `php -S localhost:8000 -t public/` to serve the page on port 8000.

The Python steps are semi-optional. You may also configure the application by 
creating a config.php file in the root of this document containing constant 
definitions for a username and a hashed password. (See config.php.example) I 
wrote the Python script because I find it annoying to hash passwords by hand. 
More configuration options may be added in the future.

## Security

If you have found a security vulnerability in this application I would be very
thankful if you could send me an email at yapwttt_security(at)dysphoric(dot)dev.
Please do not open an issue for security problems that have not been fixed.
