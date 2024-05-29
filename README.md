# Glossary API

This api is designed to be able to create categories and their subcategories and the words to which they belong, basically it is a dictionary type api

If you are using the graphic part, keep in mind that when you create a word the letter option is empty because it takes the letters from the database so you have to insert them manually

In addition, you have to reload the page to see the results, this part will be updated soon

# Used Packages

1. [laravel-breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)
2. [laravel-schema-rules](https://github.com/laracraft-tech/laravel-schema-rules)

# Use Basic 

This is the basic use to insert everything that is in this api

to make a category

![basic1](/Glossary-API/public/img/bc1.png)

now to make a Sub category

![basic2](/Glossary-API/public/img/bc2.png)

how to insert the words in the subcategory

![basic3](/Glossary-API/public/img/bc3.png)

# Development Tips

As written in the used packages, these are the only packages that have been used. 
You might encounter an issue when installing Breeze. Upon installation, it will delete the routes in the navigation file and it will appear in the stage.

![stage1](/Glossary-API/public/img/stage1.png).
 
Afterwards, you only need to discard the changes. These could be `pagination.blade.php`, if it appears, and `navigations.blade.php`. 
Alternatively, simply discard all changes and leave only the `composer.lock`.

![stage2](/Glossary-API/public/img/stage2.png).

Additionally, to install `laravel-schema-rules`, you only need to run the following command:
```bash
composer update
```
I'm also using version 21.0.0 of Node, and I encountered this problem ![node1](/Glossary-API/public/img/nrd.png) 
I was able to solve it with this command:
```bash
echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p
```


# Thanks :green_heart:

This idea was taken from [el rincón de isma](https://www.youtube.com/watch?v=ZPsjGNPGV8c).
