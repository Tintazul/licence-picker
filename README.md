licence-picker
==============

Defines a licence taxonomy, so editors can set licences on a post-by-post basis. Prints the licencing meta tag. Use it for Creative Commons, GNU etc.

* *Contributors:* Júlio Reis
* *Tags:* licensing, GPL, Creative Commons, metadata
* *Requires at least:* 3.0.0
* *Tested up to:* 3.8.1
* *Stable tag:* 0.0.0
* *License:* GPLv3
* *License URI:* [http://www.gnu.org/licenses/gpl-3.0.html](http://www.gnu.org/licenses/gpl-3.0.html) or see the included `LICENSE.txt` and `LICENSE.md`
* *This code lives at:* [https://github.com/Tintazul/licence-picker](https://github.com/Tintazul/licence-picker)

Description
---------------------------------

Defines a `licence` custom taxonomy. The licence info should be registered in this way:

* short name as `name` attribute (what you input when you create a licence from Add New Post / Edit Post)
* long name, followed by a space, followed by the licence’s URL as `description` attribute (accessible in the _Posts > Licences_ admin menu)

Then just pick the licences you need from the taxonomy box:

![Licence picker taxonomy](screenshot.png)


### Works with Polylang

This plugin was tested with Polylang. After you activate `licence-picker`, you will have to go to Polylang’s admin page at _Settings > Languages > Settings_, then next to _Custom taxonomies_ check the box for _Licence picker_.

### Suggested licences

These are some licences to get you started.

* `name` : `description`
* CC0 : Public Domain Dedication http://creativecommons.org/publicdomain/zero/1.0/
* CC BY 4.0 : Creative Commons Attribution 4.0 International http://creativecommons.org/licenses/by/4.0/
* CC BY-SA 4.0 : Creative Commons Attribution-ShareAlike 4.0 International http://creativecommons.org/licenses/by-sa/4.0/
* CC BY-ND 4.0 : Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International http://creativecommons.org/licenses/by-nd/4.0/
* CC BY-NC 4.0 : Creative Commons Attribution-NonCommercial 4.0 International http://creativecommons.org/licenses/by-nc/4.0/
* CC BY-NC-SA 4.0 : Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International http://creativecommons.org/licenses/by-nc-sa/4.0/
* CC BY-NC-ND 4.0 : Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International http://creativecommons.org/licenses/by-nc-nd/4.0/
* GNU GPL : GNU General Public License v3 http://www.gnu.org/licenses/gpl-3.0.html
* GNU Lesser GPL : GNU Lesser General Public License http://www.gnu.org/licenses/lgpl.html
* GNU Affero GPL : GNU Affero General Public License http://www.gnu.org/licenses/agpl-3.0.html
* GNU FDL : GNU Free Documentation License http://www.gnu.org/licenses/fdl.html
* PD : Public Domain Mark http://creativecommons.org/publicdomain/mark/1.0/

If you add licences programmatically with `wp_insert_term()`, remember to add them _only once_ or you’ll get duplicate terms.

Options
---------------------------------

* `LPBase::generate_licence_link` returns the HTML for a list of licences defined for the current post. If for single post pages, it defines the `rel="license"` attribute which associates the page with its licence.

Changelog
---------------------------------

#### 0.0.0

*2014-02-08*

* Initial release
* l10n: Portuguese