@extends('layouts.app')

@section('content')
    <div class="rounded-3xl border border-slate-200 bg-white p-10 shadow-sm">
        <h1 class="text-2xl font-semibold text-slate-900">{{ $heading }}</h1>
        <p class="mt-4 text-slate-600">This page provides information and resources related to {{ strtolower($heading) }}.</p>

        @if($topic === 'adhd')
            <div class="mt-6 space-y-4 text-slate-700">
                <p>ADHD can affect attention, impulse control, and energy levels. Many users find structure and professional support helpful.</p>
                <p>Our psychologists offer assessments, coaching, and tailored sessions to help manage symptoms.</p>
            </div>
        @elseif($topic === 'autism')
            <div class="mt-6 space-y-4 text-slate-700">
                <p>Autism-related support focuses on communication, sensory processing, and daily routines.</p>
                <p>Book a session with a psychologist who understands neurodiversity and individual strengths.</p>
            </div>
        @else
            <div class="mt-6 space-y-4 text-slate-700">
                <p>Anxiety support can include coping strategies, relaxation techniques, and guided therapy.</p>
                <p>Our booking platform lets you connect with psychologists offering availability that fits your schedule.</p>
            </div>
        @endif
    </div>
@endsection
