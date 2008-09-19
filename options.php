<?php
// Begin Related Posts Options

global $wpdb, $yarpp_value_options, $yarpp_binary_options;
if (!yarpp_enabled()) {
	echo '<div class="updated">';
	if (yarpp_activate()) echo 'The YARPP database had an error but has been fixed.';
	echo '</div>';
}

yarpp_reinforce(); // just in case, set default options, etc.

//compute $tagmap
$tagmap = array();
foreach ($wpdb->get_results("select $wpdb->terms.term_id, name from $wpdb->terms natural join $wpdb->term_taxonomy where $wpdb->term_taxonomy.taxonomy = 'category'") as $tag) {
	$tagmap[$tag->term_id] = strtolower($tag->name);
}

function yarpp_mapthetag($id) {
	global $tagmap;
	return $tagmap[$id];
}
function yarpp_unmapthetag($name) {
	global $tagmap;
	$untagmap = array_flip($tagmap);
	return $untagmap[$name];
}

if (isset($_POST['update_yarpp'])) {
	foreach (array_keys($yarpp_value_options) as $option) {
		yarpp_set_option($option,addslashes($_POST[$option]));
	}
	if (isset($_POST['discats'])) { 
		yarpp_set_option('discats',implode(',',array_keys($_POST['discats']))); // discats is different
	} else {
		yarpp_set_option('discats','');
	}

	if (isset($_POST['distags'])) { 
		yarpp_set_option('distags',implode(',',array_keys($_POST['distags']))); // distags is also different
	} else {
		yarpp_set_option('distags','');
	}
	//update_option('yarpp_distags',implode(',',array_map('yarpp_unmapthetag',preg_split('!\s*[;,]\s*!',strtolower($_POST['distags']))))); // distags is even more different
	
	foreach (array_keys($yarpp_binary_options) as $option) {
		(isset($_POST[$option])) ? yarpp_set_option($option,true) : yarpp_set_option($option,false);
	}		
	echo '<div id="message" class="updated fade" style="background-color: rgb(207, 235, 247);"><p>Options saved!</p></div>';
}

function checkbox($option,$desc,$tr="<tr valign='top'>
			<th class='th-full' colspan='2' scope='row'>",$inputplus = '',$thplus='') {
	echo "			$tr<input $inputplus type='checkbox' name='$option' value='true'". ((yarpp_get_option($option)) ? ' checked="checked"': '' )."  /> $desc</th>$thplus
		</tr>";
}
function textbox($option,$desc,$size=2,$tr="<tr valign='top'>
			<th scope='row'>") {
	$value = yarpp_get_option($option,true);
	echo "			$tr$desc</th>
			<td><input name='$option' type='text' id='$option' value='$value' size='$size' /></td>
		</tr>";
}
function importance($option,$desc,$type='word',$tr="<tr valign='top'>
			<th scope='row'>",$inputplus = '') {
	$value = yarpp_get_option($option);
	
	echo "		$tr$desc</th>
			<td>
			<input $inputplus type='radio' name='$option' value='1'". (($value == 1) ? ' checked="checked"': '' )."  /> do not consider
			<input $inputplus type='radio' name='$option' value='2'". (($value == 2) ? ' checked="checked"': '' )."  /> consider
			<input $inputplus type='radio' name='$option' value='3'". (($value == 3) ? ' checked="checked"': '' )."  /> require at least one $type in common
			<input $inputplus type='radio' name='$option' value='4'". (($value == 4) ? ' checked="checked"': '' )."  /> require more than one $type in common
			</td>
		</tr>";
}

function importance2($option,$desc,$type='word',$tr="<tr valign='top'>
			<th scope='row'>",$inputplus = '') {
	$value = yarpp_get_option($option);

	echo "		$tr$desc</th>
			<td>
			<input $inputplus type='radio' name='$option' value='1'". (($value == 1) ? ' checked="checked"': '' )."  /> do not consider
			<input $inputplus type='radio' name='$option' value='2'". (($value == 2) ? ' checked="checked"': '' )."  /> consider
			<input $inputplus type='radio' name='$option' value='3'". (($value == 3) ? ' checked="checked"': '' )."  /> consider with extra weight
			</td>
		</tr>";
}

