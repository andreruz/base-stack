<?php

namespace App\Http\Controllers;

use App\Models\Padlock;
use App\Models\PadlockType;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PadlockController extends Controller
{
    public function index()
    {
        return Inertia::render('Padlock/Index', [
            'padlocks' => Padlock::all(),
        ]);
    }

    public function store()
    {
        Padlock::create(
            Request::validate([
                'name' => ['required', 'max:200'],
                'padlock_type_id' => ['nullable'],
            ])
        );

        return Redirect::route('padlock.index');
    }

    public function create()
    {
        return Inertia::render('Padlock/Create', [
            'padlock_types' => PadlockType::all(),
        ]);
    }

    public function edit(Padlock $padlock)
    {
        return Inertia::render('Padlock/Edit', [
            'padlock' => [
                'id' => $padlock->id,
                'name' => $padlock->name,
                'price' => $padlock->price,
                'qty' => $padlock->qty,
                'padlock_type_id' => $padlock->padlock_type_id,
                'deleted_at' => $padlock->deleted_at,
            ],
            'padlock_types' => PadlockType::all(),
        ]);
    }

    public function update(Padlock $padlock)
    {
        $padlock->update(
            Request::validate([
                'name' => ['required', 'max:255'],
                'price' => ['nullable'],
                'qty' => ['nullable'],
                'padlock_type_id' => ['nullable'],
            ])
        );

        return Redirect::route('padlock.index')->with('success', 'Padlock updated.');
    }

    public function destroy(Padlock $padlock)
    {
        $padlock->delete();

        return Redirect::route('padlock.index')->with('success', 'Padlock deleted.');
        //return Redirect::back()->with('success', 'Padlock deleted.');
    }

    public function restore(Padlock $padlock)
    {
        $padlock->restore();

        return Redirect::route('padlock.index')->with('success', 'Padlock updated.');
    }
}
