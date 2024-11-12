<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
</head>
<body>
    <h1>Tableau de Bord de l'Administration</h1>
    
    <div class="stats">
        <div class="stat-card">
            <h3>Nombre Total de Chambres</h3>
            <p><?= esc($totalChambres); ?></p>
        </div>
        <div class="stat-card">
            <h3>Nombre Total de Réservations</h3>
            <p><?= esc($totalReservations); ?></p>
        </div>
        <div class="stat-card">
            <h3>Nombre Total de Clients</h3>
            <p><?= esc($totalClients); ?></p>
        </div>
    </div>

    <h2>Réservations Récentes</h2>
    <table>
        <thead>
            <tr>
                <th>ID Réservation</th>
                <th>Client</th>
                <th>Chambre</th>
                <th>Date de Réservation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservationsRecents as $reservation): ?>
                <tr>
                    <td><?= esc($reservation['id']); ?></td>
                    <td><?= esc($reservation['client_id']); ?></td>
                    <td><?= esc($reservation['chambre_id']); ?></td>
                    <td><?= esc($reservation['created_at']); ?></td> 
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

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
