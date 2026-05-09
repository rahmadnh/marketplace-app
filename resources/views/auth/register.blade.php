@extends('layouts.app') <!-- Memanggil cetakan utama -->

@section('content') <!-- Isi yang akan dimasukkan ke @yield('content') -->
    <h2>Register</h2>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required><br><br>
        <input type="email" name="email" placeholder="Email Address" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit">Register Account</button>
    </form>
    
    <p>Already have an account? <a href="/login">Login here</a></p>
@endsection