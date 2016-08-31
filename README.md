# Google Maps

Google Maps Module for [CMS Made Simple](http://www.cmsmadesimple.org). This module is meant to be
used in the [Composer and Bower-enabled version](https://github.com/torfs-ict/cmsms) of CMSMS.

## Features

- Add a map with pure HTML, as well as including an info window.
- Makes sure scrolling your website keeps working on small screens like tablets and smartphones, even when creating a full-width map.

## Usage

1. Add the required stylesheets to your `head` tag: `{cms_module module="GoogleMaps" action="css"}`
2. Add the required javascript at the end of your `body` tag: `{cms_module module="GoogleMaps" action="js"}`
3. Add the Smarty block as shown below to implement the map, the contents of the block will be put in the info window.

### Sample code

```smarty
{GoogleMaps address="One Microsoft Way Redmond, WA 98052-6399, United States" title="Microsoft HQ"}
  <h6>Microsoft HQ</h6>
    <p>
      One Microsoft Way
      <br>Redmond, WA 98052-6399
    </p>
  <p>(425) 882-8080</p>
  <p><a href="https://www.google.be/maps/dir//One+Microsoft+Way+Redmond,+WA+98052-6399,+United+States" target="_blank">Directions</a></p>
{/GoogleMaps}
```