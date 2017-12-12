<div class="container body-content">
    <div class="row ">
        <div class="container_3">
            <?php
            if (isset($_SESSION['error'])) {
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
                    $headerCounter = 0;
                    if (isset($info)) {
                        // Als de var $locaties bestaat loop er over heen
                        foreach ($info as  $locatie) {
                            // Kijk of de event naam al een keer geprint is
                            if ($locatie['podium_id'] != $eventname) {
                                $eventname = $locatie['podium_id']; ?>
                                <th style="color: white!important; background-color: black;"
                                    scope="row"><?= $locatie['podium_id'] ?></th>
                                <?php
                                $headerCounter++;
                            }
                        }
                    }
                        ?>
                </tr>
                <?php ?>

                <?php
                $count = 1;
                if (isset($info)) {
                    $length = count($times);
                        foreach ($times as $blok) { ?>
                            <tr>
                                <?php if ($count % 4 == 1) {?>
                                    <th rowspan="4"><?= $blok['start_time'] ?></th>
                                <?php    }
                                for ($i = 0; $i < $headerCounter; $i++) { ?>
                                        <td style="height: 20px;">
                                            <?php if(isset($blok['performances'])) {
                                                echo $blok['performances'][0]['artist_name'];
                                            } ?>
                                        </td>
                                        <?php
                                    }
                                $count++;?>
                                <!-- TODO: Check on the start_time of the performance and if it has a artist -->
                            </tr>
                        <?php }
                    } ?>
            </table>
            <a href="<?= base_url('performance/index')?>">Ga terug</a>
        </div>
    </div>
</div>

<!-- <?php foreach ($info as $artist) {
    if ($artist['artiest_id'] != 0 && $artist['start_time'] == $blok['time']) { ?>
        <td></td>
    <?php } else {?>
        <td><?= $artist['artiest_id'] ?></td>
    <?php }
}  ?> -->