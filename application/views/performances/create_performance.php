<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

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

            pas optreden aan
        </h1>
    </section>

    <section class="content container-fluid">

    	<?php echo form_open('performances/save_performance_data'); ?>

		<?php echo validation_errors(); ?>

	<div class="box box-info">
        <div class="form-group">
        <label>Artiest</label>
        	<input type="hidden" name="artist_id" value="<?= $artist['id'] ?>">
        	<input type="text" name="artist" value="<?= $artist['name']?>" readonly>
        </div>
        <div class="form-group">
		<label for="podia">Podia</label>
				<select id="podia" name="podia">
	                <option value=""></option>
	                <?php if (isset($podiums)): ?>
	                    <?php foreach($podiums as $row): ?>
	                        <option value="<?= $row['id']?>"><?= $row['podianame']?></option>
	                    <?php endforeach; ?>
	                <?php endif; ?>
	            </select> 
        </div>
        <div class="form-group">
	        <label for="event">Evenement</label>
	        	<select id="event" name="event">
	                <option value=""></option>
	                <?php if (isset($events)): ?>
	                    <?php foreach($events as $row): ?>
	                        <option value="<?= $row['id']?>"><?= $row['name']?></option>
	                    <?php endforeach; ?>
	                <?php endif; ?>
	            </select>
        </div>
        <div class="form-group">
	        <label for="day">Dag</label>
	        	<select id="day" name="day">
	        		<option value=""></option>
	                <option value="donderdag">donderdag</option>
	                <option value="vrijdag">vrijdag</option>
	                <option value="zaterdag">zaterdag</option>
	            </select>
        </div>
        <div class="form-group">
	        <label for="start_performance">Start optreden</label>
	        <input type="time" name="start_performance">
    	</div>
    	<div class="form-group">
	        <label for="end_performance">Eind optreden</label>
	        <input type="time" name="end_performance">
    	</div>

    	<input type="submit" name="submit" value="Toevoegen"/><br>

	</form>
    </section>