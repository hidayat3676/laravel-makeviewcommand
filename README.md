# laravel-makeviewcommand
This package contain a new artisan command which can be used to create views using CLI (command line interface) instead of creating views manually in the views directory.

<code> composer require hidayat/makeviewcommand </code>

# usage 

run 

<code> php artisan make:view name</code>

required parameter {name} is name of the view to be created, this will create view in the laravel views directory if view is not already there with the same name.

Also the command accept dir option which can be used to create views in the sub-directory in views like

<code>php artisan make:view name --dir=new-dir</code>

if the directory already exists the view will be created inside it, if not it will create directory for you and create new view file inside it.