function select($option,$desc,$type='word',$tr="<tr valign='top'>
			<th scope='row'>",$inputplus = '') {
	echo "		$tr$desc</th>
			<td>
			<input $inputplus type='radio' name='$option' value='1'". ((yarpp_get_option($option) == 1) ? ' checked="checked"': '' )."  /> do not consider
			<input $inputplus type='radio' name='$option' value='2'". ((yarpp_get_option($option) == 2) ? ' checked="checked"': '' )."  /> consider
			<input $inputplus type='radio' name='$option' value='3'". ((yarpp_get_option($option) == 3) ? ' checked="checked"': '' )."  /> require at least one $type in common
			<input $inputplus type='radio' name='$option' value='4'". ((yarpp_get_option($option) == 4) ? ' checked="checked"': '' )."  /> require more than one $type in common
			</td>
		</tr>";
}

?>
<script type="text/javascript">
//<![CDATA[

var css=document.createElement("link");
css.setAttribute("rel", "stylesheet");
css.setAttribute("type", "text/css");
css.setAttribute("href", "../wp-content/plugins/yet-another-related-posts-plugin/options.css");
document.getElementsByTagName("head")[0].appendChild(css);
//]]>
</script>

<div class="wrap">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_donations" />
		<input type="hidden" name="business" value="mitcho@mitcho.com" />
		<input type="hidden" name="item_name" value="Yet Another Related Posts Plugin" />
		<input type="hidden" name="no_shipping" value="1" />
		<input type="hidden" name="return" value="http://mitcho.com/code/yarpp/" />
		<input type="hidden" name="cancel_return" value="http://mitcho.com/code/yarpp/" />
		<input type="hidden" name="cn" value="Optional Comment" />
		<input type="hidden" name="currency_code" value="USD" />
		<input type="hidden" name="tax" value="0" />
		<input type="hidden" name="lc" value="US" />
		<input type="hidden" name="bn" value="PP-DonationsBF" />

		<h2>
			<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but04.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" title="Donate to mitcho (Michael Yoshitaka Erlewine) for this plugin via PayPal" style="float:right" />
			Yet Another Related Posts Plugin Options <small><?php echo yarpp_get_option('version'); ?></small>
		</h2>
	</form>

	<form method="post">


	<p><small>by <a href="http://mitcho.com/code/">mitcho (Michael 芳貴 Erlewine)</a> and based on the fabulous work of <a href="http://peter.mapledesign.co.uk/weblog/archives/wordpress-related-posts-plugin">Peter Bower</a>, <a href="http://wasabi.pbwiki.com/Related%20Entries">Alexander Malov & Mike Lu</a>.</small></p>


	<!--The Pool-->
	<h3>"The Pool"</h3>
	<p>"The Pool" refers to the pool of posts and pages that are candidates for display as related to the current entry.</p>
	
	<table class="form-table">
		<tbody>
			<tr valign='top'>
				<th scope='row'>Disallow by category:</th><td><div style="overflow:auto;max-height:100px;">
			<?php
			$discats = explode(',',yarpp_get_option('discats'));
			array_unshift($discats,' ');
			foreach ($wpdb->get_results("select $wpdb->terms.term_id, name from $wpdb->terms natural join $wpdb->term_taxonomy where $wpdb->term_taxonomy.taxonomy = 'category' order by name") as $cat) {
				echo "<input type='checkbox' name='discats[$cat->term_id]' value='true'". (array_search($cat->term_id,$discats) ? ' checked="checked"': '' )."  /> <label for='discats[$cat->term_id]'>$cat->name</label> ";
			}?>
				</div></td>
			</tr>
			<tr valign='top'>
				<th scope='row'>Disallow by tag: </th>
				<td><div style="overflow:auto;max-height:100px;"><!--Enter tags to use to block entries. Delimit with commas. Tags that do not currently exist will be ignored.<br /><input name='distags' type='text' id='$option' value='<?php implode(",",array_map("yarpp_mapthetag",explode(",",htmlspecialchars(stripslashes(yarpp_get_option($option))))));?>' size='40' />-->
			<?php
			$distags = explode(',',yarpp_get_option('distags'));
			array_unshift($distags,' ');
			foreach ($wpdb->get_results("select $wpdb->terms.term_id, name from $wpdb->terms natural join $wpdb->term_taxonomy where $wpdb->term_taxonomy.taxonomy = 'post_tag' order by name") as $tag) {
				echo "<input type='checkbox' name='distags[$tag->term_id]' value='true'". (array_search($tag->term_id,$distags) ? ' checked="checked"': '' )."  /> <label for='distags[$tag->term_id]'>$tag->name</label> ";
			}?>
				</div></td>
			</tr>
		</tbody>
	</table>

	<!-- Relatedness -->
	<h3>"Relatedness" options</h3>
	<p>YARPP is different than the <a href="http://wasabi.pbwiki.com/Related%20Entries">previous plugins it is based on</a> as it limits the related posts list by (1) a maximum number and (2) a <em>match threshold</em>. <a href="#" class='info'>more&gt;<span>The higher the match threshold, the more restrictive, and you get less related posts overall. The default match threshold is 5. If you want to find an appropriate match threshhold, I recommend you turn on the "show admins the match scores" setting below. That way, you can see what kinds of related posts are being picked up and with what kind of match scores, and determine an appropriate threshold for your site.</span></a></p>
	
	<table class="form-table">
		<tbody>
	<?php textbox('limit','Maximum number of related posts:')?>
	
