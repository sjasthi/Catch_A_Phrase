<?php
$title = "Catch a Phrase (Snake)";
include_once "header.php";

//require_once "../indic-wp/telugu_parser.php";
require_once "/home2/icsbinco/public_html/telugupuzzles/indic-wp/telugu_parser.php";

if (isset($_POST["phrase"])) {
	// get phrase from posted value
	$phrase = $_POST["phrase"];
} else {
	// use default phrase
	$phrase = "తెలుగు పజిల్స్";
}

// parse quote into characters separated by commas
$arr = parseToCodePoints($phrase);
$processed_phrase = "";
foreach ($arr as $ch) {
	$ch = parseToCharacter($ch);
	if ($ch == " " || ctype_punct($ch) || $ch == "") {
		// skip over spaces, blanks, and punctuation
		continue;
	}
	if ($processed_phrase == "") {
		$processed_phrase = $ch;
	} else {
		$processed_phrase = $processed_phrase . "," . $ch;
	}
}
?>
<!-- input form for phrase and filler values -->
<form id="catch_a_phrase_form" method="post">
    <!-- phrase -->
	<label for="phrase" id="phraseLabel">Phrase</label>
	<input type="text" class="inputBox" name="phrase" id="phrase" value="<?php echo $phrase; ?>"
		title="type in your phrase here" 
		spellcheck="false" autocomplete="off" required>
	<br><br>

    <!-- phrase values, each character should be separated by commas -->
	<label for="processedPhrase" id="processedPhraseLabel">Processed<br>Phrase</label>
	<input type="text" class="inputBox" name="processedPhrase" id="processedPhrase" value="<?php echo $processed_phrase; ?>"
		title="characters should be separated by commas, e.g.: a,bc, d" 
		spellcheck="false" autocomplete="off" required>
	<br><br>

    <!-- Filler values -->
    <label for="fillers" id="fillersLabel">Fillers</label>
    <textarea name="fillers" class="inputBox" id="fillers" 
    title="characters should be separated by commas, e.g.: a,bc, d" 
    spellcheck="false" autocomplete="off" required>అ,ఆ,ఇ,ఈ,ఉ,ఊ,ఋ,ఎ,ఏ,ఐ,ఒ,ఓ,ఔ,అం,అః,క,ఖ,గ,ఘ,జ్ఞ,చ,ఛ,జ,ఝ,ఞ,ట,ఠ,డ,ఢ,ణ,త,థ,ద,ధ,న,ప,ఫ,బ,భ,మ,య,ర,ల,వ,శ,ష,స,హ,ళ,క్ష,ఱ,క,కా,కి,కీ,కు,కూ,కె,కే,కై,కొ,కో,కౌ,కం,ఖ,ఖా,ఖి,గ,గా,గి,గీ,గు,గూ,గె,గే,గై,గొ,గో,గౌ,గం,ఘ,ఘా,ఘి,ఘీ,ఘం,చ,చా,చి,చీ,చు,చూ,చె,చే,చై,చొ,చో,చౌ,చం,ఛ,ఛా,ఛి,ఛీ,ఛు,ఛూ,ఛె,ఛే,జ,జా,జి,జీ,జు,జూ,జె,జే,జై,జొ,జో,జం,ఝ,ట,టా,టి,టీ,టు,టూ,టె,టే,టై,టొ,టో,టం,ఠ,ఠి,ఠీ,డ,డా,డి,డీ,డు,డూ,డె,డే,డై,డొ,డో,డౌ,డం,ఢ,ఢా,ఢి,ఢీ,ఢు,ఢూ,ణం,త,తా,తి,తీ,తు,తూ,తె,తే,తై,తొ,తో,తౌ,తం,థ,థా,థి,థీ,ద,దా,ది,దీ,దు,దూ,దె,దే,దై,దొ,దో,దౌ,దం,ధ,ధా,ధి,ధీ,ధు,ధూ,ధె,ధే,ధై,ధొ,ధో,ధౌ,ధం,న,నా,ని,నీ,ను,నూ,నె,నే,నై,నొ,నో,నౌ,నం,ప,పా,పి,పీ,పు,పూ,పె,పే,పై,పొ,పో,పౌ,పం,ఫ,ఫా,ఫి,బ,బా,బి,బీ,బు,బూ,బె,బే,బై,బొ,బో,బౌ,బం,భ,భా,భి,భీ,భు,భూ,భె,భే,భై,భొ,భో,భౌ,భం,మ,మా,మి,మీ,ము,మూ,మె,మే,మై,మొ,మో,మౌ,మం,య,యా,యి,యీ,యు,యూ,యొ,యే,యై,యొ,యో,యౌ,యం,ర,రా,రి,రీ,రు,రూ,రె,రే,రై,రొ,రో,రౌ,రం,ల,లా,లి,లీ,లు,లూ,లె,లే,లై,లొ,లో,లౌ,లం,వ,వా,వి,వీ,వు,వూ,వె,వే,వై,వొ,వో,వౌ,వం,శ,శా,శి,శీ,శు,శూ,శె,శే,శై,శొ,శో,శౌ,శం,ష,షా,షి,స,సా,సి,సీ,సు,సూ,సె,సే,సై,సొ,సో,సౌ,సం,హ,హా,హి,హీ,హు,హూ,హొ,క్క,గ్గ,చ్చ,జ్జ,ట్ట,డ్డ,త్త,ద్ద,న్న,ప్ప,బ్బ,మ్మ,య్య,ర్ర,ల్ల,వ్వ,స్స,ల్ల,క్క,క్ర,క్ల,క్వ,క్ష,క్స,త్క,త్ప,స్త్రీ,ష్ట్ర,స్త్ర,త్స్న,వ్యా,ర్మూ,ద్రా,జా,స్తి,శి,వ,రా,మ</textarea>
    <br><br>

    <!-- Height dropdown selector, default value is 10 -->
    <label for="height">Grid Height:</label>
    <select name="height" id="height" autocomplete="off">
        <?php
        if (isset($_POST['height'])) {
			$height = $_POST['height'];
		} else {
            // if no posted preference for height, default value is 12
            $height = "12";
		}
        for ($i = 10; $i <= 25; $i++) {
            echo '<option value="' . $i . '"' . (($i == $height) ? ' selected' : '' ) .'>' . $i . '</option>';
        }
        ?>
    </select>
    <br><br>

    <!-- Width dropdown selector, default value is 10 -->
    <label for="width">Grid Width:</label>
    <select name="width" id="width" autocomplete="off">
        <?php
        if (isset($_POST['width'])) {
			$width = $_POST['width'];
		} else {
            // if no posted preference for width, default value is 16
            $width = "16";
		}
        for ($i = 10; $i <= 25; $i++) {
            echo '<option value="' . $i . '"' . (($i == $width) ? ' selected' : '' ) .'>' . $i . '</option>';
        }
        ?>
    </select>
    <br><br>

    <label for="show_solution">Hide Solution on Generate:</label>
	<input type="checkbox" id='hide_solution' name="hide_solution" value="true" <?php if (isset($_POST['hide_solution']) && $_POST['hide_solution'] == 'true') echo "checked"; ?>>
	<br><br>

    <input type="submit" name="generate" id="generate" value="Generate" id="generate">
    <br><br>

    <table id="game"></table>
	<br>
    <table id="solution"></table>
    <br>
	<button type="button" id="toggleSolution" name="toggleSolution">Show Solution</button>

    <!-- show grids on startup -->
    <script>
        gen(<?php echo ((isset($_POST['hide_solution']) && $_POST['hide_solution'] == 'true') ? "true" : "false"); ?>);
        document.getElementById("toggleSolution").addEventListener("click", function() { toggleSolution(false); });
    </script>
</form>
<?php
include_once 'footer.php';