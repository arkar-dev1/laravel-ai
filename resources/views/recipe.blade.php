<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Agent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 24px;
        }
        .container {
            max-width: 760px;
            margin: 0 auto;
            background: #fff;
            border-radius: 10px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        }
        h1 {
            margin-top: 0;
        }
        form {
            display: flex;
            gap: 10px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }
        input[type="text"] {
            flex: 1;
            min-width: 260px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            background: #0f766e;
            color: #fff;
            cursor: pointer;
        }
        .error {
            color: #b91c1c;
            margin-bottom: 12px;
        }
        .recipe {
            white-space: pre-wrap;
            line-height: 1.5;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 14px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Recipe Agent</h1>
    <p>Enter a food item, and the AI agent will generate a recipe.</p>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('recipe.generate') }}">
        @csrf
        <input type="text" name="item" value="{{ old('item', $item ?? '') }}" placeholder="e.g. chicken biryani" required>
        <button type="submit">Generate Recipe</button>
    </form>

    @isset($recipe)
        <h2>Recipe for {{ $item }}</h2>
        <div class="recipe">{{ $recipe }}</div>
    @endisset
</div>
</body>
</html>
