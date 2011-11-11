<section id="page1">

        <header>
            <h1>1. Umstellung Ihres Logins</h1>
        </header>

        <p>Sehr geehrte/r Frau/Herr <?= htmlspecialchars($username)?></p>

        <p>Das URZ der Uni Halle konsolidiert die Logins der zentralen IT-Dienste für den Aufbau eines zentralen IDMs.</p>

        <p>Die Grundlage bilden die 5-stelligen Loginkennzeichen und universitären Mail-Adressen der Uni Halle, die durch das URZ ausgegeben und verwaltet werden.</p>

        <p>Ihr Loginkennzeichen im Stud.IP kann an Hand der vorliegenden Daten nicht automatisch mit den zentralen Logins abgeglichen werden.</p>

        <p>Wir bitten Sie deshalb um Ihre Zusammenarbeit. Bitte helfen Sie uns, in dem Sie auf den folgenden Seiten die fehlenden Daten zu ergänzen.</p>

        <p class="buttonrow">
            <a href="<?= $controller->link_for('show/page2')?>" class="button">Jetzt Umstellung durchführen</a>
            <a href="?cancel" class="button secondary">Später, Erinnerung in 10 Tagen</a>
        </p>

</section>
