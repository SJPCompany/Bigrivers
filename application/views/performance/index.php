<div class="container body-content">
    <div class="row ">
        <div class="container_2">
            <?php if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fout!</strong> <ul>';
                if ($_SESSION['error'] > 1) {
                    foreach ($_SESSION['error'] as $error) {
                        echo '<li>' . $error . '</li>';
                    }
                } else {
                    echo '<li>' . $_SESSION['error'] . '</li>';
                }
                echo '</ul></div>';
            }
            ?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <?php
                    // Maak een lege variable aan om een event naam te onthouden
                    $eventname = '';
                    if (isset($locaties)) {
                    // Als de var $locaties bestaat loop er over heen
                    foreach ($locaties as $locatie) {
                    // Kijk of de event naam al een keer geprint is
                    if ($locatie['name'] != $eventname) {
                        $eventname = $locatie['name']; ?>
                        <th style="color: white!important; background-color: black;" scope="row"><?= $locatie['name'] ?></th>
                        <?php
                    }
                    ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php if ($locatie['title'] == NULL || empty($locatie['title'])) { ?>
                        <th scope="row">Geen datum beschikbaar</th>
                   <?php } else { ?>
                        <th scope="row"><a href="<?= base_url('performance/locationCheck/' . $locatie['id'])?>"><?= $locatie['title'] ?></a></th>
                    <?php } ?>
                </tr>
                </tbody>
                <?php
                }
                }
                ?>
            </table>
        </div>
    </div>
</div>