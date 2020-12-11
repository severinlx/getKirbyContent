<?php
/**
 * Templates render the content of your pages. 
 * They contain the markup together with some control structures like loops or if-statements.
 * The `$page` variable always refers to the currently active page. 
 * To fetch the content from each field we call the field name as a method on the `$page` object, e.g. `$page->title()`. 
 * This home template renders content from others pages, the children of the `photography` page to display a nice gallery grid.
 * Snippets like the header and footer contain markup used in multiple templates. They also help to keep templates clean.
 * More about templates: https://getkirby.com/docs/guide/templates/basics
 */
?>

<?php snippet('header') ?>

<main>
   <?php snippet('intro') ?>
<?php
     $myPDO = new PDO('sqlite:/var/www/html/site/templates/Vakanzengrabber.db');
     $results = $myPDO->query("Select * From freelancede_2020_10_30 UNION Select * From freelancermap_2020_10_30");
	 /**
	 Wenn das Resultat nicht leer ist und ein array ist, wird die ausgabe vorgenommen
	 **/
	 if (is_array($results) || is_object($results))
	{
		print "<table>\n";
		print "<tr><th>ID</th><th>Titel</th><th>Start</th><th>Ende</th></tr>";
		 foreach($results as $result)
		 {
			 print "<tr><td>" . $result[0] . "<td>";
			 print "<td>" . $result[1] . "<td>";
			 print "<td>" . $result[2] . "</td>";
			 print "<td>" . $result[4] . "</td></tr>";
			 //print "<br>";
		 }
	print "</table>";
  }
	else
	{
		print "Keine Resultate";
	}
?>


</main>


<?php snippet('footer') ?>
