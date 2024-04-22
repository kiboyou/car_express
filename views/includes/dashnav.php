<div class="left">
    <!-- LOGO DU CENTRE CULTUREL COMOE -->
    <div class="logo">
        <img src="<?= BASE_URL; ?>public/source/images/logo/logoB.png" alt="logo du centre comoe" />
    </div>
    <!-- LISTE DES OPTIONS MENU -->
    <div class="list">
        <!-- LISTE DE MENU -->
        <ul>
            <!-- OPTION ACCEUIL -->
            <a href="<?= url('api/Admin/index'); ?>">
                <li class="menu-select">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </li>
            </a>
            <!-- OPTION CLIENT -->
            <a href="<?= url('api/Admin/customer'); ?>">
                <li><i class="fa-solid fa-hospital-user"></i> Client</li>
            </a>
            <!-- OPTION RESERVATION -->
            <a href="<?= url('api/Admin/reservation'); ?>">
                <li>
                    <i class="fa-solid fa-magnifying-glass-chart"></i> Reservation
                </li>
            </a>
            <!-- OPTION FACTURE -->
            <a href="<?= url('api/Admin/facture'); ?>">
                <li><i class="fa-solid fa-square-poll-vertical"></i> Facture</li>
            </a>
            <!-- OPTION RECU -->
            <a href="<?= url('api/Admin/received'); ?>">
                <li><i class="fa-solid fa-square-poll-vertical"></i> Reçu</li>
            </a>

            <!-- OPTION INVENTAIRE -->
            <a href="<?= url('api/Admin/inventaire'); ?>">
                <li><i class="fa-solid fa-magnifying-glass-chart"></i> Inventaire</li>
            </a>

            <!-- OPTION GESTIONNAIRE -->
            <a href="<?= url('api/Admin/gestionnaire'); ?>">
                <li><i class="fa-solid fa-hospital-user"></i> Gestionnaire</li>
            </a>

            <!-- OPTION VOITURE -->
            <a href="<?= url('api/Admin/vehicule'); ?>">
                <li><i class="fa-solid fa-square-poll-vertical"></i> Voiture</li>
            </a>
        </ul>

    </div>
    <!-- DECONNECTION -->
    <div class="disconnect">
        <a href="<?= url('api/Admin/index'); ?>"><button>Se deconnecter</button></a>
    </div>
</div>