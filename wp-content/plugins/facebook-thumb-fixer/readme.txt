=== Facebook Thumb Fixer ===
Contributors: mikeyott
Tags: facebook, thumb, fixer, default, thumbnail, thumbnails, thumbs, og:image, og:description, og:title, open, graph, open graph
Requires at least: 3.0
Tested up to: 3.9
Stable tag: trunk

Fixes the problem of the missing (or wrong) thumbnail when a post is shared on Facebook or Google+.

== Description ==

This plug-in is for those who have the problem where sharing a post on Facebook or Google+ shows the wrong (or no) thumbnail image.

It works by making sure the thumbnail is derived from the featured image of your post. If your post doesn't have a featured image then it will use a fall-back image that you can specify in Settings -> General.

The plug-in forces the open graph meta properties into the head of each page and post: og:image, og:title, og:description, og:site_name, og:type and og:url, all of which both Facebook and Google+ (and other services that use open graph) scan for when someone shares your web page.

<strong>NEW!</strong> Specify an <a href-"https://developers.facebook.com/docs/reference/opengraph" target="_blank">object type</a> for any post, page or the home page.

== Installation ==

Install, activate, done.

== Uninstall ==

Deactivate the plugin, delete if desired.

== Official Web Site (and support) ==

<a href="http://www.thatwebguyblog.com/post/facebook-thumb-fixer-for-wordpress">That Web Guy Blog</a>

Go to Settings -> Facebook Thumb Fixer for detailed information how it works and what it does.

== How to set a fall-back image ==

Go to Settings -> General and scroll down until you find 'Default Facebook Thumb'. Put the path to your fall-back image there. Make sure it's at least 200x200.

== How to set an object type ==

<strong>Posts and Pages</strong>

On each page or post you edit there is an 'Open Graph Object Type' meta box. Simply make a section from there to specify what Object Type the page or post is. Example: If the it's an article, then choose 'article'. If it's a product, choose 'product'. To help you decide what Object Type to choose, go <a href-"https://developers.facebook.com/docs/reference/opengraph" target="_blank">here</a> to learn the differences between them all.

Note: If no selection is made for posts or pages then the Object Type will be 'article'.

<strong>Home page</strong>

To specify what Object Type your homepage is, go to the Wordpress Settings -> General page and make a selection from the 'Home page Object Type' field.

Note: If no selection is made for the home page then the Object Type will be 'webpage'.

== Changelog ==

= 1.4 =

Added the ability to specify a unique Object Type for each post, page and the home page.
Updated documentation.

= 1.3.5 =

Replaced strip_tags with preferable wp_kses function.
HTML is now stripped from excerpts.
Fixed issue where title sometimes wasn't being output into og:title on posts.

= 1.3.4 =

'Tested up to' compatibility with Wordpress 3.8.
Wordpress 3.8 notification UI.
Updated documentation to reflect current Facebook requirements, removed document redundancy.
Typo corrections.

= 1.3.3 =

* Minor update: Added strip_tags in more places to prevent potential conflict issue.

= 1.3.2 =

* Changed function name to something less generic to avoid potential conflict with other plugins.

= 1.3.1 =

* Updated recommended og:image dimensions.

= 1.3 =

* Included new open graph properties for og:description, og:site_name and og:type.
* Added visual indication of the field on the settings page.
* Fixed width on preview image (for when someone accidentally uses a massive image).
* Updated help guide.

= 1.2.3 =

* Changed comment output in head to 'Open Graph' instead of 'Facebook Open Graph'.
* Clarification on how the plugin works.

= 1.2.2 =

* Added og:url meta property (according to Facebook debugger, now required).

= 1.2.1 =

* Updated documentation page, suggesting default thumbnail to be 155x155 (because thumbs are that size on Facebook brand pages).

= 1.2 =

* Minor edits, nothing important.

= 1.1 =

* Updated tags.
* Fixed typos.

= 1.0 =

* Release candidate finished.
* Added support information under admin Settings -> Facebook Thumb Fixer
* Updated support information.

= 0.9 =

* Swapped out deprecated Wordpress variables.