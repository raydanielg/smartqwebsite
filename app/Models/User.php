<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Role Relationships
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Check if user has specific role
    public function hasRole($roleName)
    {
        return $this->roles()->where('name', $roleName)->exists();
    }

    // Check if user has any of the given roles
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return $this->roles()->whereIn('name', $roles)->exists();
        }
        return $this->hasRole($roles);
    }

    // Check if user has permission through roles
    public function hasPermission($permissionName)
    {
        foreach ($this->roles as $role) {
            if ($role->permissions()->where('name', $permissionName)->exists()) {
                return true;
            }
        }
        return false;
    }

    // Assign role to user
    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }
        $this->roles()->syncWithoutDetaching($role);
    }

    // Remove role from user
    public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('name', $role)->firstOrFail();
        }
        $this->roles()->detach($role);
    }

    // Get user's highest level role
    public function highestRole()
    {
        return $this->roles()->orderBy('level', 'desc')->first();
    }

    // Check if superadmin
    public function isSuperAdmin()
    {
        return $this->hasRole('superadmin');
    }

    // Check if admin or higher
    public function isAdmin()
    {
        return $this->hasAnyRole(['superadmin', 'admin']);
    }

    // Check if seller
    public function isSeller()
    {
        return $this->hasRole('seller');
    }

    // Check if manufacturer
    public function isManufacturer()
    {
        return $this->hasRole('manufacturer');
    }

    // Get dashboard route based on role
    public function getDashboardRoute()
    {
        if ($this->isSuperAdmin()) {
            return route('admin.super.dashboard');
        } elseif ($this->isAdmin()) {
            return route('admin.dashboard');
        } elseif ($this->isSeller()) {
            return route('seller.dashboard');
        } elseif ($this->isManufacturer()) {
            return route('manufacturer.dashboard');
        }
        return route('buyer.dashboard');
    }
}
