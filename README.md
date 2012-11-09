Mendelevium
===========

Mendelevium is a PHP Log Center that relies on Redis as a backend.

There are two main motivations for the creation of Mendelevium :

1 - I wanted to build something using Redis.

2 - Logging on relation style (SQL) database is slow, .txt is slow, bla bla bla Redis is faster and its cooler.

Usage
=====

Take the whole folder Mendelevium and add it to your project, find out for on MendeleviumClient.php: 

    $projName = 'Default'

and change it to something that suits your project. Currently It only supports one instance by project since the web interface
only manage to handler one instance. But by now you can easily change it for multiple project side support.

So, just do anywhere Mendelevium is included: 

    $Mendelevium->log("message here");

Screenshots
===========

![Main Screen](http://i.imgur.com/Ng5AB.png)