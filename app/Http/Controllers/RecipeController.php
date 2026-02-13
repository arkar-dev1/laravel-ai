<?php

namespace App\Http\Controllers;

use App\Ai\RecipeAgent;
use Illuminate\Http\Request;
use Throwable;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipe');
    }

    public function generate(Request $request)
    {
        $validated = $request->validate([
            'item' => ['required', 'string', 'max:120'],
        ]);

        $item = trim($validated['item']);

        try {
            $response = RecipeAgent::make()->prompt("Create a recipe for: {$item}");

            return view('recipe', [
                'item' => $item,
                'recipe' => (string) $response,
            ]);
        } catch (Throwable $exception) {
            return back()
                ->withInput()
                ->withErrors([
                    'item' => 'Could not generate recipe. Check OPENAI_API_KEY and try again.',
                ]);
        }
    }
}
