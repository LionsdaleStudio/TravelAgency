<?php

namespace App\Policies;

use App\Models\Journey;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JourneyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Journey $journey): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->role == "ContentCreator") {
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Journey $journey): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Journey $journey): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Journey $journey): bool
    {
        /* Saját engedélyezés (pl.: saját komment vagy saját profil) */
        //Amenniyben a journey user_id ugyanaz, mint a user-id, engedve van a restore parancs
        //return $user->id === $journey->user_id;
        return false;

    }

    public function showTrashed(User $user)
    {
        //Általános engedélyezés (jelenleg a before miatt ez felesleges ide)
        if ($user->role == "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Journey $journey): bool
    {
        return false;
    }

    public function before(User $user)
    {
        if ($user->role == "admin") {
            return true;
        } else {
            return null; //Ha nem adok vissza mást, csak null értéket, akkor fog a többi szabály vizsgálódni
        }
    }
}
