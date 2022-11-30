<?php

namespace App\Http\Controllers;

use App\Models\PadlockType;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class PadlockTypeController extends Controller
{
    public function index()
    {
        return Inertia::render('PadlockType/Index', [
            'padlock_types' => PadlockType::all(),
        ]);
    }

    public function store()
    {
        PadlockType::create(
            Request::validate([
                'name' => ['required', 'max:200'],
                'description' => ['max:200'],
                'max_chars' => ['max:2'],
            ])
        );

        return Redirect::route('padlockType.index');
    }

    public function create()
    {
        return Inertia::render('PadlockType/Create', [
        ]);
    }

    public function edit(PadlockType $padlockType)
    {
//        dd('entrou edit');
        return Inertia::render('PadlockType/Edit', [
            'padlock_type' => [
                'id' => $padlockType->id,
                'name' => $padlockType->name,
                'description' => $padlockType->description,
                'max_chars' => $padlockType->max_chars,
                'deleted_at' => $padlockType->deleted_at,
            ],
        ]);
    }

    public function update(PadlockType $padlockType)
    {
        $padlockType->update(
            Request::validate([
                'name' => ['required', 'max:255'],
                'description' => ['nullable', 'max:255'],
                'max_chars' => ['nullable', 'max:2'],
            ])
        );

        return Redirect::route('padlockType.index')->with('success', 'PadlockType updated.');
    }

    public function destroy(PadlockType $padlockType)
    {
        $padlockType->delete();

        return Redirect::route('padlockType.index')->with('success', 'PadlockType deleted.');
        //return Redirect::back()->with('success', 'PadlockType deleted.');
    }

    public function restore(PadlockType $padlockType)
    {
        $padlockType->restore();

        return Redirect::route('padlockType.index')->with('success', 'PadlockType updated.');
    }
}
