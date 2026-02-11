<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <h1>{{Auth::user()->name}}</h1>
 <form action="{{ route('finance') }}" method="POST">
        @csrf

        <h1>Registration</h1>

        <label for="money">Money:</label>
        <input 
            type="number"
            name="money"
            step="0.01"
            min="0"
            required
        >

        <label for="description">Description:</label>
        <input 
            type="text"
            name="description"
        >

        <input type="radio" name="choice" value="+" required>+<br>
        <input type="radio" name="choice" value="-" required>-<br>

        <button type="submit">Submit</button>
    </form>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>