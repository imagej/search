<?php 
$q = urlencode($_GET['q']);

$website = array_key_exists('website', $_GET);
$wiki = array_key_exists('wiki', $_GET);

$github = array_key_exists('github', $_GET);
$javadoc = array_key_exists('javadoc', $_GET);
$maven = array_key_exists('maven', $_GET);
$bugzilla = array_key_exists('bugzilla', $_GET);
$trac = array_key_exists('trac', $_GET);

$forum = array_key_exists('forum', $_GET);
$imagej_list = array_key_exists('imagej-list', $_GET);
$imagej_devel = array_key_exists('imagej-devel', $_GET);
$fiji_devel = array_key_exists('fiji-devel', $_GET);
$scijava = array_key_exists('scijava', $_GET);
$scifio = array_key_exists('scifio', $_GET);
$openspim = array_key_exists('openspim', $_GET);
$micromanager = array_key_exists('micromanager', $_GET);
$flimlib = array_key_exists('flimlib', $_GET);
$ome_lists = array_key_exists('ome-lists', $_GET);

$irc_imagejdev = array_key_exists('irc-imagejdev', $_GET);
$irc_fiji_devel = array_key_exists('irc-fiji-devel', $_GET);

$orgs = array(
	"CellProfiler",
	"Icy-imaging",
	"bigdataviewer",
	"fiji",
	"imagej",
	"imglib",
	"knime-ip",
	"maven-nar",
	"ome",
	"openmicroscopy",
	"openspim",
	"saalfeldlab",
	"scifio",
	"scijava",
	"flimlib",
	"trakem2",
	"uw-loci"
);

// web
if ($website) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:imagej.net+$q";
}
else if ($wiki) {
	$url = "https://imagej.net/index.php?title=Special%3ASearch&search=$q";
}

// code and issues
else if ($github) {
	$url = "https://github.com/search?q=$q+is%3Aopen";
	foreach ($orgs as $org) { $url .= "+user%3A$org"; }
	$url .= '&ref=simplesearch&type=Code';
}
else if ($javadoc) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:javadoc.imagej.net+$q";
}
else if ($maven) {
	$url = "https://maven.scijava.org/index.html#nexus-search;quick~$q";
}
else if ($bugzilla) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:fiji.sc%2Fbug+$q";
}
else if ($trac) {
	$url = "https://trac.imagej.net/search?q=$q&noquickjump=1&ticket=on";
}

// forum and lists
else if ($forum) {
	$url = "https://forum.image.sc/search?q=$q";
}
else if ($imagej_list) {
	$url = "http://imagej.1557.x6.nabble.com/template/NamlServlet.jtp?macro=search_page&node=3681987&query=$q";
}
else if ($imagej_devel) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:imagej.net%2Fpipermail%2Fimagej-devel+$q";
}
else if ($fiji_devel) {
	$url = "https://groups.google.com/forum/#!searchin/fiji-devel/$q";
}
else if ($scijava) {
	$url = "https://groups.google.com/forum/#!searchin/scijava/$q";
}
else if ($scifio) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:scif.io%2Fpipermail%2Fscifio+$q";
}
else if ($openspim) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:openspim.org%2Fpipermail+$q";
}
else if ($micromanager) {
	$url = "http://micro-manager.3463995.n2.nabble.com/template/NamlServlet.jtp?macro=search_page&node=3463995&query=$q";
}
else if ($flimlib) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:loci.wisc.edu%2Fpipermail%2Fslim-curve+$q";
}
else if ($ome_lists) {
	$url = "https://www.google.com/?gws_rd=ssl#q=site:lists.openmicroscopy.org.uk%2Fpipermail+$q";
}

// irc
else if ($irc_imagejdev) {
	$url = "https://code.imagej.net/chatlogs/imagejdev?search=$q&format=html&columns=78&times=sparse&submit=search";
}
else if ($irc_fiji_devel) {
	$url = "https://code.imagej.net/chatlogs/fiji-devel?search=$q&format=html&columns=78&times=sparse&submit=search";
}

// fall back to Google
else {
	$url = "https://www.google.com/?gws_rd=ssl#q=$q";
}
header("Location: $url"); 
?>
