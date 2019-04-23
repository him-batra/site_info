# alexerant_site_info

This module covering these features : 
1) Altering the existing Drupal "Site Information" form. Specifics:
   a) A new form text field named "Site API Key" needs to be added to the "Site Information" form with the default value of “No API Key yet”.
   b) When this form is submitted, the value that the user entered for this field should be saved as the system variable named "siteapikey".
   c) A Drupal message should inform the user that the Site API Key has been saved with that value.
   d) When this form is visited after the "Site API Key" is saved, the field should be populated with the correct value.
   c) The text of the "Save configuration" button should change to "Update Configuration".
2) This module also provides a URL that responds with a JSON representation of a given node with the content type "page" only if the previously submitted API Key and a node id (nid) of an appropriate node are present, otherwise it will respond with "access denied".

Example URL: http://localhost/page_json/FOOBAR12345/17
In this example, Site API Key is FOOBAR12345 & Node Id is 17