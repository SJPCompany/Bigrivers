<div class="container body-content">
    <div class="row ">
        <div class="container_2">
            <?php if (isset($_SESSION['error'])) {
                echo '<div class="alert alert-danger alert-dismissable">
             <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Fout!</strong> <ul>';
                echo '<li>' . $_SESSION['error'] . '</li>';
                echo '</ul></div>';
            }
            ?>
            <table class="table table-striped">
                <thead>
                <tr>
                <?php
                if(isset($locaties)) {
                    foreach ($locaties as $locatie) {
                        if($locatie['status'] == 'actief') { ?>
                                <th scope="row"><?=$locatie['podianame'] ?></th>
                        <?php }
                    }
                }
                ?>
                </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($locaties)) {
                       foreach ($locaties as $locatie) {
                           if($locatie['status'] == 'actief') { ?>
                               <tr>
                                   <th scope="row">Donderdag</th>
                                   <th scope="row">Vrijdag</th>
                                   <th scope="row">Zaterdag</th>
                               </tr>
                           <?php }
                       }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>