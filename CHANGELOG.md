## Changelog

### 2.0.0
* **Security Enhancements**
  * Added comprehensive XSS protection with proper output escaping
  * Implemented CSRF protection using WordPress nonces for AJAX callbacks
  * Added input sanitization with `sanitize_email()` and `sanitize_text_field()`
  * Fixed JWT timing attack vulnerability using `hash_equals()` for constant-time comparison
  * Switched to `wp_safe_remote_*` functions for all HTTP requests
* **PHP 8 Compatibility**
  * Added explicit property declarations for all class properties
  * Enhanced type safety with null checks and validation throughout codebase
  * Updated exception handling to catch `Throwable` instead of just `Exception`
  * Fixed JWT expiration validation (removed incorrect division by 1000)
* **WordPress 6.8 Compatibility**
  * Removed deprecated `screen_icon()` function call
* **Modernization**
  * Moved inline JavaScript to external file (`js/trusona-login.js`)
  * Updated script/style enqueuing to use version parameters
* **Version Requirements**
  * Updated minimum PHP version from 5.3.2 to 8.1
  * Updated minimum WordPress version from 5.4 to 6.0
  * Verified functionality on WordPress 6.8.2

### 1.6.3
* Verifies functionality on WordPress 6.3

### 1.6.0
* Verifies functionality on WordPress 6.0

### 1.5.5
* Verifies functionality on WordPress 5.8

### 1.5.4
* Verifies functionality on WordPress 5.7

### 1.5.3
* Verifies functionality on WordPress 5.5
* Fixes bug introduced in WordPress 5.5 by explicitly enabling the password field when it is visible.

### 1.5.2
* Verifies functionality on WordPress 5.4.2

### 1.5.1
* Changed buttons to mention "Login With Trusona"
* Added Trusona ONLY mode
* Improve searchability based on "passwordless"

### 1.5.0
* Verifies received JWT tokens - fails authentication otherwise
* Verifies functionality on WordPress 5.3.2

#### 1.4.6
* Tested upto Wordpress version 5.2.2

#### 1.4.5
* Updating message shown to user if they are not registered in WP site.

#### 1.4.4
* Tested upto Wordpress version 5.1

#### 1.4.3
* Bug fixing

#### 1.4.2
* Verifying functionality with Wordpress 5.0.x

#### 1.4.1
* Bug fixing

#### 1.4.0
* Adding self-service onboarding feature

#### 1.3.1
* Bug fixing

#### 1.3.0
* Bug fixing; auto formatting to conform to PHP standards

#### 1.2.4
* Updating readme text

#### 1.2.3
* Verifying functionality on latest Wordpress version 4.9.7
* Updating image resources

#### 1.2.2
* Adding PHP and Wordpress versions on settings view for debugging purposes.

#### 1.2.1
* Verifying support for WordPress version 4.9

#### 1.2.0
* Updated login button to use new Trusona logo and colors

#### 1.1.8
* No longer loading jQuery hosted by Google; instead using the version enqueued by Wordpress.

#### 1.1.7
* Implemented dynamic registration when environment relocation is detected.

#### 1.1.0
* Added new feature: Trusona ONLY Mode (available in settings)

#### 1.1.7
* Add portability between testing and production environments with dynamic registration when a change is detected.

#### 1.1.6
* Add filters to modify locked down form variables

#### 1.1.5
* Readme updates

#### 1.1.4
* Version update

#### 1.1.3
* Fixing login CSS

#### 1.1.2
* Bug fix

#### 1.1.1
* Bug fix

#### 1.1.0
* Added Settings link. Implemented single setting for Trusona-ONLY Mode, which is off by default.

#### 1.0.16
* Fixing bug that affects PHP 5.3.29

#### 1.0.15
* Update to readme regarding highest supported version of WP

#### 1.0.14
* Update to readme regarding availability of Trusona for Android

#### 1.0.13
* Fixing possible race condition when a Trusona user's email addresses are registered with several account types on a WP site.

#### 1.0.12
* Fixed links within readme file

#### 1.0.11
* Updated the plugin's readme file

#### 1.0.10
* Updated 'login with trusona' button CSS

#### 1.0.9
* More CSS cleanup

#### 1.0.8
* Fixing CSS bug related to display of buttons
* CSS cleanup

#### 1.0.7
* Update to verbiage within activation notice

#### 1.0.6
* Now showing notice, on activation, of email address to use in Trusona app
* Updated readme

#### 1.0.5
* No longer enqueing jquery

#### 1.0.4
* Removing unused filter

#### 1.0.3
* Removed dead code; renamed custom function

#### 1.0.2
* Fixed login form bug

#### 1.0.1
* Added support for legacy PHP versions down to 5.3.2

#### 1.0
* Initial release. Join the #NoPasswords revolution.
