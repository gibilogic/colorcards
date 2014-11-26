colorcards
==========

A simple content plugin for Joomla to show square color samples

## Install

Currently you'll have to build the ZIP file yourself. Or, if you prefer, just copy the content of the *src* folder into */plugins/content/colorcards/* folder on your Joomla site and then run the "Discover" task.

## Usage

In any of your article, just write

    {colorcard [hexcode] | Title | Description}
    
e.g.

    {colorcard #000000 | BLACK | A classical black color}
    
And the result will a nice little square with title and description (samples coming soon).

You can put several tags near like this 

    {colorcard #000000 | BLACK | A classical black color} {colorcard #ffffff | WHITE | A bit more light}
    
And the squares will align neatly one after another.

## Support and contribution
 
This software is given as is, with no support and no responsability. You are still allowed to open issues if you like, but we cannot guarantee a reply.
You're free to fork and use as you wish, as long as you comply with GPL license version 3 or greater. 
We are also glad to accept and evaluate PRs.

## Final notes

We wrote this software because we needed and we could not find a similar solution. If you feel our work is overlapping with another existing software, feel free to let us know and we will happily evaluate the chance to merge our efforts.

