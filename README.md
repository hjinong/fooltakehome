# Installation
1. Clone the following GIT repository into the /wp-content/plugins folder

    https://github.com/hjinong/fooltakehome
    
    For example, if done from command line, type
    
    git clone https://github.com/hjinong/fooltakehome

2. From the Wordpress admin plugins page (https://<your-site-url>/wp-admin/plugins.php), activate "Fool Takehome" the plugin.

3. "Articles" and "Recommendations" can be created by users with "Author" role.  

4. "Ticker" is a taxonomy associated with "Articles" and "Recommendations".  Before an article or a recommendation can be associated with a ticker symbol, the ticker symbol needs to be created as a term on an admin page, https://<your-site-url>/wp-admin/edit-tags.php?taxonomy=ticker.

5. Set the permalink to "Post name" in Wordpress admin by going to https://<your-site-url>/wp-admin/options-permalink.php, checking "Post name", and clicking "Save Changes".

6. Useful URLs
a. https://<your-site-url>/recommendations/archive/: View all recommendations in a reverse chronological order
b. https://<your-site-url>/company/?ticker=<ticker symbol, e.g., TSLA>: View company-specific information and content



