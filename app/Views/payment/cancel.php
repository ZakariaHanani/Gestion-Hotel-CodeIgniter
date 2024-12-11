<?= $this->extend('Client\home') ?>
<?= $this->section('contents') ?>

<div class="container text-center p-5 m-5" >
    <h2 class="text-danger">Réservation annulée</h2>
    <p class="text-muted">
        Le paiement a été annulé. Vous pouvez essayer de nouveau plus tard.
    </p>
    <div class="mt-4">
        <a href="<?= base_url('/') ?>" class="btn btn-secondary btn-lg">
            Retour à l'accueil
        </a>
    </div>
</div>

<?= $this->endSection() ?>
