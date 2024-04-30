# Glossary API

This api is designed to be able to create categories and their subcategories and the words to which they belong, basically it is a dictionary type api

# Used Packages

1. [laravel-breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)
2. [laravel-schema-rules](https://github.com/laracraft-tech/laravel-schema-rules)

# Development Tips

>[!IMPORTANT]
>As written in the used packages, these are the only packages that have been used. 
> You might encounter an issue when installing Breeze. Upon installation, it will delete the routes in the navigation file and it will appear in the stage.

![stage1](/Glossary-API/public/img/stage1.png).

>[!TIP] 
> Afterwards, you only need to discard the changes. These could be `pagination.blade.php`, if it appears, and `navigations.blade.php`. 
> Alternatively, simply discard all changes and leave only the `composer.lock`.

![stage2](/Glossary-API/public/img/stage2.png).

>[!TIP]
> Additionally, to install `laravel-schema-rules`, you only need to run the following command:
> ```bash
> composer update
> ```
> I'm also using version 21.0.0 of Node, and I encountered this problem ![node1](/Glossary-API/public/img/nrd.png).
> 
> I was able to solve it with this command:
> ```bash
> echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p
> ```

# Thanks :green_heart:

This idea was taken from [el rincón de isma](https://www.youtube.com/watch?v=ZPsjGNPGV8c).
