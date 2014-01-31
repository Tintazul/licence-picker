licence-picker
==============

WordPress plugin to let post editors pick a Creative Commons licence for their post.

* *Contributors:* Júlio Reis
* *Tags:* Creative Commons, metadata
* *Requires at least:* 2.8.0
* *Tested up to:* 3.8.1
* *Stable tag:* 0.0.0
* *License:* GPLv3
* *License URI:* [http://www.gnu.org/licenses/gpl-3.0.html](http://www.gnu.org/licenses/gpl-3.0.html) or see the included `LICENSE.txt` and `LICENCE.md`

Description
---------------------------------

*(Under development: none of this is done yet)*

Prints a licencing meta tag. Lets post editors pick a Creative Commons licence on a post-by-post basis.

The following meta is used from the posts:

* `_lp_licence_url`: URL of the licence

Options
---------------------------------

*(Under development: none of this is done yet)*

#### Removing the self-closing slash

Add `define ('LP_CLOSING_SLASH', false);` to your `wp-config.php` and LP will produce `<meta>` instead of `<meta/>`.

Roadmap
---------------------------------

*This section details future development that was expected to happen when this version was released. No guarantees!*

First step:

* Find licence URL in some custom field, print it like so: `<link rel="copyright" href="//creativecommons.org/licenses/by-sa/3.0/" />`

Later:

* Add the stuff in Options above
* Keep list of licences, with short name, URL, URL to pic, long name
	- l10n of long names
	- display licence info
	- expose info to themes so they can display licence info themselves
* Meta box to let editor pick a licence
* Save short name, not licence URL as custom field
* Print licence URL to dc:Permissions
	- Turn this on/off in Settings
* Adding a sitewide default licence for new documents
* Prepare for upgrades
* Let admins add more licences, edit long names etc.

Changelog
---------------------------------

#### 0.0.0

*(unreleased yet)*

* Includes `LICENSE.txt` and `LICENSE.md` from [TheFox / GPLv3.md](https://github.com/TheFox/GPLv3.md)
* Aborts if WordPress version is unsupported
* i18n ready
* Ready for activate / deactivate
