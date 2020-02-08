import bcrypt
import getpass

print("Thanks for trying out Yet Another Personal Time Tracking Thingie. This script will lead you through the configuration "
    + "process.")
print("Firstly please enter a username that you want.")
print("At the moment YAPWTTT is a single user application (and that might never change), however to make it easier to "
    + "automatically save login data to password managers, the login page still prompts for username and password.")
username = input("Username: ")
pw_set = False
retry = "n"
while (not pw_set):
    if retry == "n":
        print("Now please enter your password. This will be saved in a hashed format.")
    else:
        print("The passwords did not match. Good thing you chose to retype. Please try again")
    password = getpass.getpass("Password: ")
    print("Do you want to retype your password to make sure you didn't enter a typo?")
    retry = input("(Y/n): ")
    if retry == "n" or retry == "no":
        pw_set = True
    else:
        password2 = getpass.getpass("Please retype:")
        if (password == password2):
            pw_set = True
pw_hash = bcrypt.hashpw(password.encode("utf-8"), bcrypt.gensalt())
config_string = "<?php\n define('username', '" + username + "');\n define('passHash', '" + str(pw_hash, 'utf-8') + "');"
config_file = open("config.php", "w")
config_file.write("<?php\n")
config_file.write("define('username', '" + username + "');\n")
config_file.write("define('passHash', '" + str(pw_hash, 'utf-8') + "');\n")
config_file.close()
print("Successfully wrote the configuration file. You may now serve the public/ folder with a php compatible webserver "
    +"of your choosing.")