<!--		<div id="mySlider"><span>do not consider</span>
	<span>consider</span>
	<span>require</span>
	<span>require multiple</span>
	</div>-->
	
	<?php textbox('threshold','Match threshold:')?>
	<?php importance2('title',"Titles: ")?>
	<?php importance2('body',"Bodies: ")?>
	<?php importance('tags',"Tags: ",'tag')?>
	<?php importance('categories',"Categories: ",'category')?>
	<?php checkbox('cross_relate',"Cross-relate posts and pages? <a href='#' class='info'>more&gt;<span>When the \"Cross-relate posts and pages\" option is selected, the <code>related_posts()</code>, <code>related_pagaes()</code>, and <code>related_entries()</code> all will give the same output, returning both related pages and posts.</span></a>"); ?>
			</tbody>
		</table>

<script language="javascript">
//<![CDATA[
	function excerpt() {
		if (!(document.getElementsByName('show_excerpt')[0].checked)) {
			document.getElementsByName('excerpted')[0].style.display = 'none';
			document.getElementsByName('excerpted')[1].style.display = 'none';
		} else {
			document.getElementsByName('excerpted')[0].style.display = 'table-row';
			document.getElementsByName('excerpted')[1].style.display = 'table-row';
		}
	}
	excerpt();
//]]!>
</script>


		<!-- Display options -->
		<h3>Display options</h3>
		
		<table class="form-table">
<?php
// construct the demo code based on current preferences

$democode = stripslashes(yarpp_get_option('before_related',true))."
";
for ($i=1;$i<=yarpp_get_option('limit');$i++) {
	$democode .= stripslashes(yarpp_get_option('before_title',true)).stripslashes(htmlspecialchars("<a href='PERMALINK$i'>RELATED TITLE $i</a>")).(yarpp_get_option('show_excerpt')?"\r\t".stripslashes(yarpp_get_option('before_post',true)).yarpp_excerpt(LOREMIPSUM,yarpp_get_option('excerpt_length')).stripslashes(yarpp_get_option('before_post',true)):'').stripslashes(yarpp_get_option('after_title',true))."
";
}
$democode .= stripslashes(yarpp_get_option('after_related',true));
if (yarpp_get_option('promote_yarpp'))
	$democode .= htmlspecialchars("\n<p>Related posts brought to you by <a href='http://mitcho.com/code/yarpp/'>Yet Another Related Posts Plugin</a>.</p>");

