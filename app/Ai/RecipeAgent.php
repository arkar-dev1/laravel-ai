<?php

namespace App\Ai;

use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Promptable;
use Stringable;

class RecipeAgent implements Agent, Conversational
{
    use Promptable;

    public function instructions(): Stringable|string
    {
        return <<<'TEXT'
You are a recipe assistant.
Given a food item from the user, return one practical recipe.

Rules:
- Start with a short description.
- Include an "Ingredients" section with bullet points and approximate quantities.
- Include a "Steps" section with numbered instructions.
- Include an optional "Tips" section.
- Keep it concise and beginner-friendly.
TEXT;
    }

    public function messages(): iterable
    {
        return [];
    }
}
