Croogo_ClearSession
===================

I use this ClearSession Plugin for Croogo 1.4x and 1.5x Versions.

This Plugin works with a specific CakePHP/ Croogo Session storage Configuration.
Before installing this Plugin change the Session Configuration in app/Config/croogo.php to

'defaults' => 'cake'

Here the full Config Setup, I use on a blank Croogo Installation:

Configure::write('Session', array(
  'defaults' => 'cake',
	'ini' => array(
            'session.cookie_secure' => false,
            'session.cookie_httponly' => true
	)
));

After setting up the Croogo Config we have to create the sessions Folder under app/tmp/ and here we go,
install the ClearSession Plugin and delete all saved Session Files from app/tmp/sessions/ with one klick.
