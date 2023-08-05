<?php

namespace App\Traits;

use App\Models\Karyawan;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Str;

trait HasPermissionsTrait
{

    public function givePermissionsTo(...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);
        if ($permissions === null) {
            return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }

    public function withdrawPermissionsTo(...$permissions)
    {

        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    }

    public function refreshPermissions(...$permissions)
    {

        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission)
    {

        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission)
    {

        foreach ($permission->role as $role) {
            if ($this->role->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles)
    {

        foreach ($roles as $role) {
            if ($this->role->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }

    public function role()
    {

        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    protected function hasPermission($permission)
    {

        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function getAllPermissions(array $permissions)
    {

        return Permission::whereIn('slug', $permissions)->get();
    }
    public function getSlugAttribute()
    {
        return $this->permissions()->get();
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = $value;
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // has one karyawan
    public function hasKaryawan()
    {
        return $this->hasOne(Karyawan::class, 'user_id');
    }

    public function getCabangIdAttribute()
    {
        if ($this->hasKaryawan) {
            return $this->hasKaryawan->cabang_id;
        }
    }

    // get nama cabang

    public function getCabangAttribute()
    {
        if ($this->hasKaryawan) {
            return $this->hasKaryawan->cabang;
        }
    }

    // get jabatan id dari karyawan
    public function getJabatanIdAttribute()
    {
        if ($this->hasKaryawan) {
            return $this->hasKaryawan->jabatan_id;
        }
    }

    // get nama jabatan dari karyawan
    public function getJabatanAttribute()
    {
        if ($this->hasKaryawan) {
            return $this->hasKaryawan->jabatan;
        }
    }
}
