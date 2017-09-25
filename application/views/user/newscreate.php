<div class="container" xmlns="http://www.w3.org/1999/html">

    <?php echo validation_errors(); ?>

    <?php echo form_open('news/create'); ?>

    <textarea class="editor" name="text1">Articles should be in here</textarea>
    <input class="editor" name="text2" value="Articles should be in here">
    <div class="editor" name="text3">Articles should be in here</div>
    <span class="editor" name="text4">Articles should be in here</span>
    <p class="editor" name="text5">Articles should be in here</p>

    </form>

    <script> $("textarea").jqte(); </script>
</div>