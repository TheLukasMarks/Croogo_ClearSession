Croogo_ClearSession
===================

ClearSession Plugin for CakePHP & Croogo 2.x Versions.

This Plugin works with a specific CakePHP/ Croogo Session storage Configuration.
Before installing this Plugin change the Session Configuration in app/Config/croogo.php to

'defaults' => 'cake'

Here the full Config Setup, I use on a blank Croogo Installation:

Configure::write('Session', array(
	'defaults' => 'cake',
	// 'timeout' => 30, // The session will timeout after 30 minutes of inactivity
	// 'cookieTimeout' => 1440, // The session cookie will live for at most 24 hours, this does not effect session timeouts
	'checkAgent' => false,
	// 'autoRegenerate' => true, // causes the session expiration time to reset on each page load
	'ini' => array(
		'session.cookie_secure' => false,
		'session.cookie_httponly' => true
	),
));

After setting up the Croogo Config we have to create the sessions Folder under app/tmp/ and here we go,
install the ClearSession Plugin and delete all saved Session Files from app/tmp/sessions/ with one klick.
