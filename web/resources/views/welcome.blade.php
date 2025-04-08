<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'AEYIA') }}</title>
    <!-- Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #212025;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .header {
            padding: 40px 0;
        }
        .logo {
            max-width: 400px;
            height: auto;
            margin-bottom: 30px;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #212025;
        }
        .subtitle {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #666;
        }
        .coming-soon {
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 40px;
        }
        .feature-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin: 40px 0;
        }
        .feature {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            width: 300px;
            text-align: left;
        }
        .feature h3 {
            color: #212025;
            margin-top: 0;
        }
        .footer {
            margin-top: 50px;
            padding: 20px 0;
            border-top: 1px solid #ddd;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <header style="display: flex; justify-content: flex-end; padding: 20px 0;">
            @if (Route::has('login'))
                <nav style="display: flex; gap: 16px;">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            style="display: inline-block; padding: 8px 20px; border: 1px solid #212025; border-radius: 4px; text-decoration: none; color: #212025; font-size: 14px; transition: all 0.2s;"
                            onmouseover="this.style.backgroundColor='#f0f0f0'"
                            onmouseout="this.style.backgroundColor='transparent'"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            style="display: inline-block; padding: 8px 20px; border: 1px solid transparent; border-radius: 4px; text-decoration: none; color: #212025; font-size: 14px; transition: all 0.2s;"
                            onmouseover="this.style.border='1px solid #212025'; this.style.backgroundColor='#f0f0f0'"
                            onmouseout="this.style.border='1px solid transparent'; this.style.backgroundColor='transparent'"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                style="display: inline-block; padding: 8px 20px; border: 1px solid #212025; border-radius: 4px; text-decoration: none; color: #212025; font-size: 14px; transition: all 0.2s;"
                                onmouseover="this.style.backgroundColor='#f0f0f0'"
                                onmouseout="this.style.backgroundColor='transparent'"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        
        <div class="header">
            <img src="{{ asset('images/aeyia-logo.png') }}" alt="AEYIA" class="logo">
            <h1>Coming Soon</h1>
            <p class="subtitle">We're building a new platform to transform wellness management</p>
        </div>

        <div class="coming-soon">
            <h2>KURA Platform</h2>
            <p>Our comprehensive wellness platform is currently under development.</p>
            <p>Designed to connect practitioners with clients and streamline the wellness journey.</p>
        </div>

        <div class="feature-list">
            <div class="feature">
                <h3>Appointment Management</h3>
                <p>Seamless scheduling, reminders, and calendar integration for both practitioners and clients.</p>
            </div>
            <div class="feature">
                <h3>Client Portal</h3>
                <p>Secure access to treatment plans, progress tracking, and communication with practitioners.</p>
            </div>
            <div class="feature">
                <h3>Practitioner Dashboard</h3>
                <p>Comprehensive tools for managing clients, appointments, and business operations.</p>
            </div>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} AEYIA. All rights reserved.</p>
            <p>6/7 Grevillea Street, Byron Bay</p>
        </div>
    </div>
</body>
</html>