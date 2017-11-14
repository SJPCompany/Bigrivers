<div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <section class="content-header">

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
            echo '</ul></div>'; }
        ?>

        <h1>
            Voeg Artiest toe
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <?php echo validation_errors(); ?>

        <?php echo form_open('artist/create'); ?>

        <label for="name">Naam</label><br />
        <input type="text" name="name" /><br />

        <label for="description">Beschrijving</label><br />
        <textarea  name="description" id="wysihtml-textarea" placeholder="Enter your text ..." autofocus></textarea>
        <div id="wysihtml-toolbar" style="display: none;">
            <a data-wysihtml-command="bold">bold</a>
            <a data-wysihtml-command="italic">italic</a>

            <!-- Some wysihtml5 commands require extra parameters -->
            <a data-wysihtml-command="foreColor" data-wysihtml-command-value="red">red</a>
            <a data-wysihtml-command="foreColor" data-wysihtml-command-value="green">green</a>
            <a data-wysihtml-command="foreColor" data-wysihtml-command-value="blue">blue</a>

            <!-- Some wysihtml5 commands like 'createLink' require extra paramaters specified by the user (eg. href) -->
            <a data-wysihtml-command="createLink">insert link</a>
            <div data-wysihtml-dialog="createLink" style="display: none;">
                <label>
                    Link:
                    <input data-wysihtml-dialog-field="href" value="http://" class="text">
                </label>
                <a data-wysihtml-dialog-action="save">OK</a> <a data-wysihtml-dialog-action="cancel">Cancel</a>
            </div>
        </div><br>
        <label for="website">Website</label><br />
        <input type="text" name="website" /><br />
        <label for="youtube">Youtube</label><br />
        <input type="text" name="youtube" /><br />
        <label for="facebook">Facebook</label><br />
        <input type="text" name="facebook" /><br />
        <label for="twitter">Twitter</label><br />
        <input type="twitter" name="twitter" /><br />
        <input type="submit" name="submit" value="maak aan"/><br>
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">BigRivers</a>.</strong>
</footer>

<script>
    var editor = new wysihtml.Editor("wysihtml-textarea", { // id of textarea element
        toolbar:      "wysihtml-toolbar", // id of toolbar element
        parserRules:  wysihtml5ParserRules // defined in parser rules set
    });
</script>
<!--<script>$('#newstext').html('Some text dynamically set.');</script>-->
</body>
</html>