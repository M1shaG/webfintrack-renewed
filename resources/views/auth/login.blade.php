<div>
    <form action="{{ route('login') }}" method="POST">
    @csrf
        <h1>Login</h1>

        <label for="email">Email:</label>
        <input 
            type="email"
            name="email"
            required
            value="{{  old('email') }}"
        >

        <label for="password">Password:</label>
        <input 
            type="password"
            name="password"
            required
        >

        <button type="submit" class="btn mt-4">Login</button>

        
    </form>

        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
