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

## [Core Concepts: Service Container and Auto-Resolution](https://laracasts.com/series/laravel-from-scratch-2018/episodes/21)

> It's important that we take time to review the core concepts behind the Laravel framework. 
First up is two scary, but vitally important terms: **service container** and **auto-resolution**. 
Together, these two create the perfect one-two punch for your dependency resolving needs.

### Note

```php
use Illuminate\Filesystem\Filesystem;

app();
app(Filesystem::class);
app('example');
app('App\Example');

resolve(Filesystem::class);

app()->bind('example', function () {
    return new \App\Example;
});

// app()->singleton('App\Example', function () {
app()->singleton('example', function () {
    return new \App\Example;
});
```

## [Core Concepts: Service Providers](https://laracasts.com/series/laravel-from-scratch-2018/episodes/22)

> Now that you have a better understanding of Laravel's service container, 
we can move on to our second core concept: **service providers**. 
These classes are responsible for registering and bootstrapping a component with the Laravel framework.

### Note

```bash
php artisan make:provider SocialServiceProvider
```

```php
$this->app->bind(
    \App\Repositories\UserRepository::class,
    \App\Repositories\DbUserRepository::class
);
```

## [Core Concepts: Configuration and Environments](https://laracasts.com/series/laravel-from-scratch-2018/episodes/23)

> Our next core concept focuses on configuration. 
Luckily, Laravel makes environment-specific settings 
(development, testing, production, etc.) a breeze to setup and reference.

### Note

```bash
php artisan config:cache
php artisan config:clear
```

```php
config('services.twitter.secret');

env('TWITTER_SECRET');
```

## [A Full Registration System in Seconds](https://laracasts.com/series/laravel-from-scratch-2018/episodes/24)

> Laravel includes a robust registration and authentication system out of the box. 
Run a single Artisan command, and, bam, you're ready to go!

### Note

```
php artisan make:auth
```

## [Core Concepts: Middleware](https://laracasts.com/series/laravel-from-scratch-2018/episodes/25)

> Our next core concept is **middleware**. Think of middleware like layers of an onion. 
As a request enters your application, it travels through these layers, one by one. 
Each layer (or middleware) has the opportunity to perform some kind of operation. 
It can cache a piece of data, it can redirect the user, or it can even adjust the response.

### Note

```bash
php artisan make:middleware LogQueries
```

```php
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('guest');

public function __construct()
{
    $this->middleware('auth');
}
```

## [You May Only View Your Projects](https://laracasts.com/series/laravel-from-scratch-2018/episodes/26)

> Now that you understand authentication and middleware, 
we can apply this new learning to our "projects" demo. 
At the moment, you can view and modify any project in the database. 
In real life, of course, your access should be limited to only the projects that you own. 
Let's begin fixing that in this episode.

### Note

```php
auth()->id();
auth()->user();
auth()->check();
auth()->guest();
```

## [Authorization Essentials](https://laracasts.com/series/laravel-from-scratch-2018/episodes/27)

> Laravel includes a powerful **Gate** component for authorizing your users. 
Wouldn't it be nice if your authorization logic read like a readable sentence? 
Well, we can do that very easily!

### Note

```bash
php artisan make:policy ProjectPolicy
php artisan make:policy ProjectPolicy --model=Project
```

```php
<?php
abort(403);
abort_if ($project->id !== auth()->id(), 403);
abort_unless(auth()->user()->owns($project), 403);

// use Policy
$this->authorize('view', $project);

auth()->user()->can('update', $project);
auth()->user()->cannot('update', $project);

\Gate::denies('update', $project);
\Gate::allows('update', $project);

Route::resource('projects', 'ProjectsController')->middleware('can:update,project');

// ProjectsController.php
public function __construct()
{
    $this->middleware('can:update,project')->except(['index']);
}
```

```html
@can('update', $project)
    <a href="">Update</a>
@endcan
```

```php
<?php
// AuthServiceProvider.php
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        $gate->before(function ($user) {
            if ($user->id == 1) { // this is an admin id.
                return true;
            }
        });
    }
}
```

