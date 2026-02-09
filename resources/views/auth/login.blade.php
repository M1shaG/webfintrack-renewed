<div>
    <form action="{{ route('login') }}" method="POST">
    @csrf
        <h1>Login</h1>

        <label for="name">Name:</label>
        <input 
            type="text"
            name="name"
            required
            value="{{  old('name') }}"
        >

        <label for="password">Password:</label>
        <input 
            type="password"
            name="password"
            required
        >

        <button type="submit" class="btn mt-4">Login</button>
    </form>
</div>
