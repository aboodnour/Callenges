<?php
#####################################################################################################################
#                                                                                                                   #
#                                                   ( About )                                                       #
#                                                                                                                   #
#       This is a real-life XSS that was found during bug hunting.                                                  #
#       The bounty amount was not big but the technical challenge was interesting enough to get me intrigued		#
#       I eventually managed to solve it and learnt more about how JavaScript works.								#
#       I tought it would be interesting to share it.                                                               #
#       If you managed to solve it. DM me <a href="https://twitter.com/AboodNour">@aboodnour</a>                    #
#                                                                                                                   #
#       Note: This is a slightly modified version of the original challenge to make it even more interesting        #
#             The original challenge can be found at ./BB_2302_v2.php                                               #
#                                                                                                                   #
#####################################################################################################################

if(empty($_GET['payload'])){ highlight_file(__FILE__); exit;}


function clean_var($var){
	$var = preg_replace('#[^a-zA-Z0-9=\'\\\\/,.=\-&@_]#','',$var);
	return str_replace("'","\\'",$var);
}
?>

<html>
	<head>
		<title>XSS Challenge</title>
		<script>
			function Trigger()
			{
				var RedirectURL = '/?user_param=<?=clean_var($_GET['payload']);?>&';
			}
			//Trigger();
		</script>
	</head>

	<body>
		<h1>XSS Challenge</h1>
		<button onclick="Trigger();">Trigger XSS</button>
	</body>
</html>
