# Gallery.css

Gallery.css is *all* CSS. Think: Simple, maintainable and understandable galleries without the use of Javascript. 

_What? No script!? Why?_ — Gallery css started as an experiment to build interactive, fluid componentry without the need for jQuery, or a jQuery carousel script. Use this library, or don't — either way, hopefully you'll learn from the techniques used within. 

## Installation

The preferred method to install gallery-css is by using Bower, a package manager for front-end components.

`bower install gallery-css`

Otherwise, if you want to keep it simple, check the [dist directory](/dist).

## Getting started

You've got a couple options with how you'd like to use gallery.css:

	* Without autoplaying animation
	* With autoplaying animation
	* With or without browser prefixes

Read the [getting started guide](http://benschwarz.github.io/gallery-css#getting-started), or checkout the [examples](/examples)

## How does it work? 

I've [prepared a screencast](http://benschwarz.github.io/gallery-css) that will take you through how to build something like Gallery-css from scratch, theres tonnes of tiny details that I learnt myself while building it. Its $12, you'll learn and it'll help me keep building for the web. How good is that? 

## Browser support

<table width="100%" style="text-align: center;">
  <thead>
    <tr>
      <td>Safari</td>
      <td>Firefox</td>
      <td>Chrome</td>
      <td>IE8</td>
      <td>IE9</td>
      <td>IE10</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>✔</td>
      <td>✔</td>
      <td>✔</td>
      <td>✖†</td>
      <td>✔</td>
      <td>✔</td>
    </tr>
  </tbody>
</table>

† [Absolutely possible](examples/ie-8) using a variety of JS selector shims, although not recommended.

## Build instructions

Gallery CSS is built using [grunt](http://gruntjs.com) & RubySASS.

You'll need:

* Ruby (and sass - `gem install sass`)
* Run `npm install` from the root directory.
* To run a build, you'll simply need to run `grunt`.