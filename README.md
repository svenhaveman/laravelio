## Laravel.IO Community Portal

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/50a7431f-66b0-4221-8837-7ccf1924031e/mini.png)](https://insight.sensiolabs.com/projects/50a7431f-66b0-4221-8837-7ccf1924031e)

This is the Laravel.IO community portal site. The site is entirely open source and community involvement is not only encouraged, but necessary in order to ensure the future success of the project.

> It's important to note that the application is in heavy development right now. Please do not submit pull requests until you've submitted a proposal issue, first. We'd really hate to have people work really hard on a pull request only to find out that it won't make it into the project.

### Requirements

1. PHP 5.4
2. Vagrant
3. Virtualbox
4. NodeJS & NPM
5. Ruby, Sass, and Compass

### Local Installation

Here are the steps for installation on a local machine using the officially endorsed workflow.

1. If you haven't already, install Laravel Homestead and all of its dependencies (Vagrant, Virtualbox). The environment provided by Homestead the most consistent and predictable environment for developing on the project.

    [Laravel Homestead Installation Instructions][4]

2. Add "127.0.0.1 io.local" to your HOSTS file. For *nix/Mac, either `sudo vim /etc/hosts` and add it there or run the command below:
    ```
    echo "127.0.0.1 io.local" | sudo tee -a /etc/hosts
    ```
3. Clone down this repository to your code/sites folder
    ```
    git clone git@github.com:LaravelIO/laravel-io.git
    ```
4. Add the app to Homestead by adding the following lines to your Homestead.yaml: 
    ```
        - map io.local
          to: /home/vagrant/Code/laravel.io/public
    ```
5. If your Homestead environment has already been provisioned, refresh it, either by running `vagrant destroy` and then `vagrant up`, or by running the following within your `vagrant ssh`:
    ```
    serve io.local /home/vagrant/Code/laravel.io/public
    ```
6. Create a `lio_development` MySQL database in Homestead.

7. **The remaining steps will all be from within your vagrant ssh, run from the laravel.io folder.**
    Chmod your storage folder
    ```
    chmod -R 777 app/storage
    ```
    
8. Composer install
    ```
    composer install --no-scripts
    ```
    
9. Migrate and seed your database
    ```
    php artisan migrate --env=local
    php artisan db:seed --env=local
    ```

10. Optimize your autoloader
    ```
    php artisan dump-autoload
    ```


Now, we must install the oauth configuration.

1. [Create an application][5] in your github account called something like "Laravel IO Development" and add your GH application's client id and secret to this config file. Your GitHub Application should be set up as follows:

    a. Full URL: http://io.local:8000

    b. Callback URL: http://io.local:8000/login
2. Create the configuration file below at ***app/config/local/github.php***

```PHP
<?php

return [
    'client_id'     => 'CLIENT_ID',
    'client_secret' => 'CLIENT_SECRET',
    'scope'         => ['user:email'],
    'redirect_url'  => 'http://io.local:8000/login',
];
```

### Workflow

Before working on the application, make sure your Homestead vagrant install is up.

Access the application at the URL: http://io.local:8000/ (the trailing front-slash tends to be required for .local tlds in most browsers).

### Frontend

Because we keep the generated / minified css out of the repository, we must have a workflow for compiling the styles.

* Install the latest NodeJS
* Install Ruby via RVM
* Install Sass and Compass
* Finally, run "compass watch" in your /public folder and the minified css will be generated and also your filesystem will watch for file changes (and overwrites the .css). You can also run "compass compile" as a single one-time command to generate the css and don't watch the filesystem.  

### Contribution

[Contribution guidelines can be found here.](CONTRIBUTING.md)

### Troubleshooting

**I'm getting an error about running a 64bit VM on a 32bit machine**

You probably don't have hardware virtualization support enabled in your computer's BIOS.


  [1]: http://downloads.vagrantup.com/
  [2]: http://www.opscode.com/chef/install/
  [3]: https://www.virtualbox.org/wiki/Downloads
  [4]: http://laravel.com/docs/homestead
  [5]: https://github.com/settings/applications
