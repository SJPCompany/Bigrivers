

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bewerk widget
        </h1> <br>
    </section>
    <!-- New User Form -->
    <div class="box box-info" style="width: 30%;">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontale Formulier</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
    <?php echo form_open('widget/editWidgetData/'. (isset($widget) ? $widget["id"] : "")); ?>
        <?php echo validation_errors(); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="title1" class="col-sm-2 control-label">Titel</label>

                    <div class="col-sm-10">
                    	<input type="hidden" name="id" value="<?= $widget['id'] ?>">
                        <input type="text" name="title" class="form-control" id="title2" value="<?= $widget['title'] ?>">
                    </div>

                    <label for="title1" class="col-sm-2 control-label">Actief?</label>

                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="active" value="1">Ja</label>
                        <label class="radio-inline"><input type="radio" name="active" value="0">Nee</label>
                    </div>

                    <div class="form-group">
                    <label for="LinkView_LinkType" class="col-sm-2 control-label">Naar...</label>
                    <div class="col-sm-10">
                        <select id="SelectLinkType" name="LinkView.LinkType">
                            <option value=""></option>
                            <option value="internal">Sitepagina</option>
                            <option value="external">Andere website</option>
                            <option value="file">Een bestand</option>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="external" style="display:none;">
                    <label for="LinkView_ExternalUrl" class="col-sm-2 control-label">URL</label>
                    <div class="col-sm-10">
                        <input id="LinkView_ExternalUrl" name="LinkView.ExternalUrl" type="text" value="" />
                    </div>
                </div>
                <div class="form-group" id="internal" style="display: none;">
                    <label for="LinkView_InternalType" class="col-sm-2 control-label">Naar een...</label>
                    <div class="col-sm-10">
                        <select id="SelectInternalType" name="LinkView.InternalType">
                            <option value=""></option>
                            <option value="Index">Homepage</option>
                            <option value="Events">Evenementen</option>
                            <option value="Performances">Programma voor Evenement</option>
                            <option value="Artists">Artiesten</option>
                            <option value="Page">Pagina&#39;s</option>
                            <option value="News">Nieuwsberichten</option>
                        </select>
                    </div>
                    <span style="font-size: 22px; font-weight: bold;">></span>
                    <div class="col-sm-10">
                        <select class="InternalType" id="Events" name="LinkView.InternalEventId" style="display:none;">
                            <option value=""></option>
                            <option value="1">De Aftrap </option>
                            <option value="2">Big Rivers Muziek 2016 was geweldig</option>
                            <option value="5">aMeeZing </option>
                            <option value="6">Big Rivers Blues Cruise </option>
                            <option value="7">Finale Aafje Silver Talent Show </option>
                            <option value="8">De Aftrap was groot succes!</option>
                            <option value="9">Big Rivers Blues Cruise was top!</option>
                            <option value="10">aMeeZing wordt een knaller!</option>
                            <option value="11">Big Rivers Indoor 11 Maart</option>
                            <option value="12">Big Rivers 2016: De Aftrap @ Bibelot</option>
                            <option value="13">Workshop mondharmonica 16 juli</option>
                            <option value="14">Korenavond @ Merz</option>
                            <option value="15">Pre Party @ Merz</option>
                            <option value="16">Pre Party @ Bibelot</option>
                            <option value="17">Big Rivers 2017 was weer geweldig!</option>
                        </select>
                    </div>
                    <div class="col-sm-10">
                        <select class="InternalType" id="Performances" name="LinkView.InternalPerformanceId" style="display:none;">
                            <option value=""></option>
                            <option value="1">De Aftrap </option>
                            <option value="2">Big Rivers Muziek 2016 was geweldig</option>
                            <option value="5">aMeeZing </option>
                            <option value="6">Big Rivers Blues Cruise </option>
                            <option value="7">Finale Aafje Silver Talent Show </option>
                            <option value="8">De Aftrap was groot succes!</option>
                            <option value="9">Big Rivers Blues Cruise was top!</option>
                            <option value="10">aMeeZing wordt een knaller!</option>
                            <option value="11">Big Rivers Indoor 11 Maart</option>
                            <option value="12">Big Rivers 2016: De Aftrap @ Bibelot</option>
                            <option value="13">Workshop mondharmonica 16 juli</option>
                            <option value="14">Korenavond @ Merz</option>
                            <option value="15">Pre Party @ Merz</option>
                            <option value="16">Pre Party @ Bibelot</option>
                            <option value="17">Big Rivers 2017 was weer geweldig!</option>
                        </select>
                    </div>
                    <div class="col-sm-10">
                        <select class="InternalType" id="Artists" name="LinkView.InternalArtistId" style="display:none;">
                            <option value=""></option>
                            <?php if(isset($artists)): ?>
                                <?php foreach ($artists as $row): ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php endforeach; ?>
                            <?php endif;?>
                        </select>
                    </div>
                    <div class="col-sm-10">
                        <select class="InternalType" id="Page" name="LinkView.InternalPageId" style="display:none;">
                            <option value=""></option>
                            <option value="1">Vrijwilligersfuncties</option>
                            <option value="2">Stageplaatsen</option>
                            <option value="3">Wall of Fame</option>
                            <option value="4">Over ons</option>
                            <option value="5">Parkeren, Overnachten en Vervoer</option>
                            <option value="6">Standhouders</option>
                            <option value="7">Bands</option>
                            <option value="8">Steun jouw Big Rivers. Alleen samen maken we het fantastisch!</option>
                            <option value="9">Festival- &amp; Foodmarkt</option>
                            <option value="10">Tickets</option>
                            <option value="11">Contact</option>
                            <option value="13">Big Rivers danst op het Scheffersplein</option>
                            <option value="14">Let op! Wijzigingen betreffende het programma</option>
                            <option value="15">Programma + plattegrond </option>
                            <option value="17">Studio De Witt @ Merz</option>
                            <option value="18">Popcentrale experiment: Ol&#39; to the New</option>
                            <option value="19">29% behaald met onze crowdfundingactie</option>
                            <option value="20">Big Rivers 2017 komt eraan!</option>
                            <option value="21">Big Rivers Indoor 11 Maart</option>
                            <option value="22">DONEER - CENTJE VOOR EEN BANDJE</option>
                            <option value="23">Hoe maak ik kans?</option>
                            <option value="24">Je win kans vergroten?</option>
                            <option value="25">Prijzenlijst</option>
                            <option value="26">Waarom is jouw donatie nodig?</option>
                            <option value="27">Actievoorwaarden</option>
                            <option selected="selected" value="28">Big Rivers 2016 Spotify playlist</option>
                            <option value="29">Info en veel gestelde vragen</option>
                            <option value="30">Hebben kinderen ook toegang tot het festival?</option>
                            <option value="31">Waar koop ik mijn Big Rivers glas? </option>
                            <option value="32">Is het festival  bereikbaar met de auto/fiets?</option>
                            <option value="33">Is het festival  bereikbaar met het openbaar vervoer?</option>
                            <option value="34">Is er een invalide toilet aanwezig op het festival?</option>
                            <option value="35">Ik heb een andere vraag!</option>
                            <option value="36">Respect voor Dordt</option>
                            <option value="37">Programma wijzigingen</option>
                            <option value="38">Big Rivers 2016 </option>
                            <option value="39">Let&#39;s Go Green!</option>
                            <option value="40">Workshops</option>
                        </select>
                    </div>
                    <div class="col-sm-10">
                        <select class="InternalType" id="News" name="LinkView.InternalNewsId" style="display:none;">
                            <option value=""></option>
                            <?php 
                            if(isset($news)):
                            foreach($news as $row): 
                            ?>
                                <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                            <?php 
                            endforeach; 
                            endif;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group" id="file" style="display: none;">
                    <div id="link-file-select-container">
                        <label for="LinkView_File" class="col-sm-2 control-label">Selecteer bestand</label>
                        <div class="col-sm-10">
                            <input id="filebutton" name="filebutton" class="input-file" type="file">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Annuleren</button>
                <button type="submit" class="btn btn-info pull-right">Aanpassen</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Alle rechten voorbehouden.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>
