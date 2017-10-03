<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
          Voeg Nieuwsbericht toe
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <?php echo validation_errors(); ?>

            <?php echo form_open('news/create'); ?>

            <label for="title">Title</label><br />
            <input type="text" name="title" value="<?php echo set_value('title'); ?>" /><br />

            <label>inhoud</label><br />

            <textarea id="texteedit" name="inhoud" value="<?php echo set_value('inhoud'); ?>" ></textarea><br>

            <textarea id="text_edit" name="inhoud"></textarea><br>


            <label>afbeelding</label><br />
            <input type="file" name="newsimage"/>
            <input type="submit" name="submit" value="publiceer" /><br>

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