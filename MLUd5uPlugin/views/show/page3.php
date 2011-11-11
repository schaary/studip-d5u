<section id="page3">

    <header>
        <h1>3. Neues Login</h1>
    </header>

    <form class="clearfix" method="post" action="<?= $controller->link_for('show/page4')?>">

        <fieldset class="newLogin">

            <p>Folgende Nutzerkennzeichen/E-Mail Kombinationen sind Ihren Daten zugeordnet. Bitte wählen Sie die gewünschte Kombination aus.</p>

            <ul>
            <? foreach($found as $id => $mail) : ?>
                <li class="radiorow">
                    <input name="loginCombi" id="<?= htmlspecialchars($id)?>" type="radio" value="<?= htmlspecialchars(serialize(array($id, $mail)))?>" />
                    <label for="<?= $id?>"><span class="kennzeichen"><?= htmlspecialchars($id)?></span> <span class="email"><?= htmlspecialchars($mail)?></span></label>
                </li>
             <? endforeach; ?>
            </ul>

        </fieldset>

        <fieldset class="buttonrow">
            <input type="submit" name="submit" value="Umstellung abschließen" />
        </fieldset>

    </form>

</section>
