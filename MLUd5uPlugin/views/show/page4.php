<section id="page4">

    <header>
        <h1>4. Umstellung</h1>
    </header>
    <? if ($d5u_ok) : ?>
    <div class="notice success">
        <h3>Umstellung Erfolgreich</h3>
        <p>Ihr Login für Stud.IP wurde erfolgreich umgestellt.</p>
    </div>

    <p>Bitte loggen Sie sich noch einmal mit Ihrem neuen Loginkennzeichen und Ihrem alten Passwort ein. Ihr altes Passwort ist gleichzeitig Ihr neues Passwort.</p>

    <p class="buttonrow">
        <a href="?cancel" class="button">Zur Startseite</a>
    </p>
    <? else : ?>
    <div class="notice error">
        <h3>Fehler bei der Umstellung</h3>
        <p>Ihr Login für Stud.IP konnte nicht umgestellt werden.</p>
    </div>

    <p>Bitte starten Sie die Umstellung erneut.</p>

    <p class="buttonrow">
        <a href="<?= $controller->link_for('show/page1')?>" class="button">Umstellung erneut starten</a>
        <a href="?cancel" class="button secondary">Später, Erinnerung in 10 Tagen</a>
    </p>
    <? endif; ?>
</section>