checkbox('auto_display',"Automatically display related posts? <a href='#' class='info'>more&gt;<span>This option automatically displays related posts right after the content on single entry pages. If this option is off, you will need to manually insert <code>related_posts()</code> or variants (<code>related_pagaes()</code> and <code>related_entries()</code>) into your theme files.","<tr valign='top'>
			<th class='th-full' colspan='2' scope='row'>",'','<td rowspan="12" style="border-left:8px white solid;"><b>Display code example</b><br /><small>(Update options to reload.)</small><br/>'
."<code><pre style='overflow:auto;width:350px;'>".($democode)."</pre></code></td>"); ?>
			<tr valign='top'>
				<th>Before / after related entries:</th>
				<td><input name="before_related" type="text" id="before_related" value="<?php echo stripslashes(yarpp_get_option('before_related',true)); ?>" size="10" /> / <input name="after_related" type="text" id="after_related" value="<?php echo stripslashes(yarpp_get_option('after_related',true)); ?>" size="10" /><em><small> For example: &lt;ol&gt;&lt;/ol&gt; or &lt;div&gt;&lt;/div&gt;</small></em>
				</td>
			</tr>
			<tr valign='top'>
				<th>Before / after each post:</th>
				<td><input name="before_title" type="text" id="before_title" value="<?php echo stripslashes(yarpp_get_option('before_title',true)); ?>" size="10" /> / <input name="after_title" type="text" id="after_title" value="<?php echo stripslashes(yarpp_get_option('after_title',true)); ?>" size="10" /><em><small> For example: &lt;li&gt;&lt;/li&gt; or &lt;dl&gt;&lt;/dl&gt;</small></em>
				</td>
			</tr>
	<?php checkbox('show_excerpt',"Show excerpt?","<tr valign='top'><th colspan='2'>",' name="show_excerpt" onclick="javascript:excerpt()"'); ?>
	<?php textbox('excerpt_length','Excerpt length (No. of words):',null,"<tr name='excerpted' valign='top' ".(yarpp_get_option('show_excerpt')?'':"style='display:none'").">
				<th>")?>
	
			<tr name="excerpted" valign='top' <?php echo (yarpp_get_option('show_excerpt')?'':"style='display:none'")?>>
				<th>Before / after (Excerpt):</th>
				<td><input name="before_post" type="text" id="before_post" value="<?php echo stripslashes(yarpp_get_option('before_post',true)); ?>" size="10" /> / <input name="after_post" type="text" id="after_post" value="<?php echo stripslashes(yarpp_get_option('after_post')); ?>" size="10" /><em><small> For example: &lt;li&gt;&lt;/li&gt; or &lt;dl&gt;&lt;/dl&gt;</small></em>
				</td>
			</tr>

			<tr name="excerpted" valign='top'>
				<th>Order results:</th>
				<td><select name="order" id="name">
					<option value="score DESC" <?php echo (yarpp_get_option('order')=='score DESC'?' selected="selected"':'')?>>score (high relevance to low)</option>
					<option value="score ASC" <?php echo (yarpp_get_option('order')=='score ASC'?' selected="selected"':'')?>>score (low relevance to high)</option>
					<option value="post_date DESC" <?php echo (yarpp_get_option('order')=='post_date DESC'?' selected="selected"':'')?>>date (new to old)</option>
					<option value="post_date ASC" <?php echo (yarpp_get_option('order')=='post_date ASC'?' selected="selected"':'')?>>date (old to new)</option>
					<option value="post_title ASC" <?php echo (yarpp_get_option('order')=='post_title ASC'?' selected="selected"':'')?>>title (alphabetical)</option>
					<option value="post_title DESC" <?php echo (yarpp_get_option('order')=='post_title DESC'?' selected="selected"':'')?>>title (reverse alphabetical)</option>
				</select>
				</td>
			</tr>
	
	<?php textbox('no_results','Default display if no results:','40')?>
	<?php checkbox('show_past_post',"Show password protected posts?"); ?>
	<?php checkbox('past_only',"Show only previous posts?"); ?>
	<?php checkbox('show_score',"Show admins (user level > 8) the match scores? <a href='#' class='info'>more&gt;<span>With this option on, each related entry's total 'match score' (all above the threshold, set above) are displayed after each entry title, <em>if you are an administrator and logged in.</em> Even if you see these values, your visitors will not.</span></a>"); ?>
	<?php checkbox('promote_yarpp',"Help promote Yet Another Related Posts Plugin? <a href='#' class='info'>more&gt;<span>This option will add the code <code>&lt;p&gt;Related posts brought to you by &lt;a href='http://mitcho.com/code/yarpp/'&gt;Yet Another Related Posts Plugin&lt;/a&gt;.&lt;/p&gt;</code>. Try turning it on, updating your options, and see the code in the code example to the right. These links and donations are greatly appreciated.</span></a>"); ?>
		</table>
		
	<div>
		<p class="submit">
			<input type="submit" name="update_yarpp" value="Update options" />
			<input type="submit" onclick='return confirm("Do you really want to reset your configuration?");' class="yarpp_warning" name="reset_yarpp" value="Reset options" />
		</p>
	</div>
</form>

<?php

// End Related Posts Options

?>