# extend add on module : Custom Cart Css
Customization for overriding the CSS for the cart and minicart offers


## Installation: 
- create a app/code/Extend/CustomCartCss folder
- copy this repo in this folder
- run your magento commands : 
php bin/magento setup:upgrade && php bin/magento setup:di:compile &&  php bin/magento setup:static-content:deploy -f -j 4 && php bin/magento cache:clean

## Usage:
- enable the option in Store > Configuration > Extend > Custom Cart Offers
- enter the css override for the button.button.simple-offer element, in one line (for example: border:2px solid black !important; font-size: 1.2rem;)
- clean your cache and confirm the changes at the cart and minicart levels

## Troubleshooting:
- you might need to remove pub/static/frontend, /generated, var/view_preprocessed/pub/static/frontend after installing
