<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Creër widget
        </h1> <br>
    </section>
    <!-- New User Form -->
    <div class="box box-info" style="width: 30%;">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontale Formulier</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
    <?php echo form_open('widget/checkWidgetData'); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="title1" class="col-sm-2 control-label">Titel</label>

                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control" id="title2" placeholder="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title1" class="col-sm-2 control-label">Actief?</label>

                    <div class="col-sm-10">
                        <label class="radio-inline"><input type="radio" name="active" value="1">Ja</label>
                        <label class="radio-inline"><input type="radio" name="active" value="0">Nee</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="LinkView_LinkType">Naar...</label>
                    <select id="SelectLinkType" name="LinkView.LinkType">
                        <option selected="selected" value="internal">Sitepagina</option>
                        <option value="external">Andere website</option>
                        <option value="file">Een bestand</option>
                    </select>
                </div>
                <div class="form-group" id="external" style="display:none;">
                    <label for="LinkView_ExternalUrl">URL</label>
                    <input id="LinkView_ExternalUrl" name="LinkView.ExternalUrl" type="text" value="" />
                </div>
                <div class="form-group" id="internal" style="display: none;">
                    <label for="LinkView_InternalType">Naar een...</label>
                    <select id="SelectInternalType" name="LinkView.InternalType">
                        <option value="Index">Homepage</option>
                        <option value="Events">Evenementen</option>
                        <option value="Performances">Programma voor Evenement</option>
                        <option value="Artists">Artiesten</option>
                        <option selected="selected" value="Page">Pagina&#39;s</option>
                        <option value="News">Nieuwsberichten</option>
                    </select>
                    <span style="font-size: 22px; font-weight: bold;">></span>
                    <select class="InternalType" id="Events" name="LinkView.InternalEventId">
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
                    <select class="InternalType" id="Performances" name="LinkView.InternalPerformanceId">
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
                    <select class="InternalType" id="Artists" name="LinkView.InternalArtistId">
                        <option value=""></option>
                        <option value="251">Fixxxman &amp; Friends</option>
                        <option value="253">Popgunnn</option>
                        <option value="254">Yada Yada</option>
                        <option value="257">Foolproof</option>
                        <option value="259">Steeler</option>
                        <option value="261">War Heroes</option>
                        <option value="262">Belfast Child</option>
                        <option value="264">Skeftum plays Golden Earring</option>
                        <option value="265">Them Lewis</option>
                        <option value="266">Her Majesty</option>
                        <option value="267">The Skadillacs</option>
                        <option value="268">Pene Corrida</option>
                        <option value="269">Les Djinns</option>
                        <option value="270">OMG</option>
                        <option value="272">Dave Vermeulen &amp; Voltage</option>
                        <option value="273">De-Likt</option>
                        <option value="274">Nielson</option>
                        <option value="276">Yokocola</option>
                        <option value="277">Christon</option>
                        <option value="278">Hidden Agenda Deluxe</option>
                        <option value="279">The Tibbs</option>
                        <option value="280">Fluks</option>
                        <option value="281">Marutyri</option>
                        <option value="282">Matt Bianco &amp; The New Cool Collective</option>
                        <option value="283">Gerson Main</option>
                        <option value="284">Lea Kliphuis</option>
                        <option value="285">Janne Schra</option>
                        <option value="286">Sebastiaan Benjamin</option>
                        <option value="287">Jeangu Macrooy</option>
                        <option value="288">Town of Saints</option>
                        <option value="289">Tommy Scott</option>
                        <option value="290">Die Mannschaft</option>
                        <option value="291">Wicked Wanda</option>
                        <option value="292">Frok</option>
                        <option value="293">Loft 52</option>
                        <option value="294">Acoustic Maniacs</option>
                        <option value="296">Dr. Justice &amp; The Smooth Operators</option>
                        <option value="298">Sue the Night</option>
                        <option value="299">Scotch</option>
                        <option value="300">BB87</option>
                        <option value="304">Bottles of Love</option>
                        <option value="305">Roots Riders - A Tribute To Bob Marley</option>
                        <option value="306">Big Salsa Band </option>
                        <option value="307">Ema Yazurlo &amp; Quilombo Sonoro</option>
                        <option value="308">O.D. Bluesband</option>
                        <option value="309">Matt Jacobs Band </option>
                        <option value="310">Leo Schellinger &amp; Friends</option>
                        <option value="311">T-Hank S</option>
                        <option value="312">Golly Gosh Darn</option>
                        <option value="313">Conjunto Cachondea</option>
                        <option value="314">Conjuncto Amsterdam</option>
                        <option value="315">Downbeat Detonators</option>
                        <option value="316">Dreadless</option>
                        <option value="317">Def Americans</option>
                        <option value="318">Raise The Ace</option>
                        <option value="319">Popschool</option>
                        <option value="320">Winnaar Jazzprijs DJs</option>
                        <option value="321">ameezing</option>
                        <option value="322">The Wanderers do Elvis</option>
                        <option value="323">Storksky</option>
                        <option value="324">The Soul Snatchers</option>
                        <option value="325">Jazzlab Sessions</option>
                        <option value="327"> The Filthy Six</option>
                        <option value="328">Umeme Afrorave</option>
                        <option value="329">Crawling Toddlers</option>
                        <option value="330">Bunch of Bastards</option>
                        <option value="331">Crow&#39;s Feet</option>
                        <option value="332">ArieSmith</option>
                        <option value="333">Rob Orlemans &amp; HPM</option>
                        <option value="334">The Goon Mat &amp; Lord Benardo</option>
                        <option value="335">Ragged them Dirty</option>
                        <option value="336">Joost de Lange</option>
                        <option value="337">Big Pete</option>
                        <option value="339">The Velvedettes</option>
                        <option value="340">Charly Cruz &amp; The Lost Souls</option>
                        <option value="341">The Rhythm Chiefs + Guests</option>
                        <option value="342">The Tone Twisters</option>
                        <option value="343">Son Caliente</option>
                        <option value="344">Pistoleros de la Paz</option>
                        <option value="345">Blue Grass Boogiemen</option>
                        <option value="346">Black Label Blues Band</option>
                        <option value="347">Stonecold</option>
                        <option value="348">Codarts Jong Talent Big Band</option>
                        <option value="349">Heavylight</option>
                        <option value="350">The Artificial</option>
                        <option value="351">Ed Struijlaart</option>
                        <option value="353">Skeftum</option>
                        <option value="354">Amy Winehouse Tribute Band</option>
                        <option value="355">Mot Wat</option>
                        <option value="356">Funky Orgganizers</option>
                        <option value="357">Rob van Rij</option>
                        <option value="358">Potman Jr. </option>
                        <option value="359">Kiki Mettler</option>
                        <option value="360">Funky Organizers</option>
                        <option value="361">The Upsessions</option>
                        <option value="362">DJ Tin Wish Tin</option>
                        <option value="363">Workshop by Giant Salsa</option>
                        <option value="364">Workshop Kizomba by Luv2dance</option>
                        <option value="365">Workshop by Ronald 4Salsa</option>
                        <option value="366">Fixxxman Unplugged</option>
                        <option value="367">DD Hot 5</option>
                        <option value="368">The Mississippi Riders</option>
                        <option value="369">Popschool band</option>
                        <option value="370">Poplab sessions</option>
                        <option value="372">Wells</option>
                        <option value="373">Nicolas Joan</option>
                        <option value="375">MagnaCult</option>
                        <option value="376">Brassociety</option>
                        <option value="378">Fallacy</option>
                        <option value="379">Without Caroline</option>
                        <option value="380">Charmplay</option>
                        <option value="381">Bliqfoer</option>
                        <option value="382">Alive</option>
                        <option value="383">The Wanderers</option>
                        <option value="384">The Dirty Daddies</option>
                        <option value="385">WOOT</option>
                        <option value="386">The Kik</option>
                        <option value="387">Bazzookas</option>
                        <option value="388">Sun Rider</option>
                        <option value="389">Armand Tribute Band</option>
                        <option value="390">Dulfer Jazz</option>
                        <option value="391">The Empyrean</option>
                        <option value="392">Diede</option>
                        <option value="393">OMG Doe (t) maar</option>
                        <option value="394">Lucky Fonz III</option>
                        <option value="395">DeWolff</option>
                        <option value="396">Stone Golem</option>
                        <option value="397">Switch Bones</option>
                        <option value="398">The Dawn Brothers</option>
                        <option value="399">Callahan Clearwater Revival </option>
                        <option value="400">Sister Fister</option>
                        <option value="401">Darlyn</option>
                        <option value="402">Mumfords Calling</option>
                        <option value="403">De Kat</option>
                        <option value="404">Orange Skyline</option>
                        <option value="405">Aafke Romeijn</option>
                        <option value="406">Bottles of Love</option>
                        <option value="407">Radio Eliza</option>
                        <option value="408">Back To The Who</option>
                        <option value="409">Nathan James</option>
                        <option value="410">Ebo Taylor</option>
                        <option value="411">Bongomatik</option>
                        <option value="413">aMeezing &amp; Xing</option>
                        <option value="414">Nicky en de Donnie$</option>
                        <option value="415">45ACIDBABIES</option>
                        <option value="416">Non Blonde Bowie</option>
                        <option value="417">B-Where</option>
                        <option value="418">Einfach Kurt</option>
                        <option value="419">Musest</option>
                        <option value="420">Rogier Pelgrim</option>
                        <option value="421">The Toasters</option>
                        <option value="422">Coal Harbour</option>
                        <option value="423">Savoy Room XL</option>
                        <option value="424">Lilith Merlot</option>
                        <option value="425">Pearl Jamming</option>
                        <option value="426">Great Queen Rats</option>
                        <option value="427">Dr Justice &amp; The Smooth Operators</option>
                        <option value="428">The Juke Joints</option>
                        <option value="429">Emma &amp; the Sweet Tones</option>
                        <option value="430">Bart Wirtz</option>
                        <option value="431">Slapback Johnny</option>
                        <option value="432">Imaginary Western</option>
                        <option value="433">Jon Cleary &amp; The Absolute Monster Gentlemen</option>
                        <option value="434">Ragged Them Dirty</option>
                        <option value="435">Herman Brock Jr. &amp; Blue Grass Boogiemen</option>
                        <option value="436">Steven Troch band</option>
                        <option value="437">Early Roosters</option>
                        <option value="438">The Ultraverse</option>
                        <option value="439">Xing Popcore</option>
                        <option value="440">Slow Burners</option>
                        <option value="441">Charley Cruz &amp; The Lost Souls</option>
                        <option value="442">Recorders</option>
                        <option value="443">Mot Wat</option>
                        <option value="445">FoolProof</option>
                        <option value="446">Francesco Daniel</option>
                        <option value="447">Frok</option>
                        <option value="448">Jared Grant</option>
                        <option value="449">Rob van Rij / Zsuzsanna Kasius</option>
                        <option value="450"> The Goon Mat &amp; Lord Benardo</option>
                        <option value="451">Arjan Loeve</option>
                        <option value="452">Biggs</option>
                        <option value="453">Corvin Silvester</option>
                        <option value="454">DJ Vincent Vilouca</option>
                        <option value="455">Get Rhythm (Johnny Cash Tribute Band)</option>
                        <option value="456">Ilse Bevelander</option>
                        <option value="457">Little Hat</option>
                        <option value="458">No Excuse</option>
                        <option value="459">Vincent Vilouca Unplugged</option>
                        <option value="460">The Revenue</option>
                        <option value="461">Black Label Blues Band</option>
                        <option value="462">Silen Roc</option>
                        <option value="463">BRASSOciety</option>
                        <option value="464">PollyAnna</option>
                        <option value="465">Nicholas Joan (trio)</option>
                        <option value="466">Celeste Liberty</option>
                        <option value="467">MEROL </option>
                        <option value="468">Goofy and the Regulars</option>
                        <option value="469">Jasper Clash</option>
                        <option value="470">Van Eigen Bodem</option>
                        <option value="471">Ariesmith</option>
                        <option value="472">Solid Gold</option>
                        <option value="473">Ocobar</option>
                        <option value="474">Hunted Down</option>
                        <option value="475">Frank Fish Band</option>
                        <option value="476">Jazzlab Sessions: Tribute to Allen Toussaint &amp; Herbie Hancock</option>
                        <option value="477">Sin Pausa</option>
                        <option value="478">Leo Schellinger &amp; Friends</option>
                        <option value="479">Abee</option>
                        <option value="480">Lamarotte</option>
                        <option value="481">The Artificial</option>
                        <option value="482">King Charles and the Rubinators</option>
                        <option value="483">Fixxxman &amp; Friends</option>
                        <option value="484">Crawling Toddlers</option>
                        <option value="485">Rootbag &amp; Friends</option>
                        <option value="486">18 Strings duo</option>
                        <option value="487">JD Brown &amp; the Buffalo Beat</option>
                        <option value="488">DJ Soulpat</option>
                        <option value="489">Baptist</option>
                        <option value="490">Sunny Side Up</option>
                        <option value="491">Team Latino</option>
                        <option value="492">De Donuts</option>
                        <option value="493">Rey Cebrera y sus Amigos</option>
                        <option value="494">Friends on Friday</option>
                        <option value="495">DJ Rockin&#39; Paul</option>
                        <option value="496">DJ Samball </option>
                        <option value="497">Dj Tin Wish Tin</option>
                        <option value="498">Homesick&#39;s bluesharp workshop (binnen) </option>
                        <option value="499">Krabat</option>
                        <option value="500">Three Rivers Crossing (binnenpodium)</option>
                        <option value="501">Dele Sosimi</option>
                    </select>
                    <select class="InternalType" id="Page" name="LinkView.InternalPageId">
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
                    <select class="InternalType" id="News" name="LinkView.InternalNewsId">
                        <option value=""></option>
                        <option value="4">Big Rivers maakt eerste namen bekend!</option>
                        <option value="5">Crowdfunding actie Big Rivers 2015</option>
                        <option value="6">Big Rivers deelt Gold Card uit!</option>
                        <option value="7">Programma Big Rivers 2015 bekend</option>
                        <option value="8">Kaartverkoop Big Rivers Blues Cruise 2015 start</option>
                        <option value="10">aMeeZing zoekt mannenstemmen!</option>
                        <option value="11">Aafje omarmt de Silver Talent Show</option>
                        <option value="12">De Aafje Silver Talent Show Grande Finale winnaar</option>
                        <option value="13">Mondharmonica workshop</option>
                        <option value="14">Blues Cruise Menu</option>
                        <option value="15">Big Rivers 2015 is gestart</option>
                        <option value="16">Studio De Witt live @ Merz</option>
                        <option value="18">Optreden tijdens het Big Rivers festival?</option>
                        <option value="19">Big Rivers Indoor komt er aan!</option>
                        <option value="20">Rock the Garden</option>
                        <option value="21">Programma Big Rivers 2016 online!</option>
                        <option value="23">Meebouwen aan Big Rivers</option>
                        <option value="24">Centje voor een Bandje prijswinnaar Jetske</option>
                        <option value="25">De rollende fotograaf John van der Laan bedient camera met zijn voeten!</option>
                        <option value="27">200 volgers op Instagram </option>
                        <option value="28">Goed nieuws in situatie podium Stadsherberg</option>
                        <option value="29">#VLOG 5 met Antoine Peeters</option>
                        <option value="30">Winnares Rituals pakket</option>
                        <option value="31">De festival krant is weer onderweg!</option>
                        <option value="32">Update Centje voor een Bandje</option>
                        <option value="33">Eerste namen twintig jarig jubileum Big Rivers bekend. </option>
                        <option value="34">Leer mondharmonica spelen op Big Rivers festival.</option>
                        <option value="35">Centje voor een Bandje - tussenstand</option>
                        <option value="36">Big Rivers.. Let’s go green!</option>
                        <option value="37">Centje voor een Bandje - al over de helft! </option>
                        <option value="38">Centje voor een Bandje – al over de helft!</option>
                        <option value="39">Wegafsluiting tijdens Big Rivers.</option>
                        <option value="40">Geen programmafolder dit jaar. Wat dan wel?</option>
                        <option value="41">Brandstof voor kids tijdens Big Rivers festival</option>
                        <option value="42">Waterbus vaart langer door tijdens Big Rivers</option>
                        <option value="43">Big Rivers bedankt.</option>
                    </select>

                </div>
                <div class="form-group" id="file" style="display: none;">
                    <div id="link-file-select-container">
                    <label for="LinkView_File">Upload een bestand om naar te linken</label>
                    <input data-val="true" data-val-required="The NewUpload field is required." id="link-upload-type" name="LinkView.File.NewUpload" type="hidden" value="True" />
                    <input id="link-select-existing-key" name="LinkView.File.Key" type="hidden" value="" />

                    
                    <div id="link-file-select-button-bar">
                        <div id="link-upload-button" class="file-upload-button selected">
                            <p>Upload een bestand</p>
                        </div>
                        <div id="link-gallery-button" class="file-upload-button non-selected">
                            <p>Kies een bestaande afbeelding</p>
                        </div>
                    </div>

                    
                    <div id="link-file-upload">
                        <input id="LinkView_File_UploadFile" name="LinkView.File.UploadFile" type="file" value="" />
                    </div>

                    
                    <div id="link-file-gallery">
                            <div class="link-file-gallery-item-container non-selected" data-file-key="File-5e104d4e-547a-49ca-ac6c-a0b710c04416.pdf">
                                <div class="file-block">
                                    <div class="pseudo-align"></div>
                                    <div class="file-container">
                                        <img src="https://bigriversstorage.blob.core.windows.net/linkupload/File-5e104d4e-547a-49ca-ac6c-a0b710c04416.pdf" />
                                    </div>
                                </div>
                                <div class="text-block">
                                    <div class="text-container">
                                        <p>concept website lay-out en tekst Centje voor een Bandje</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-default">Annuleren</button>
                <button type="submit" class="btn btn-info pull-right">Maak aan</button>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
</div>
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>
