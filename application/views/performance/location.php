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
                            if ($locatie['podianame'] != $eventname) {
                                $eventname = $locatie['podianame'];?>
                                <th style="color: white!important; background-color: black;"
                                    scope="row"><?= $locatie['podianame'] ?></th>
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
                        foreach ($times as $blok) { ?>
                            <tr>
                                <?php if ($count % 4 == 1) {?>
                                    <th rowspan="4"><?= $blok['start_time'] ?></th>
                                <?php    }
                                for ($i = 0; $i < $headerCounter; $i++) { ?>
                                        <td style="height: 20px;">
                                            <?php
                                            if(isset($blok['performances']) &&
                                                $blok['performances'][0]['podium_id'] == $performances[$i]['podium_id']) { ?>
                                                <?php if($blok['performances'] > 1) {
                                                    foreach ($blok['performances'] as $performance) { ?>
                                                        <a href="#myModal" id="custId" data-toggle="modal"
                                                        data-name="<?php echo $performance['artist_name']; ?>">
                                                        <?php echo $performance['artist_name']; echo '</br>'; ?>
                                                        </a>
                                                        <?php
                                                    }
                                                } else { ?>
                                                    <a href="#myModal" id="custId" data-toggle="modal"
                                                       data-id="<?php echo $performances[$i]['id']; ?>">
                                                    <?php echo $blok['performances'][0]['artist_name']; ?>
                                                    </a>
                                                    <?php
                                                }
                                            } ?>
                                        </td>
                                        <?php
                                    }
                                $count++;?>
                            </tr>
                        <?php }
                    } ?>
            </table>
            <a href="<?= base_url('performance/index')?>">Ga terug</a>
        </div>
    </div>
</div>

<!-- The modal for artist info-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Artiesten info</h4>
            </div>
            <div class="modal-body">
                <div class="artist">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>