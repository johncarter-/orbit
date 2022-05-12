<?php

namespace Orbit\Tests\Seeder;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;
use Orbit\Contracts\IsOrbital;
use Orbit\OrbitOptions;

class TestModel extends Model implements IsOrbital
{
    use Orbital;

    protected $guarded = [];

    protected $casts = [
        'published' => 'bool',
    ];

    public static function schema(Blueprint $table): void
    {
        $table->id();
        $table->string('title');
        $table->boolean('published')->default(false);
    }

    public static function getOrbitOptions(): OrbitOptions
    {
        return OrbitOptions::make()
            ->source(__DIR__ . '/content');
    }
}
