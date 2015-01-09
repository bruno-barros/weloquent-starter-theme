<?php
/**
 * ----------------------------------------------------
 * Optimized .htaccess from WordPress Codex
 * ----------------------------------------------------
 */

add_filter('mod_rewrite_rules', function ($rules)
{


	$weloquentRules = <<<EOD
\n# BEGIN w.eloquent

# Protect the htaccess file
<Files .htaccess>
	Order Allow,Deny
	Deny from all
</Files>

# Protect wpconfig.php
<Files wp-config.php>
	Order Allow,Deny
	Deny from all
</Files>

# Disable directory browsing
Options All -Indexes

# BEGIN COMPRESSION AND CACHING
<IfModule mod_deflate.c>
	# Enable compression
	AddOutputFilterByType DEFLATE text/css text/javascript application/x-javascript text/html text/plain text/xml image/x-icon

	<IfModule mod_setenvif.c>
		BrowserMatch ^Mozilla/4 gzip-only-text/html
		BrowserMatch ^Mozilla/4\.0[678] no-gzip
		BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
		BrowserMatch \bMSI[E] !no-gzip !gzip-only-text/html
	</IfModule>

	<IfModule mod_headers.c>
		# Make sure proxies deliver correct content
		Header append Vary User-Agent env=!dont-vary
		# Ensure proxies deliver compressed content correctly
		Header append Vary Accept-Encoding
	</IfModule>

</IfModule>

<IfModule mod_headers.c>
	# No ETags, No Pragma
	Header unset Pragma
	Header unset ETag
	# Default cache time to 1 year (31536000 sec)
	Header set Cache-Control "max-age=31536000, public, must-revalidate"
</IfModule>

# No ETags
FileETag none

# CACHE SETTINGS (mod_expires)
<IfModule mod_expires.c>
	# Turn on Expires
	ExpiresActive On
	# set default to "access plus 1 year"
	ExpiresDefault A31536000
	# html - "modification plus 1 hour"
	ExpiresByType text/html M3600
	# css and JavaScript - "modification plus 6 weeks"
	ExpiresByType text/css M3628800
	ExpiresByType text/javascript M3628800
	ExpiresByType application/x-javascript M3628800
</IfModule>

# No cache for php-files
<FilesMatch "\.(php)$">
	<IfModule mod_expires.c>
		ExpiresActive Off
	</IfModule>

	<IfModule mod_headers.c>
		Header set Cache-Control "private, no-cache, no-store, proxy-revalidate, no-transform"
	</IfModule>
</FilesMatch>

<IfModule mod_rewrite.c>
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	RedirectMatch 301 /cms/$ /cms/wp-admin
</IfModule>

# END w.eloquent\n\n
EOD;

	return $weloquentRules . $rules;
});