<?= $this->extend('Client\home') ?>

<?= $this->section('contents') ?>
<div>
    <section class="hero d-flex align-items-center justify-content-center text-center">
        <div class="overlay"></div>
        <div class="content">

            <?php if (session()->has('validation')): ?>
                <p class="alert alert-danger"><?= session()->getFlashdata('validation') ?></p>
            <?php endif; ?>
            <?php if (session()->has('error')): ?>
                <div class="alert alert-danger"><?= session('error') ?></div>
            <?php endif; ?>
            <?php if (session()->has('success')): ?>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= esc(session('success')) ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>


            <h1>Bienvenue à l'Hôtel Luxe</h1>
            <p>Vivez une expérience inoubliable dans notre établissement de classe mondiale.</p>
            <a href="#services" class="btn btn-primary">Explorer Nos Services</a>
        </div>
    </section>


    <div class="row container-fluid row m-1 py-5" id="services">
        <h2 class="text-center mb-4">Nos Services</h2>
        <?php if (!empty($chambres) && is_array($chambres)): ?>
            <?php foreach ($chambres as $chambre): ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card shadow-sm h-100">
                        <div class="card-header bg-primary text-white text-center">
                            <h5 class="card-title mb-0">Chambre <?= esc($chambre['numero']) ?></h5>
                        </div>

                        <div id="carouselChambre<?= $chambre['id'] ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php if (!empty($chambre['images'])): ?>
                                    <?php foreach ($chambre['images'] as $index => $image): ?>
                                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                            <img src="<?= base_url($image['image_path']) ?>"
                                                 class="d-block w-100 rounded-bottom"
                                                 alt="Chambre <?= esc($chambre['numero']) ?>"
                                                 style="height: 250px; object-fit: cover;"
                                                 data-bs-toggle="modal" data-bs-target="#chambreModal"
                                                 data-id="<?= $chambre['id'] ?>"
                                                 data-numero="<?= esc($chambre['numero']) ?>"
                                                 data-description="<?= esc($chambre['description']) ?>"
                                                 data-prix="<?= esc($chambre['prix']) ?>"
                                                 data-image="<?= base_url($image['image_path']) ?>">
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="carousel-item active">
                                        <img src="<?= base_url('uploads/chambres/1732452776_81f18d8aa2449eef306c.jpg') ?>"
                                             class="d-block w-100 rounded-bottom"
                                             alt="Image par défaut"
                                             style="height: 250px; object-fit: cover;">
                                    </div>
                                <?php endif; ?>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselChambre<?= $chambre['id'] ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Précédent</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselChambre<?= $chambre['id'] ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Suivant</span>
                            </button>
                        </div>


                        <div class="card-body text-center">
                            <p class="mb-2"><strong>Prix :</strong> <?= esc($chambre['prix']) ?> MAD / nuit</p>
                            <button class="btn btn-primary w-100"
                                    data-bs-toggle="modal"
                                    data-bs-target="#reservationModal"
                                    data-id="<?= $chambre['id'] ?>"
                                    data-numero="<?= $chambre['numero'] ?>"
                                    data-prix="<?= $chambre['prix'] ?>">
                                Réserver Maintenant
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> Aucune chambre disponible pour le moment.
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="modal fade" id="chambreModal" tabindex="-1" aria-labelledby="chambreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg">

                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="chambreModalLabel">Détails de la Chambre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <h4 id="chambre_numero" class="text-center text-primary mb-3"></h4>
                    <img id="chambre_image" class="img-fluid rounded mb-4 shadow-lg" alt="Chambre"
                         style="height: 400px; object-fit: cover;">

                    <p id="chambre_description" class="text-muted"></p>
                    <p class="fw-bold">
                        <strong>Prix par nuit : </strong>
                        <span id="chambre_prix"></span> MAD
                    </p>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#reservationModal" data-bs-dismiss="modal"
                            data-id=""
                            data-numero=""
                            data-prix="">
                        Réserver Maintenant
                    </button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="<?= base_url('payment/createCheckoutSession') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="reservationModalLabel">Réserver une chambre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">

                        <input type="hidden" name="chambre_id" id="chambre_id" value="">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="date_debut" class="form-label">Date de début</label>
                                <input type="date" name="date_debut" id="date_debut" class="form-control"
                                       required min="<?= date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="date_fin" class="form-label">Date de fin</label>
                                <input type="date" name="date_fin" id="date_fin" class="form-control"
                                       required min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                            </div>
                        </div>

                        <div class="mt-4">
                            <p class="mb-1">
                                <strong>Chambre N° :</strong>
                                <span id="reservation_chambre_numero" class="text-primary fw-bold"></span>
                            </p>
                            <p>
                                <strong>Prix :</strong>
                                <span id="reservation_chambre_prix" class="fw-bold text-success"></span> MAD / nuit
                            </p>
                            <p><strong>Montant Total :</strong> <span id="montant_total">0</span> MAD</p>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-credit-card me-2"></i>Payer et Réserver
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container bg-light p-5 mt-5 mb-5" id="contact" style="max-width: 800px;">
        <h2 class="text-center mb-4 text-primary">Contactez-nous</h2>
        <form action="<?= base_url('contact/send') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-4">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom"
                       class="form-control <?= session('errors.nom') ? 'is-invalid' : '' ?>"
                       value="<?= (session()->get('logged_in')) ? session()->get('nom') : '' ?>" required
                       style="border-radius: 10px;">
                <?php if (session('errors.nom')): ?>
                    <div class="invalid-feedback"><?= esc(session('errors.nom')) ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                       value="<?= (session()->get('logged_in')) ? session()->get('email') : '' ?>" required
                       style="border-radius: 10px;">
                <?php if (session('errors.email')): ?>
                    <div class="invalid-feedback"><?= esc(session('errors.email')) ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="sujet" class="form-label">Sujet</label>
                <input type="text" name="sujet" id="sujet"
                       class="form-control <?= session('errors.sujet') ? 'is-invalid' : '' ?>"
                       value="<?= old('sujet') ?>" required
                       style="border-radius: 10px;">
                <?php if (session('errors.sujet')): ?>
                    <div class="invalid-feedback"><?= esc(session('errors.sujet')) ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <label for="message" class="form-label">Message</label>
                <textarea name="message" id="message" rows="5"
                          class="form-control <?= session('errors.message') ? 'is-invalid' : '' ?>"
                          required style="border-radius: 10px;"><?= old('message') ?></textarea>
                <?php if (session('errors.message')): ?>
                    <div class="invalid-feedback"><?= esc(session('errors.message')) ?></div>
                <?php endif; ?>
            </div>
            <div class="text-center">

            <button type="submit" class="btn btn-primary btn-lg " style="border-radius: 20px; padding: 12px;">Envoyer</button>
            </div>
        </form>
    </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chambreModal = document.getElementById('chambreModal');
        const reservationModal = document.getElementById('reservationModal');
        const reservationButton = document.querySelector('.btn.btn-primary[data-bs-toggle="modal"]');
        const dateDebutInput = document.getElementById('date_debut');
        const dateFinInput = document.getElementById('date_fin');
        const montantTotalElement = document.getElementById('montant_total');
        const prixParNuitElement = document.getElementById('reservation_chambre_prix');

        let chambreData = {};


        function calculerMontantTotal() {
            const dateDebut = new Date(dateDebutInput.value);
            const dateFin = new Date(dateFinInput.value);

            if (dateDebut && dateFin && dateFin >= dateDebut) {

                const diffTime = dateFin - dateDebut;
                const diffDays = diffTime / (1000 * 3600 * 24);

                if (diffDays >= 1) {

                    const montantTotal = chambreData.prix * diffDays;
                    montantTotalElement.textContent = montantTotal.toFixed(2);
                } else {
                    montantTotalElement.textContent = '0';
                }
            }
        }

        chambreModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            chambreData = {
                id: button.getAttribute('data-id'),
                numero: button.getAttribute('data-numero'),
                description: button.getAttribute('data-description'),
                prix: button.getAttribute('data-prix'),
                image: button.getAttribute('data-image')
            };
            reservationButton.setAttribute('data-id', chambreData.id);
            reservationButton.setAttribute('data-numero', chambreData.numero);
            reservationButton.setAttribute('data-prix', chambreData.prix);

            // Mise à jour des informations du modal
            chambreModal.querySelector('#chambre_numero').textContent = 'Chambre N° ' + chambreData.numero;
            chambreModal.querySelector('#chambre_description').textContent = chambreData.description;
            chambreModal.querySelector('#chambre_prix').textContent = chambreData.prix;
            chambreModal.querySelector('#chambre_image').src = chambreData.image;
        });

        reservationModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const isFromChambreModal = button && button.dataset.id;

            if (isFromChambreModal) {
                chambreData = {
                    id: button.getAttribute('data-id'),
                    numero: button.getAttribute('data-numero'),
                    prix: button.getAttribute('data-prix')
                };
            }

            reservationModal.querySelector('#chambre_id').value = chambreData.id;
            reservationModal.querySelector('#reservation_chambre_numero').textContent = chambreData.numero;
            reservationModal.querySelector('#reservation_chambre_prix').textContent = chambreData.prix + ' MAD';

            montantTotalElement.textContent = '0';

            prixParNuitElement.textContent = chambreData.prix + ' MAD';

            dateDebutInput.addEventListener('change', calculerMontantTotal);
            dateFinInput.addEventListener('change', calculerMontantTotal);
        });
    });
</script>


<?= $this->endSection() ?>
