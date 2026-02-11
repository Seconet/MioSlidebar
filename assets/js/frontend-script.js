jQuery(document).ready(function ($) {
    'use strict';


    var $container = $('#mioslidebar-container');
    var $arrow = $('#mioslidebar-arrow');

   

    // Se container non esiste, esci
    if (!$container.length || !$arrow.length) {
        return;
    }

    // CONTROLLO MOBILE CRITICO
    var isMobile = $(window).width() <= 768;
    var mobileEnabled = $container.data('mobile-enabled');

 

    // SE SU MOBILE E MOBILE DISABILITATO → NASCONDI ED ESCI
    if (isMobile && mobileEnabled === '0') {
        $container.remove(); // Rimuove completamente dal DOM
        return; // Esci - niente sidebar su mobile
    }

    // Gestione stato iniziale
    var isFirstVisit = localStorage.getItem('mioslidebar_first_visit') === null;

    if (isFirstVisit) {
        // Prima visita: mostra la sidebar
        localStorage.setItem('mioslidebar_hidden', 'false');
        localStorage.setItem('mioslidebar_first_visit', 'done');
    }

    // Applica stato salvato
    var isHidden = localStorage.getItem('mioslidebar_hidden') === 'true';

    if (isHidden) {
        $container.addClass('hidden');
    }

    // Click sulla freccia
    $arrow.on('click', function (e) {
        // Su mobile, se la sidebar è lunga, fai scorrere meglio
        if (isMobile && !$container.hasClass('hidden')) {
            // Aggiungi classe per animazione mobile
            $container.addClass('mobile-closing');
            setTimeout(function () {
                $container.removeClass('mobile-closing');
            }, 400);
        }

        e.preventDefault();
        e.stopPropagation();

        // Toggle stato
        $container.toggleClass('hidden');

        // Salva preferenza utente
        localStorage.setItem('mioslidebar_hidden', $container.hasClass('hidden').toString());

        // Effetto click
        $(this).addClass('clicked');
        setTimeout(function () {
            $arrow.removeClass('clicked');
        }, 300);
    });

    // Previene chiusura quando si clicca nella sidebar
    $container.on('click', function (e) {
        e.stopPropagation();
    });

    // Su mobile: chiudi se si clicca fuori
    if ($(window).width() <= 768) {
        $(document).on('click', function (e) {
            if (!$container.hasClass('hidden') &&
                !$(e.target).closest('#mioslidebar-container').length) {

                $container.addClass('hidden');
                localStorage.setItem('mioslidebar_hidden', 'true');
            }
        });
    }
});