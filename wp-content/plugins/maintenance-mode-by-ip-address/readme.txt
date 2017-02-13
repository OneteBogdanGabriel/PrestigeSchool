=== Maintenance Mode by IP Address ===
Contributors: rcitconsultign
Donate Link: <https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=AUMPPD6ALDPRQ>
Tags: maintenance, ip, MailChimp, subscribe, API, utilities, social, google, reCaptcha, google recaptcha, coming soon
Requires at least: 4.3
Tested up to: 4.7.1
Stable tag: 2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

It allows the user to set his/her blog to maintenance mode by IP address.


== Description ==

Setting your website into maintenance mode has never been easier. This plugin will allow you to set your website to maintenance mode by IP address. Only your allowed IPs will have access to your site.

This plugin includes a default template. You have control into what to show to your visitors. Some included features are:

1. Choose between sending visitors to a page or url.
2. Countdown section: set date/time
3. Upload your own background
4. Set a custom message to display to your visitors
5. Add your social profiles
6. Show a subscribe form - MailChimp API Key Required.

= New =

7. Include a Google reCatpcha to avoid spams.
8. New Cool Default backgrounds.

== Installation ==

There are a few options for installing and setting up this plugin.

= Upload Manually =

1. Download and unzip the plugin
2. Upload the ‘rc_mmip’ folder into the '/wp-content/plugins/' directory
3. Go to the Plugins admin page and activate the plugin

= Install Via Admin Area =

1. In the admin area go to Plugins > Add New and search for "Maintenance Mode by IP Address"
2. Click install and then click activate

https://youtu.be/ktbevApyYY4

= To Setup The Plugin =

1. In the WordPress admin area find 'Maintenance Mode by IP'
2. To activate Maintenance Mode, click on the General tab, click on dropdown next to 'Maintenance Mode' label, and select 'ON'
3. Remember: You always need to specify your IP address. If no IP address is entered, your current IP address will be used as default.
4. As default, only the title for the 'Maintenance Mode' page is active. You need to go to the Design tab and customize its look.
5. Social tab: At least one social profile name must be provided for the 'Follow us' section to appear on the 'Maintenance Mode' page.
6. MailChimp tab: An API Key from MailChimp is required. To find more into how to obtain an API, visit mailchimp.com


== Frequently Asked Questions ==

= How do I obtain an API Key from MailChimp?  =

For more information about how to obtain a MailChimp API Key, visit <http://kb.mailchimp.com/accounts/management/about-api-keys> .

= I do not see any Social Profile links/icons, what happened? =

The first thing to do is to make sure you enter at least one profile name in the Social tab on the WordPress admin panel. If you have entered a profile name and the issue still
persist, please email us at <wplugins@rcit.consulting>.

= Forgot to include your IP address? Do this in case that you have locked yourself out. =

If you forgot to include your IP and now are locked out, you can do the following to get back into your site:

* Go to PHPAdmin, click on your database
* Select your table that has the word *options* in it. Some WordPress installation changes the prefix of the table names.
* Click on *SQL* to run the following query ‘SELECT * FROM your_options_table_name WHERE option_name like ‘%rc_mmip_settings%’;’
* Delete the option for 'rc_mmip_settings’.
* Close PHP Admin. Go back to the browser and make sure you clear its cache. Retype your website’s url and press enter.

And that is it, you will now be able to get into your site with no problem.

To use the plugin again, make sure to deactivate it and then activate it again. This time, do not forget to add your IP address.

Good Luck and thanks for using 'Maintenance By IP' plugin.

<https://wordpress.org/plugins/maintenance-mode-by-ip-address/>

== Screenshots ==

1. Once you have installed the plugin, navigate to Maintenance Mode by IP in the admin area - General Tab
2. Maintenance Mode by IP Address - Design tab
3. Maintenance Mode by IP Address - Social tab
4. Maintenance Mode by IP Address - MailChimp tab
5. Default Background 1
6. Default Background 2
7. Default Background 3
8. Default Background 4
9. Custom Background 

== Changelog ==

= 2.3 =

* Compatible with version 4.7.1
* Bug Fixes.

= 2.2 =

* Added option to keep settings after plugin deactivation.
* Crushed some bugs.

= 2.1 =

* Crushed some bugs that made this plugin incompatible with Revolution Slider.

= 2.0 =

* New features added. New Backgrounds. Need Options to personalize
* Google reCaptcha now available to use with MailChimp Subscribe form.
* More options to personalize.
* More responsive layout for mobile devices.
* Cool new backgrounds available.

= 1.2 =

* Bug Fixes

= 1.1 =

* Bug Fix: User was not able to choose a custom page.

= 1.0 =

* Initial launch of the plugin
* Option to add a Countdown Timer to default template
* Option to add a custom background to default template
* Option to add custom message to default template
* Option to send users to a url or page.

== Upgrade Notice ==

= 2.3 =

* Compatible with version 4.7.1
* Bug Fixes.