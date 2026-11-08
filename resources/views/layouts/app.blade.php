
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS System')</title>

    <style>
      
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: Arial, sans-serif;
    color: #2e2142;
    background: linear-gradient(
        135deg,
        #f5edff 0%,
        #e9d5ff 45%,
        #f8f5ff 100%
    );
    min-height: 100vh;
}

header {
    background: linear-gradient(
        110deg,
        #3b0764 0%,
        #6d28d9 50%,
        #a855f7 100%
    );
    color: white;
    padding: 24px 8%;
    box-shadow: 0 5px 20px rgba(91, 33, 182, 0.25);
}

header h1 {
    margin: 0 0 18px;
    font-size: 28px;
    letter-spacing: 0.5px;
}

nav {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

nav a {
    color: #ffffff;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 10px;
    transition: background 0.25s, transform 0.25s;
}

nav a:hover {
    background: rgba(255, 255, 255, 0.18);
    transform: translateY(-2px);
}

main {
    max-width: 1100px;
    width: 90%;
    margin: 35px auto;
    padding: 30px;
    background: rgba(255, 255, 255, 0.94);
    border: 1px solid #e9d5ff;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(76, 29, 149, 0.12);
}

h2 {
    color: #6d28d9;
    font-size: 28px;
    margin-top: 0;
}

h3 {
    color: #7e22ce;
}

p, li {
    line-height: 1.7;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 22px;
    overflow: hidden;
    border-radius: 10px;
}

th, td {
    border: 1px solid #e9ddf7;
    padding: 13px;
    text-align: left;
}

th {
    color: white;
    background: linear-gradient(
        100deg,
        #6d28d9,
        #9333ea
    );
}

tbody tr:nth-child(even) {
    background: #f7f1ff;
}

tbody tr:hover {
    background: #eee3ff;
}

footer {
    text-align: center;
    padding: 22px;
    color: #6b5a80;
}

@media (max-width: 650px) {
    header {
        padding: 22px 5%;
    }

    header h1 {
        font-size: 23px;
    }

    nav {
        gap: 6px;
    }

    nav a {
        padding: 9px 10px;
        font-size: 14px;
    }

    main {
        width: 94%;
        padding: 18px;
        overflow-x: auto;
    }

    table {
        min-width: 600px;
    }
}

    </style>
</head>
<body>

    <header>
        <h1>POS Management System</h1>

        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('customers.index') }}">Customer Accounts</a>
            <a href="{{ route('users.index') }}">User Accounts</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>IT0049 - Web System Technologies | Laravel POS</p>
    </footer>

</body>
</html>
