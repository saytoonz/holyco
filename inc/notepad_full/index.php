<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Nsromapa notes</title>
        
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Courgette" />

        
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    </head>
    
    <body>

		<div id="pad">
			<h2>Note</h2>
			<form action="index.php" method="post">
			<textarea id="note" name="notes"><?php echo $note_content ?></textarea>
			</form>
		</div>

		<p class="credit"><input type="submit" name="saveNotes" value="Save Notes" /></p>

        <footer>
	        <h2><a href="http://localhost/nsromapa/home.php"><i>Nsromapa</i>.com</a></h2>
            <a class="tzine" href="http://tutorialzine.com/2012/09/simple-note-taking-app-ajax/">Make <i>your <b>own</b></i> notes: keep a secrets.</a>
        </footer>
		
		
		<script src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
		<script src="assets/js/script.js"></script>
		
    </body>
</html>
