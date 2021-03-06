<?php
if ($video) {
	$video_js = VIDEOJS ? ' video-js vjs-default-skin' : '';
	$poster = get_poster($video);
	echo "<video id='main_video' class='display display_video$video_js' controls autoplay ";
	if ($poster) {
		echo " poster='" . $poster . "' ";
	}
	echo "data-setup='{}'>";
	echo "<source src='" . $video . "' type='" . $v_type . ";" . $v_codec . "'>";
	if ($subs = get_subtitles($video)) {
		echo "<track kind='subtitles' src='" . $subs . "' srclang='en' label='Standard' />";
	}
	echo "Your browser does not support the video tag.";
	echo "</video>";
	echo "<p class='custom_controls' style='display:none;'>";
	echo " <a href='javascript:;' class='ctrl time4 ctrl_llll'>-5min</a>";
	echo " <a href='javascript:;' class='ctrl time3 ctrl_lll'>-30s</a>";
	echo " <a href='javascript:;' class='ctrl time2 ctrl_ll'>-10s</a>";
	echo " <a href='javascript:;' class='ctrl time1 ctrl_l'>-3s</a>";
	echo " <a href='javascript:;' class='ctrl vol vol_d'>-vol</a>";
	echo " <a href='javascript:;' class='ctrl ctrl_pp'>loading…</a>";
	echo " <a href='javascript:;' class='ctrl vol vol_i'>+vol</a>";
	echo " <a href='javascript:;' class='ctrl time1 ctrl_r'>+3s</a>";
	echo " <a href='javascript:;' class='ctrl time2 ctrl_rr'>+10s</a>";
	echo " <a href='javascript:;' class='ctrl time3 ctrl_rrr'>+30s</a>";
	echo " <a href='javascript:;' class='ctrl time4 ctrl_rrrr'>+5min</a>";
	echo "</p>";
	echo "<p class='current_container'>";
	echo "<span class='current' title='" . $n_video . "'>" . get_display_name(basename($n_video)) . "</span>";
	echo "<br /><br /><a href='$video' title='Download video!'>" . DOWNLOAD_ICON . "&nbsp;Download</a>";
	echo " &nbsp;&nbsp;&nbsp;<a href='?d=" . rawurlencode($dir) . "'  title='Close and go back'>" . CLOSE_ICON . "&nbsp;Close</a>";
	echo "</p>";
} else {
	echo "<h1 class='title'>" . TOP_TITLE . "</h1>";
	echo "<div class='display display_novideo'></div>";
}
if (!$video || !HIDE_LIST_WHEN_VIDEO_SELECTED) {
	echo "<p class='nav current_container novideo'>";
	echo display_current_location($dir);
	echo "</p>";
}
