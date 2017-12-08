<div class="container body-content">
    <div class="row ">
        <div class="container_3">
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
            <table style="margin-left: 25px;" border="2" cellspacing="3" align="center">
                <tr>
                    <td style="color: white!important; background-color: black;">Tijd/Locatie</td>
                    <?php
                    // Maak een lege variable aan om een event naam te onthouden
                    $eventname = '';
                    if (isset($info)) {
                        asort($info);
                        // Als de var $locaties bestaat loop er over heen
                        foreach ($info as  $locatie) {
                            // Kijk of de event naam al een keer geprint is
                            if ($locatie['location'] != $eventname) {
                                $eventname = $locatie['location']; ?>
                                <th style="color: white!important; background-color: black;"
                                    scope="row"><?= $locatie['location'] ?></th>
                                <?php
                            }
                        }
                    }
                        ?>
                </tr>
                    <?php if(isset($info)) {
                    foreach ($info as $time) { ?>
                <tr>
                    <td><?= $time['start_time'] ?>/<?= $time['end_time'] ?>
                    <?php if($time['artiest_id'] == 0 or $time['artiest_id'] == '0') { ?>
                        <td>Geen artiest beschikbaar</td>
                    <?php }  else {?>
                            <td><?= $time['artiest_id'] ?></td>
                    <?php } ?>
                </tr>
                        <?php
                        }
                    } ?>
            </table>
            <a href="<?= base_url('performance/index')?>">Ga terug</a>
        </div>
    </div>
</div>