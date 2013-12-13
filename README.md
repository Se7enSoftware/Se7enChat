Se7enChat
======

[![Build Status](https://travis-ci.org/Se7enChat/Se7enChat.png)](https://travis-ci.org/Se7enChat/Se7enChat)

Se7enChat is a web-based chat written from the ground up with good software design in mind. Our goals are to keep the code base clean and well tested with frequent refactoring, as well as provide a great user experience with modern technologies like HTML5 and CSS3.

How far along are you?
======

Well, the short answer is "Not very far."

At this point in time, we're only running through the test environment, which means that the code base can't be run through a browser. There's essentially no program code to speak of, so by itself, the application doesn't really do anything. There's no "Main" file, no request routing and no code implementing what we do have.

What we do have, is a solid and growing core of data structures, better known to some people as "models." We've got post objects, room objects that contain posts, and a user object. We've also got a nice data abstraction going, wherein storage can be swapped out easily. This helps a lot with testing because we don't have to use a database.

The game plan right now is to work a little bit more on the data structures to get them in tip-top shape. After the data structures are in place, we'll start working on hooking everything together with implementation code.

What are some planned features?
======

- Log in with GitHub, Google or Twitter, using OAuth.
- Responsive theme.
- Semi-instant server feedback via polling.

Installation
======

To install Se7enChat, all you have to do is clone the repository from [GitHub](https://github.com/Se7enChat/Se7enChat.git), move into the Se7enChat directory, then run composer to install in the the required dependencies. All together it should look like this.

```
$ git clone https://github.com/Se7enChat/Se7enChat.git
$ cd Se7enChat
$ composer install
```

More information on Composer can be found at the "Getting Started" page of the official website, [here](http://getcomposer.org/doc/00-intro.md).

Contributing
======

If you wish to contribute to the project, you may fork us on GitHub and submit a pull request. However, please remember that Se7enChat is strict about unit testing, and expects all contributed code to be adequately tested using PHPUnit.
