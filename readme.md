## Description
Integrate with [ionic login](https://github.com/RogerShenAU/ionic-login) starter app, provide server-side authorisation. This plugin can be downloaded via [WP ionic login auth](https://github.com/RogerShenAU/wp-ionic-login-auth)

## How to use this plugin
1. Setup your [ionic login](https://github.com/RogerShenAU/ionic-login) starter app
2. Download and install this plugin to your WordPress site, make sure your site's permalink settings(/wp-admin/options-permalink.php) is NOT set as "Plain"
3. Update/Add below code to [ionic login](https://github.com/RogerShenAU/ionic-login)/src/providers/post/post.ts, replace https://www.example.com with your website URL

	```bash
	this.authUrl = 'https://www.example.com/wp-ionic-login-auth'; 
	```
	
4. Log into [ionic login](https://github.com/RogerShenAU/ionic-login) starter app with your WordPress credentials

## Reference
Add virtual page in WordPress - https://stackoverflow.com/questions/35161848/can-i-add-virtual-virtual-in-wordpress