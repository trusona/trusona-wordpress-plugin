# Trusona WordPress Plugin Testing Checklist

## Pre-Installation
- [ ] Verify WordPress version is 6.8+
- [ ] Verify PHP version is 8.1+
- [ ] Enable WP_DEBUG in wp-config.php: `define('WP_DEBUG', true);`

## Installation Testing
- [ ] Upload plugin via WordPress admin
- [ ] Verify plugin activates without errors
- [ ] Check that activation notice shows correct email
- [ ] Verify no PHP warnings or errors in debug.log

## Configuration Testing
1. **Admin Settings Page**
   - [ ] Navigate to Settings → Trusona
   - [ ] Verify settings page loads without errors
   - [ ] Test "Trusona ONLY Mode" checkbox saves correctly
   - [ ] Test "Self-Service Account Creation" checkbox saves correctly
   - [ ] Verify PHP and WordPress version display at bottom

2. **Login Page**
   - [ ] Logout and go to wp-login.php
   - [ ] Verify "Login with Trusona" button appears
   - [ ] Verify button styling loads correctly
   - [ ] Test "Toggle Classic Login" link functionality
   - [ ] Verify password field is properly disabled/enabled

## Security Testing
1. **XSS Prevention**
   - [ ] Try injecting `<script>alert('XSS')</script>` in email field
   - [ ] Verify HTML is properly escaped in error messages

2. **CSRF Protection**
   - [ ] Open browser developer tools
   - [ ] Click "Login with Trusona"
   - [ ] Verify `_wpnonce` parameter in redirect URL

3. **Input Validation**
   - [ ] Test with invalid email formats
   - [ ] Verify proper error messages

## OAuth Flow Testing (Requires Trusona Account)
1. **Successful Login**
   - [ ] Click "Login with Trusona"
   - [ ] Verify redirect to Trusona IDP
   - [ ] Complete authentication in Trusona app
   - [ ] Verify successful redirect back to WordPress
   - [ ] Verify user is logged in

2. **Error Handling**
   - [ ] Test with unregistered email
   - [ ] Verify appropriate error message
   - [ ] Test canceling authentication
   - [ ] Verify error redirect works

## PHP 8 Compatibility
- [ ] Check error logs for deprecation warnings
- [ ] Verify no "undefined array key" warnings
- [ ] Test all features work without errors

## JavaScript Testing
- [ ] Open browser console
- [ ] Verify no JavaScript errors
- [ ] Test toggle functionality works smoothly
- [ ] Verify jQuery loads properly

## Performance Testing
- [ ] Check browser network tab
- [ ] Verify CSS/JS files load with version numbers
- [ ] Confirm no time-based cache busting

## Uninstallation Testing
- [ ] Deactivate plugin
- [ ] Verify settings are removed
- [ ] Reactivate and verify clean state

## Browser Testing
Test in multiple browsers:
- [ ] Chrome
- [ ] Firefox
- [ ] Safari
- [ ] Edge

## Mobile Testing
- [ ] Test login page on mobile device
- [ ] Verify responsive design
- [ ] Test Trusona app integration