### Reference

- [Authorization#intercepting-gate-checks](https://laravel.com/docs/5.7/authorization#intercepting-gate-checks)

## [Simpler Debugging With Laravel Telescope](https://laracasts.com/series/laravel-from-scratch-2018/episodes/28)

> [Laravel Telescope](https://github.com/laravel/telescope) is a first-party package to assist with debugging and monitoring your application. 
For anything other than quick throwaway projects, I highly recommend that you pull this in.

### Note

- `http://127.0.0.1:8000/telescope`

```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate

php artisan make:mail ProjectCreated
php artisan make:mail ProjectCreated --markdown="mail.project-created"
```

```php
$projects = Project::where('owner_id', auth()->id())->take(1)->get();

cache()->rememberForever('stats', function () {
    return ['lesson' => 1300, 'hours' => 50000, 'series' => 100];
});
```

## [Don't Forget Readability](https://laracasts.com/series/laravel-from-scratch-2018/episodes/29)

> Before we move on to eventing, 
let's take another quick stroll through our main `ProjectsController` to review readability. 
Are there any places where we can make the code more clear?

## [Mailables](https://laracasts.com/series/laravel-from-scratch-2018/episodes/30)

> We spoke briefly about sending email with Laravel in a previous episode, 
but let's dedicate this full lesson to the topic. 
In addition to the basic workflow for generating Laravel mailables, 
we'll also discuss two methods for reviewing these emails: Telescope and Mailtrap.io.

#### Reference

- [Mailtrap.io — Fake smtp testing server. Dummy smtp email testing](https://mailtrap.io)

## [Model Hooks and Seesaws](https://laracasts.com/series/laravel-from-scratch-2018/episodes/31)

> Over the next few lessons, we'll review various approaches for organizing your code. 
Consider the "send an email when a project is created" portion of the code. 
We could trigger this logic in multiple ways: through the controller, 
as an Eloquent model hook, as a custom event, etc. 
Let's begin reviewing these approaches while discussing the pros and cons of each.

### Note

```php
class Project extends Model
{
    protected static function boot() 
    {
        parent::boot();

        static::created(function ($project) {
            Mail::to($project->owner->email)->send(
                new ProjectCreated($project)
            );
        });
    }
}
```

### Reference

- [Eloquent#events](https://laravel.com/docs/5.7/eloquent#events)

## [Custom Events and Listeners](https://laracasts.com/series/laravel-from-scratch-2018/episodes/32)

> Let's now review the third choice for refactoring our code: custom events. 
As you'll see, this particular refactor does come with small complexity cost up front; 
however, particularly when dealing with actions that include multiple side effects, 
this can be a useful technique for your toolbelt.

### Note

```bash
php artisan make:event ProjectCreated

php artisan make:listener SendProjectCreatedNotification
php artisan make:listener SendProjectCreatedNotification --event=ProjectCreated
```

```php
protected $dispatchesEvents = [
    'created' => ProjectCreated::class
];
```

### Reference

- [alexeymezenin/laravel-best-practices: Laravel best practices](https://github.com/alexeymezenin/laravel-best-practices)

## [User Notifications](https://laracasts.com/series/laravel-from-scratch-2018/episodes/33)

> You already know how to send basic emails. Next, let's move on to Laravel notifications. 
Using Laracasts as an example, imagine that we must notify a user 
when their subscription renewal charge has failed to process. 
While, yes, we can send them an email, 
what if we also want to notify them through a text message or their dashboard in the web app? 
Sure, no problem. This is all quite easy with Laravel.

### Note

```bash
php artisan make:notification SubscriptionRenewalFailed
php artisan notification:table
```

```php
<?php
namespace App;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;
}
```

```php
$user->notify(new SubscriptionRenewalFailed);
$user->notifications->first()->markAsRead();
$user->unreadNotifications;
```

## [Laravel and the Front-end](https://laracasts.com/series/laravel-from-scratch-2018/episodes/34)

> Let's take a break from PHP, and switch over to our recommended front-end workflow within a Laravel app. 
We'll do a crash-course on webpack, Laravel Mix, compiling CSS, and debugging your Vue components.

### Note

```bash
npm run dev
npm run production
npm run watch
```

### Reference

- [Laracasts: Learn Vue 2: Step By Step](https://laracasts.com/series/learn-vue-2-step-by-step)

- [Laracasts: Learn Laravel Mix](https://laracasts.com/series/learn-laravel-mix)

- [Vue.js devtools](https://chrome.google.com/webstore/detail/vuejs-devtools/nhdogjmejiglipccpnnnanhbledajbpd?hl=en)

## [Collection Essentials](https://laracasts.com/series/laravel-from-scratch-2018/episodes/35)

> We should take some time to review Laravel collections. 
You'll receive and reach for these constantly as you construct your app. 
Not only will Eloquent queries return collection instances, 
but you can also create your own custom collections with ease. 
Let's review the 80% essentials in this episode.

### Note

```php
$users = App\User::all();
$users->map(function ($user) {
    return $user->name;
});

$users->pluck('name');

$users->filter(function ($user) {
    return $user->id >= 3;
});

collect(['foo', 'bar', 'baz']);

$users->sum('id');
$users->filter->email_verified_at;
$users->filter->isVerified(); 
```

## [Sessions and Flash Messaging](https://laracasts.com/series/laravel-from-scratch-2018/episodes/36)

> Because the web is stateless, 
we can use sessions as a mechanism for recording important user information from page to page. 
In this lesson, we'll review the basic sessions API and flash messaging. 
Finally, for extra credit, we'll review how to make Composer autoload a `helpers.php` file 
that contains useful helper functions for our application.

### Note

```php
session(['name' => 'JohnDoe']);
session('name');
session('foobar', 'A default');
session()->forget('name');
session()->flash('message', 'Your project has been created.');
```

> composer.json

```json
"autoload": {
    "psr-4": {
        "App\\": "app/"
    },
    "classmap": [
        "database/seeds",
        "database/factories"
    ],
    "files": ["app/helpers.php"]
}
```

```bash
composer dump-autoload
```

## [Laravel Testing Crash Course](https://laracasts.com/series/laravel-from-scratch-2018/episodes/37)

> Let's finish up this series with a crash-course in testing Laravel applications with TDD. 
Using the example of "teams," 
we'll review two different forms of testing: feature and unit.

### Note

> `.env.testing`

```bash
php artisan make:test TeamsTest
php artisan make:test UsersTest --unit
```

```php
<?php
/** @test */
public function test_a_user_can_create_a_team()
{
    $this->withoutExceptionHandling();

    // Given I am a user who is logged in
    $this->actingAs(factory('App\User')->create());
    $attributes = ['name' => 'Acme'];

    // When they hit the endpoint /teams to create a new team, while passing the necessary data.
    $this->post('/teams', $attributes);

    // Then there should be a new in the database.
    $this->assertDatabaseHas('teams', $attributes);
}
```

```xml
<!-- phpunit.xml -->
<env name="DB_DATABASE" value=":memory:"/>
```

## [The Next Steps](https://laracasts.com/series/laravel-from-scratch-2018/episodes/38)

> All good things must come to an end, including "Laravel From Scratch." 
Though we've covered a massive amount of material in this series, 
naturally, there's a great deal more to review. 
That's why your next step should be [Build a Laravel App With TDD](https://laracasts.com/series/build-a-laravel-app-with-tdd). 
In this series, we'll take the skills you've learned, 
and put them to good use constructing a real-world application from scratch.

> Otherwise, if you'd like to review other pieces of the Laravel ecosystem,
 here's what we recommend next: [Learn Laravel Forge](https://laracasts.com/series/learn-laravel-forge), [Learn Vue 2: Step By Step](https://laracasts.com/series/learn-vue-2-step-by-step), [Learn Laravel Mix](https://laracasts.com/series/learn-laravel-mix), 
 and [Testing Laravel](https://laracasts.com/series/phpunit-testing-in-laravel).
