# Role & Permission

## Installation

* `composer require spatie/laravel-permission`
* 加入 provider

```
// config/app.php
'providers' => [
    ...
    Spatie\Permission\PermissionServiceProvider::class,
];
```

* 執行 `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"`
* `php artisan migrate` 了解一下 table 結構
* (optional) `php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"`
* 看看 `config/laravel-permission.php` 可以設定些什麼
* 加 `use HasRoles;` 到 `User` Model，了解一下有哪些 method 和 relation
* 透過 seeder 建立 Roles & Permissions，並給予 User 一些 role 和 permission

## Middleware

* `php artisan make:middleware RoleMiddleware`

```
    public function handle($request, Closure $next, $roles)
    {
        $user = $request->user();
        $roles = explode('|', $roles);

        if ($user && $user->hasRole($roles)) {
            return $next($request);
        }

        return abort(403, "You are not authorized to do it.");
    }
```
