Block your WordPress login to all IP addresses that have not been white-listed. White list IP's by completing custom phrases that meet zxcvbn crack time of centuries.

#### Contributing
If you would like to contribute please contact me via github. The project has not been outlined to the level of concurrent feature branches, but there is plenty to do and it can be added easily!

Dev notes
====================

- use secondary classes to host grouped functionality
- use primary plugin class to add_action and add_filters from secondary classes
- use settings class sparingly, idea is that if a value is use across classes it should reside in the settings class. If the value required initialization it probably should not be in the settings class.

Current Tasks
====================

- post type - add save_post method
- post type - remove bloat from text editor should be only the text version
- post type - add pass phrase check based on wp-strong password checker

#### references
- post type edit page loading information can be found `/wp-admin/edit-form-advanced.php`

Change Log
====================

### 08.30.15 - v-1.0.0 randy-c-5.0
- update readme file with structured outline to allow for multiple devs
- add post type login-phrases text editor placeholders for desc, password strength meter, js

### 08.28.15 - v-1.0.0 randy-c-4.0
- refactor post type options and the way they are added, simplify not over complicate

### 08.27.15 - v-1.0.0 randy-c-3.0
- add login-phrases post type
- activate plugin and squash errors and warnings

### 08.26.15 - v-1.0.0 randy-c-2.1
- outline plugin activation and initiation

### 08.26.15 - v-1.0.0 randy-c-2.0
- update file names to wp coding standards
- add settings class
- add log class

### 08.25.15 - v-1.0.0 randy-c-1.2
- update construct with proper set methods

### 08.25.15 - v-1.0.0 randy-c-1.1
- small spelling issues

### 08.25.15 - v-1.0.0 randy-c-1.0
- add base plugin file
- add base plugin class and constants
- update commit log with plugin version and commit version

### 08.23.15 - v-1.0.0 randy-c-0.1
- update general text
- still need to be re-read for spelling and grammar

### 08.23.15 - v-1.0.0 randy-c-0.0
- initial commit
- outline of plugin development

Conceptual Notes
====================

- Block the wp-login.php with a custom form that uses a phrase to allow the use to continue. `phrase-form`
- The `phrase-form` will require the user_login plus four words + honey pot
- When the `phrase-form` is submitted:
- honey pot is confirmed empty or wp_die
- user_login is checked for existence or wp_die
- phrase is confirmed or wp_die
- When the `phrase-form` is successfully submitted the user will be sent an email with an custom `IP accepted link`
- When the `IP accepted link` is visited the IP will be saved as `safe-ip` for any user then the user is redirected to the regular wp-login.php
- Once an IP is saved as `safe-ip` the `phrase-form` is no longer needed

### Dev notes

- avoid an options page
- avoid allowing bots to attack the login form by forcing IP recognition
- the phrase-form has to be able to stop bots from successfully submitting the form and triggering an email send to an existing user

### Potential Issues

- finding a way to confirm that the phrase the user has constructed is strong enough
- will it be too hard for uses to create phrases that are strong enough - http://code.tutsplus.com/articles/using-the-included-password-strength-meter-script-in-wordpress--wp-34736
- should there be an option to pre-populated?

### Nuts and bolts

- A `phrase-form` is managed via a custom post type
- Users can have as many custom phrases as they like
- Phrases are displayed randomly
- A phrase is defined as being a sentence that is longer than 7 words
- The phrase sentence must include a minimum of 3 flags words that will be targeted by the form
- Users can target works by wrapping the word with a \*
- User WordPress re-write rules to build a custom url for sending via email
- custom url should include a hash that has been temp saved in user meta
- hash should meet zxcvbn crack time of centuries

##### Phrase example
```
Actual phrase: *Cindy* had a dog that loved to *jump* named Rover. Rover was *brown* and hated *trains*

Phrase form:
<form>
    <input type="text" name="phrase[]" required /> had a dog that loved to <input type="text" name="phrase[]" required /> named Rover. Rover was <input type="text" name="phrase[]" required /> and hated <input type="text" name="phrase[]" required />.
</form>
```

### custom post type - `login-phrases`

- private
- title
- text-editor
- remove media buttons
- remove visual display, only allow text mode

### register_activation_hook

- create default `login-phrases` example post
- save current users IP as `safe-ip`

### code outline
- plugin file with init class that includes, register_activation_hook, register_deactivation_hook, add_rewrite_rule
- class for post type login-phrases and associated actions and filters interactions
- class for phrase form display and submission handling
