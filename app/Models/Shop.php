<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait Shop
{
    /**
     * Get all of the redirectRules for the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function redirectRules(): HasMany
    {
        return $this->hasMany(RedirectRules::class);
    }

    /**
     * Get the user associated with the Shop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function geoBlocker(): HasOne
    {
        return $this->hasOne(GeoBlocker::class);
    }

    public function previews(): HasOne
    {
        return $this->hasOne(Previews::class);
    }
}
