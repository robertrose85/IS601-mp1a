#Mini Project 1 for IS-601
1. Hello
2. World

#Headline 1
##Headline 2
###Headline 3 - etc..

##Creating a project
Create a readme.md for notes 

Create public folder
Public folder is where source for website goes

Create index.php
index is the first file that the webserver serves

Save before running

##Github:
Created github repository and connected
VCS -> Git -> Remotes -> origin and URL of repository

** When committing define what you are committing (Task:, Fix:, etc.) **

##Heroku:

bob@bob-Ubuntu18:~/PhpstormProjects/IS601-mp1a$ heroku login
heroku: Enter your login credentials
Email [rr637@njit.edu]: 
Password: **********
Logged in as rr637@njit.edu
bob@bob-Ubuntu18:~/PhpstormProjects/IS601-mp1a$ heroku create
Creating app... done, ⬢ limitless-tundra-82789
https://limitless-tundra-82789.herokuapp.com/ | https://git.heroku.com/limitless-tundra-82789.git
bob@bob-Ubuntu18:~/PhpstormProjects/IS601-mp1a$ 

##Composer
Need to create a composer.json file

Each language has a dependency management system - for php it's composer. This will automatically maintain libraries for our application.

In terminal ->  echo '{}' > composer.json // This creates a composer file with curly braces inserted in the file.

In terminal -> git add composer.json // this tells git which file it is going to work with

In terminal -> git commit -m "add composer.json for PHP app detection"

## Procfile

Text file -> google heroku php procfile and look for specifying which webserver to use and setting doc root.

End: 57:30


