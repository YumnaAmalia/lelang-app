<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <title>Dashboard</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #e9e6e2;
        }

        .layout {
            display: flex;
        }

        /* SIDEBAR */
        .sidebar{
            width:260px;
            height:100vh;
            position:fixed;
            background:linear-gradient(180deg,#171717,#222);
            padding:20px 14px;
            overflow-y:auto;
        }

        /* LOGO */
        .sidebar-logo{
            display:flex;
            align-items:center;
            gap:14px;
            text-decoration:none;
            margin-bottom:30px;
            padding:10px;
            border-radius:14px;
            transition:.2s;
        }

        .sidebar-logo:hover{
            background:rgba(255,255,255,0.05);
        }

        .logo-icon{
            width:52px;
            height:52px;
            border-radius:14px;
            background:linear-gradient(135deg,#F2C94C,#D4A62A);
            display:flex;
            align-items:center;
            justify-content:center;
            color:black;
            font-size:24px;
        }

        .sidebar-logo h2{
            margin:0;
            color:white;
            font-size:18px;
        }

        .sidebar-logo small{
            color:#999;
        }

        /* MENU */
        .sidebar-menu{
            display:flex;
            flex-direction:column;
            gap:8px;
        }

        /* MENU ITEM */
        .menu-item{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:12px 14px;
            border-radius:12px;
            color:#ddd;
            cursor:pointer;
            transition:.2s;
        }

        .menu-item:hover{
            background:rgba(255,255,255,0.06);
            color:#F2C94C;
        }

        .menu-left{
            display:flex;
            align-items:center;
            gap:10px;
        }

        /* ACTIVE */
        .active-year{
            background:rgba(242,201,76,0.12);
            color:#F2C94C;
        }

        /* DROPDOWN */
        .dropdown{
            display:none;
            margin-left:10px;
            margin-bottom:8px;
        }

        /* DROPDOWN ITEM */
        .dropdown-item{
            display:flex;
            align-items:center;
            gap:8px;
            padding:10px 12px;
            border-radius:10px;
            text-decoration:none;
            color:#aaa;
            font-size:14px;
            transition:.2s;
        }

        .dropdown-item:hover{
            background:rgba(255,255,255,0.05);
            color:#F2C94C;
        }

        /* ADMIN */
        .admin-box{
            position:absolute;
            bottom:20px;
            left:14px;
            right:14px;
            background:rgba(255,255,255,0.05);
            border-radius:16px;
            padding:14px;
            cursor:pointer;
        }

        .admin-info{
            display:flex;
            align-items:center;
            gap:12px;
            color:white;
        }

        .avatar{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#F2C94C;
            display:flex;
            align-items:center;
            justify-content:center;
            color:black;
            font-size:20px;
        }

        .admin-text{
            flex:1;
        }

        .admin-text small{
            color:#aaa;
        }

        /* ADMIN DROPDOWN */
        .admin-dropdown{
            display:none;
            position:absolute;
            bottom:95px;
            left:14px;
            right:14px;
            background:#2a2a2a;
            border-radius:14px;
            padding:10px;
        }

        .admin-dropdown button{
            width:100%;
            border:none;
            background:#F2C94C;
            padding:12px;
            border-radius:10px;
            cursor:pointer;
            font-weight:600;
        }



        /* MAIN */
        .main {
            margin-left: 260px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        /* NAVBAR */
        .navbar {
            background: linear-gradient(135deg, #1c1c1c, #2a2a2a);
            color: white;
            padding: 5px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .navbar h2 {
            margin: 0;
            font-size: 20px;
        }

        .navbar p {
            margin-top: 5px;
            color: #bbb;
        }

        /* TOPBAR */
        .topbar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 10px;
        }

        .search {
            padding: 10px 14px;
            border-radius: 10px;
            border: 1px solid #ddd;
            width: 260px;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-primary {
            background: linear-gradient(180deg, #F2C94C, #E0B93F);
        }

        .btn-secondary {
            background: #e0dedb;
        }

        .btn-detail {
            background: #2f2f2f;
            color: white;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        /* CARD */
        .card {
            background: #ffffff;
            margin: 10px;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            font-weight: 600;
        }

        td {
            border-top: 1px solid #eee;
        }
        .action-cell {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            min-width: 180px;
        }

        tr:hover {
            background: #faf9f6;
        }

        /* FOOTER */
        .footer {
            background: #1a1a1a;
            color: #E7C873;
            text-align: center;
            padding: 12px;
            border-top: 2px solid #E7C873;
            margin-top: auto;
        }


    </style>

    <script>
        function toggleDropdown(id){
            let el = document.getElementById(id);
            el.style.display = el.style.display === 'block' ? 'none' : 'block';
        }
        document.querySelectorAll('.year').forEach(el=>{

            el.addEventListener('click', function(){

                document.querySelectorAll('.year')
                    .forEach(y=>y.classList.remove('active'));

                this.classList.add('active');

            });

        });
    </script>

    @yield('styles')

</head>

<body>

<div class="layout">

<!-- SIDEBAR -->
    <div class="sidebar">

        <!-- LOGO -->
        <a href="/cases" class="sidebar-logo">
            <div class="logo-icon">
                <i class="bi bi-bank2"></i>
            </div>

            <div>
                <h2>SIADEL</h2>
                <small>Administrasi Lelang</small>
            </div>
        </a>

        @php
        $grouped = $cases->groupBy(fn($c) => \Carbon\Carbon::parse($c->tanggal_putusan)->format('Y'));
        @endphp

        <!-- MENU -->
        <div class="sidebar-menu">

            <!-- SEMUA DATA -->
            <div class="menu-item active-year" onclick="filterYear('all')">
                <i class="bi bi-folder2-open"></i>
                <span>Semua Data</span>
            </div>

            <!-- TAHUN -->
            @foreach($grouped as $year => $items)

            <div 
                class="menu-item"
                onclick="filterYear('{{ $year }}'); toggleDropdown('y{{ $year }}')"
            >
                <div class="menu-left">
                    <i class="bi bi-calendar3"></i>
                    <span>{{ $year }}</span>
                </div>

                <i class="bi bi-chevron-down"></i>
            </div>

            <!-- DROPDOWN -->
            <div class="dropdown" id="y{{ $year }}">

                @foreach($items as $c)

                <a href="/cases/{{ $c->id }}" class="dropdown-item">
                    <i class="bi bi-dot"></i>
                    {{ $c->nama_terpidana }}
                </a>

                @endforeach

            </div>

            @endforeach

        </div>

        <!-- ADMIN -->
        <div class="admin-box" onclick="toggleAdmin()">

            <div class="admin-info">

                <div class="avatar">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div class="admin-text">
                    <b>Administrator</b>
                    <small>Super Admin</small>
                </div>

                <i class="bi bi-chevron-up"></i>

            </div>

        </div>

        <!-- DROPDOWN ADMIN -->
        <div class="admin-dropdown" id="adminMenu">

            <form method="POST" action="/logout">
                @csrf

                <button type="submit">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>

            </form>

        </div>

    </div>

    <!-- MAIN -->
    <div class="main">
        <div class="content">

            <!-- NAVBAR -->
           <div class="navbar">
                <h2>@yield('title')</h2>
                <p>@yield('subtitle')</p>
            </div>

            <!-- TOPBAR -->
            @yield('topbar')

            <!-- CONTENT -->
            @yield('content')

        </div>

        <!-- FOOTER -->
        <div class="footer">
            © {{ date('Y') }} Sistem Informasi Administrasi Lelang
        </div>

    </div>

</div>

@yield('scripts')

</body>
</html>