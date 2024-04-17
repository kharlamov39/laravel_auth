<x-layout>
    <div>
        <h2>Регистрация</h2>
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
        
            <div>
                <label for="name">Имя</label> <br>
                <input type="text" name="name" id="name" required value="{{ old('name') }}">
            </div>
        
            <div>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" required value="{{ old('email') }}">
            </div>
        
            <div>
                <label for="password">Пароль</label><br>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="password">Подтверждение пароля</label><br>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
        
            <div style="margin-top: 20px;">
                <button type="submit">Зарегистрироваться</button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-layout>
