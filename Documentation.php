Documentation

-   Laravel
    -   Executing custom composer.json script commands
        -   Inside the `scripts` section of the composer.json, create a new key with an array value like so:
            "<key>": []
        -   Inside the array you may place strings with commands line commands and php scripts, example:
            "<key>": [
                "ls -l",
                "cd <some_directory>/<some_directory>",
                "echo 'test'"
            ]
        -   Notes
            -   composer.json commands can also be run from classes
    -   form_text method on LaravelCms Facade
        -   In the same way that Laravel\Collective handles extra attributes lets handle it that way to
        -   Set core properties to be passed and explicitly set
        -   Seconday types of attributes will be set by an array of key values corresponding to the
            attribute name and value. Example:
                ['class' => 'form-control <classname>', 'data-attr' => 'value']