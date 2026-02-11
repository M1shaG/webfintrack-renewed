<div>
    <div>
    <form action="{{ route('registration') }}" method="POST">
        @csrf

        <h1>Registration</h1>

        <label for="name">Name:</label>
        <input 
            type="text"
            name="name"
            required
            value="{{  old('name') }}"
        >

        <label for="email">Email:</label>
        <input 
            type="text"
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

        <label for="password_confirmation">Repeat Password:</label>
        <input 
            type="password"
            name="password_confirmation"
            required
        >

        <label for="money">Initial Balance:</label>
        <input 
            type="number"
            name="balance"
            step="0.01"
            min="0"
            required
        >

        <button type="submit" class="btn mt-4">Registration</button>
    </form>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

</div>
