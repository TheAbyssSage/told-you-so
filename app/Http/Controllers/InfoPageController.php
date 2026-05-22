<?php

namespace App\Http\Controllers;

class InfoPageController extends Controller
{
    public function show(string $topic)
    {
        $topics = [
            'adhd' => 'ADHD',
            'autism' => 'Autism',
            'angst' => 'Angst',
        ];

        if (! array_key_exists($topic, $topics)) {
            abort(404);
        }

        return view('info.show', [
            'topic' => $topic,
            'heading' => $topics[$topic],
        ]);
    }
}
