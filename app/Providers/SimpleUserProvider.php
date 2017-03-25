<?php

namespace App\Providers;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\User as UserContract;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Auth;

class SimpleUserProvider extends ServiceProvider implements UserProvider {

    protected $user;

    public function __construct($credentials)
    {
        $this->user = $credentials;
    }

    /**
     * Bootstrap the application services.
     *
     * @param \Illuminate\Contracts\Cache\Factory $cache
     * @param \App\Setting                        $settings
     *
     * @return void
     */
    public function boot()
    {
      Auth::provider('simple', function()
      {
         $this->user = new User;
         $this->user->username = config('settings.username');
         $this->user->password = config("settings.password");
         $this->user->id = 1;
         return new SimpleUserProvider($this->user);
      });
    }

    // If you only need to login via credentials the following 3 methods
    // don't need to be implemented, they just need to be defined
    public function retrieveById($identifier) {
      if($identifier==1){
        return $this->user;
      }
    }
    public function retrieveByToken($identifier, $token) { }
    public function updateRememberToken(Authenticatable $user, $token) { }
    public function isDeferred() { }
    public function register() { }

    public function retrieveByCredentials(array $credentials)
    {
        return $this->user;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return strtolower($credentials['username']) == strtolower($user->username) && $credentials['password'] == $user->password;
    }

}
