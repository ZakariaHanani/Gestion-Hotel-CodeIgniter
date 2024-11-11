<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Add styles and scripts here -->
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <p>Welcome to the hotel management system</p>
    </header>

    <section id="overview">
        <h2>Overview</h2>
        <div>
            <p>Total Reservations: <?= $totalReservations ?></p>
            <p>Available Rooms: <?= $availableRooms ?></p>
            <p>Total Revenue: <?= $totalRevenue ?></p>
            <p>Pending Payments: <?= $pendingPayments ?></p>
        </div>
    </section>

    <section id="navigation">
        <h2>Navigation</h2>
        <nav>
            <a href="/admin/reservations">Manage Reservations</a>
            <a href="/admin/chambres">Manage Rooms</a>
            <a href="/admin/client">Manage Clients</a>
            <a href="/admin/payments">Manage Payments</a>
            <a href="/admin/reports">View Reports</a>
        </nav>
    </section>

    <footer>
        <a href="/admin/logout">Logout</a>
    </footer>
</body>
</html>
