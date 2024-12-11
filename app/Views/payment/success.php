<?= $this->extend('Client\home') ?>
<?= $this->section('contents') ?>

<div class="d-flex flex-column align-items-center text-center p-5 m-4" style="font-family: Arial, sans-serif;">
    <h2 class="text-success mb-3 mt-5" style="font-size: 24px;">Réservation réussie !</h2>
    <p class="text-muted mt-5" style="font-size: 18px;">
        Merci pour votre paiement. Votre réservation a été confirmée.
    </p>
    <a href="<?= base_url('/') ?>" class="btn btn-success btn-lg mt-3 ">
        Retour à l'accueil
    </a>
</div>

<?= $this->endSection() ?>
