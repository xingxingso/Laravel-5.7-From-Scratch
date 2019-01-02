[TOC]

# Laravel 5.7 From Scratch

## [The Laravel Sell](https://laracasts.com/series/laravel-from-scratch-2018/episodes/1)

> Presumably, if you're watching this series, 
you've already made the decision to embrace all that Laravel has to offer. 
However, if you're still on the fence, 
give me just a moment to sell you on 
why I believe Laravel is the best framework choice in the PHP world.

### Useful Websites

- [Laravel - The PHP Framework For Web Artisans](https://laravel.com/)

- [Laracasts](https://laracasts.com/)

- [Laravel News](https://laravel-news.com/)

- [LaraJobs](https://larajobs.com/)

- [Laravel Forge - Instant PHP Servers](https://forge.laravel.com/)

- [Envoyer - Zero Downtime PHP Deployment](https://envoyer.io/)

- [Laravel Spark](https://spark.laravel.com/)

- [Laravel Nova - Beautifully-designed administration panel for Laravel](https://nova.laravel.com/)

- [Test-Driven Laravel – Learn to build robust, well-designed Laravel applications with TDD.](https://course.testdrivenlaravel.com/)

- [Servers for Hackers](https://serversforhackers.com/)

- [O'Reilly Media - Tech Books and Videos](http://shop.oreilly.com/)

## [Initial Setup Requirements](https://laracasts.com/series/laravel-from-scratch-2018/episodes/2)

> Like any modern PHP framework, 
you'll need to install a few prerequisites to prepare for Laravel. 
Don't worry: this is a one-time job. 
Stick with me, and we'll get through it quickly. 
We'll first install Composer, make it available system-wide, 
and then pull in the Laravel installer. 
This small tool will allow us to run a simple command (laravel new app) 
to instantly generate a fresh Laravel project.

## [Basic Routing](https://laracasts.com/series/laravel-from-scratch-2018/episodes/3)

> When learning a new framework, 
one of your first tasks is to determine how routing is handled. 
Or in other words, when I visit a particular URL in the browser, 
how does my framework route that URL to the necessary logic? 
Let's review the basics in this episode.

```bash
php artisan serve
```

## [Blade Layout Files](https://laracasts.com/series/laravel-from-scratch-2018/episodes/4)

> When constructing your views, you're not limited to basic PHP. 
Instead, you can use Blade: Laravel's powerful templating engine. 
We'll talk about Blade more in the future, but for now, 
let's leverage it to create a layout file to reduce duplication and complexity.

```php
@yield('title', 'Laracasts')

@section('title', 'Contact Us')
```

## [Sending Data to Your Views](https://laracasts.com/series/laravel-from-scratch-2018/episodes/5)

> You'll often need to pass data to your views. 
Perhaps it's a collection from the database, 
or maybe a flash message to confirm a particular user action. 
Let's review how easy this is to do.

```php
<?php
view('welcome', ['foo' => 'bar']);
view('welcome')->with(['foo' => 'bar']);
view('welcome')->withFoo('bar');
```

```php
<?= $foo; ?>
{{ $foo }}
{!! $foo !!}
```

## [Controllers 101](https://laracasts.com/series/laravel-from-scratch-2018/episodes/6)

> So far, we've handled all route logic through a closure in our routes/web.php file. 
This is an excellent choice in some cases; 
however, I think you'll find that the majority of your projects will require a bit more structure. 
Let's learn how to migrate from route closures to dedicated controllers.

## [Databases and Migrations](https://laracasts.com/series/laravel-from-scratch-2018/episodes/7)

> Let's move on to the fun part: connecting to our database. 
This lesson will introduce a number of new concepts, so pay close attention. 
We'll first review environment files. 
This is where we can store important keys, passwords, and configuration settings. 
Next, we'll discuss Laravel migrations: what they are, and why you should use them.

### Note

```bash
php artisan migrate
php artisan migrate:rollback
php artisan migrate:fresh
php artisan help make:migration
php artisan make:migration create_projects_table
```

### Questions 

#### [Specified key was too long error](https://laravel.com/docs/5.7/migrations#indexes)

```php
<?php
Schema::defaultStringLength(191);
```

## [Eloquent, Namespacing, and MVC](https://laracasts.com/series/laravel-from-scratch-2018/episodes/8)

> Now that we understand how to create a new database table using a migration class, 
let's now query that data with Eloquent. 
As part of this, we'll do a quick recap of basic namespacing and MVC workflow.

### Note

```bash
php artisan make:model Project
php artisan make:controller ProjectsController
```

```php
App\Project::all()->map->title;
```

## [Directory Structure Review](https://laracasts.com/series/laravel-from-scratch-2018/episodes/9)

> If you don't mind, 
let's take ten minutes to quickly review the directory structure 
that you'll encounter with each new Laravel install. 
While some of these concepts are currently a bit above our pay grade, 
it's important that we at least have a basic understanding of 
what each directory is responsible for.

### Note

```php
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
// php artisan inspire
```

## [Form Handling and CSRF Protection](https://laracasts.com/series/laravel-from-scratch-2018/episodes/10)

> In this lesson, 
we'll review a basic workflow for submitting form data to our server. 
In the process, however, 
we'll be forced to address a new concept: CSRF (Cross-Site Request Forgery).
CSRF refers to an attack 
that secretly forces a user to unwittingly execute an action 
on a web application in which they're currently authenticated.

### Note

> **CSRF** stands for "Cross-Site Request Forgery"

```php
@csrf  // laravel 5.7
{{ csrf_field() }}
```

## [Routing Conventions Worth Following](https://laracasts.com/series/laravel-from-scratch-2018/episodes/11)

> You'll find that many Laravel applications follow a common convention when it comes to routing. 
In this lesson, we'll review resourceful routing, extended controller generation, 
and recommendations for how to organize your controllers.

### Note

| Method |       URI        |  Action |
|--------|------------------|---------|
| GET    | /projects        | index   |
| GET    | /projects/create | create  |
| POST   | /porjects        | store   |
| GET    | /projects/1      | show    |
| GET    | /projects/1/edit | edit    |
| PATCH  | /projects/1      | update  |
| DELETE | /projects/1      | destroy |

```php
Route::resource('projects', 'ProjectsController');
```

```bash
php artisan route:list
php artisan make:controller PostsController -r
php artisan make:controller PostsController -r -m Post
```

## [Faking PATCH and DELETE Requests](https://laracasts.com/series/laravel-from-scratch-2018/episodes/12)

> Browsers don't yet understand PATCH and DELETE request types for your forms. 
To get around this limitation, 
we'll use a bit of trickery to instruct Laravel which HTTP verb to assume.

### Note

```php
@method('DELETE')
{{ method_field('PATCH') }}
```

## [Form Delete Requests](https://laracasts.com/series/laravel-from-scratch-2018/episodes/13)

> Let's review the homework solution from the previous lesson. 
To delete an existing project, 
we'll need to create a second form that sends a DELETE request to the necessary endpoint.

### Note

```php
$project = Project::findOrFail($id);
```

## [Cleaner Controllers and Mass Assignment Concerns](https://laracasts.com/series/laravel-from-scratch-2018/episodes/14)

> It's important that you set aside time to review and improve the code you've written. 
With that in mind, let's return to our `ProjectsController` class and review 
how we might improve and simplify the code. 
In doing so, this will give us the chance to discuss **route model binding** 
and **mass assignment** vulnerabilities.

### Reference

-  [routing#route-model-binding](https://laravel.com/docs/5.7/routing#route-model-binding)

### Note

```php
<?php
Project::create([
    'title' => request('title'),
    'description' => request('description')
]);

Project::create(request(['title', 'description']));

$project->update(request(['title', 'description']));
```

```php
<?php
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $fillable = [
        'title', 'description'
    ];

    protected $guarded = [];
}
```

## [Two Layers of Validation](https://laracasts.com/series/laravel-from-scratch-2018/episodes/15)

> When it comes to user-provided data, 
always take an approach of "guilty until proven innocent." 
With that in mind, we'll add two layers of validation: client-side and server-side. 
This will give us maximum assurance that we're receiving the correctly formatted input. 
Anything else will be rejected entirely.

> View the relevant source code for this episode [on GitHub](https://gist.github.com/JeffreyWay/bb70191eb4ed84e51d9d310b0b56c14b).

### Reference

- [JeffreyWay’s gists](https://gist.github.com/JeffreyWay)
- [Validation#available-validation-rules](https://laravel.com/docs/5.7/validation#available-validation-rules)

### Note

```php
<?php
Project::create(
    request()->validate([
        'title' => ['required', 'min:3', 'max:255'],
        'description' => 'required|min:3',
        'password' => 'required|confirmed'
    ])
);
```

```php
$errors->any()
$errors->all()
$errors->has('title')

old('title');
```

## [Your First Eloquent Relationships](https://laracasts.com/series/laravel-from-scratch-2018/episodes/16)

> Eloquent ships with a handful of relationship methods 
to make the process of performing complex SQL queries as simple as calling a method. 
Let's extend the feature-set of our website to allow for custom per-project tasks. 
This will give us the opportunity to review two relationships: `hasMany()` and `belongsTo()`.

### Note

```bash
php artisan make:model Task -m -f
```

```php
return $this->hasMany(Task::class);

$project->tasks->count();
```

## [Form Action Considerations](https://laracasts.com/series/laravel-from-scratch-2018/episodes/17)

> It's important to set aside an appropriate amount of time to consider your form endpoints. 
In this lesson, we'll review two common conventions you'll encounter in the wild.

### Note

#### Chrome Debug Skill

    1. Chrome 
    2. F12 
    3. `Select an element`
    4. Console
    5. Enter `$0`; `$0.submit()`

#### code

```html
<input type="checkbox" name="completed" onChange="this.form.submit()">
```

```php
request()->has('completed');

back();
```

## [Create New Project Tasks](https://laracasts.com/series/laravel-from-scratch-2018/episodes/18)

> To add new tasks to our project page, we'll need to construct another form. 
This will give us the chance to once again discuss URI naming conventions, 
as well as basic encapsulation techniques.

## [Better Encapsulation](https://laracasts.com/series/laravel-from-scratch-2018/episodes/19)

> Let's talk about encapsulation a bit more. 
"Encapsulation" refers to the act of hiding values and state inside of a class. 
So with that in mind, let's review our controller and review 
in which areas we might improve encapsulation and flexibility.

### Note

> **Encapsulation**: Hide internal state and values inside a class.

## [When in Doubt](https://laracasts.com/series/laravel-from-scratch-2018/episodes/20)

> **Extra Credit!** When in doubt, create a new controller and return to REST. 
This is a technique that I've reached for countless times over the years. 
Let's discuss what I mean by this, and what it might look like in our current demo.

### Reference

- [Watch Day 1 - Adam Wathan from Laracon US 2017!](https://streamacon.com/video/laracon-us-2017/day-1-adam-wathan)
