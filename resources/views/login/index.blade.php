<x-layout>
    <div>
        <h2>Вход</h2>
        <form method="POST" action="{{ route('login.store') }}">
            @csrf
               
            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required value="{{ old('email') }}">
                @error('email')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>
        
            <div>
                <label for="password">Пароль</label><br>
                <input type="password" name="password" id="password" required>
                @error('password')
                    <p style="color: red">{{ $message }}</p>
                @enderror
            </div>

            <div style="margin-top: 20px;">
                <button type="submit">Войти</button>
            </div>
        </form>
    </div>
</x-layout>
