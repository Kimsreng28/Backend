<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Job {
    public static function all(): array {
        return [
            [
                'id' => 1,
                'title' => 'Software Developer',
                'salary' => '100$',
            ],
            [
                'id' => 2,
                'title' => 'Frontend Developer',
                'salary' => '150$',
            ],
            [
                'id' => 3,
                'title' => 'Backend Developer',
                'salary' => '200$',
            ],
        ];
    }

    public static function find(int $id): array {
        $job = Arr::first(static::all(), fn ($job) => $job['id'] == $id);

        if (!$job) {
            abort(404);
        }

        return $job;
    }
}