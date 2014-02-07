Se7enChat
======

[![Build Status](https://travis-ci.org/Se7enChat/Se7enChat.png)](https://travis-ci.org/Se7enChat/Se7enChat)

Se7enChat is a web-based chat written from the ground up with good software design in mind. Our goals are to keep the code base clean and well tested with frequent refactoring, as well as provide a great user experience with modern technologies like HTML5 and CSS3.

How far along are you?
======

Things are coming along pretty well now. Some recent changes are:

- Designed a partially working user interface.
- Hooked up the database to some mechanisms, though it still isn't a solid dependency.

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

If you wish to contribute to the project, you may fork us on GitHub and submit a pull request. However, please remember that Se7enChat is strict about unit testing and expects all contributed code to be adequately tested using PHPUnit. See `Testing` section below.

Also - and this is important - in order to have a pull request accepted, each commit must be signed off by you using one of the following methods.

- Use the `-s` flag when committing with the git command line tool, as in `git commit -sm "message"`
- Add "Signed-off-by: UserName <user-email@email.com>" to the end of your commit message on its own line. You can look at a recent commit message to see an example of this. Using the above option does this for you though.

By signing off a commit, you are officially agreeing to the developer's certificate of origin, which in a nutshell, says that you own the work that you contribute, and you're officially giving it to the project to be used, redistributed and licensed as part of Se7enChat. Basically, you can't come back in six months and be like "Hey, I changed my mind about that code I submitted, so you're going to have to rip it out and give it back to me."

Obviously the above is not legal mumbo-jumbo and can't be used for anything other than an aid in understanding. So, read the DCO file for yourself, and if you have any doubts or questions, consult an attorney. I am not an attorney, nor do I play one on TV, therefore my own explanation of the DCO or software license should not be considered authoritative.

A copy of the DCO can be found in the DCO.txt file located in the root directory of Se7enChat. If the copy of Se7enChat you have is lacking a DCO or LICENSE file, chew out the person who gave it to you and find us on GitHub. Thanks.

Testing
======

The PHPUnit executable is downloaded to `vendor/bin/` when you run composer, so you don't need to do anything special to get that set up. The tests consist of two "suites," one for unit tests and one for integration tests.

Unit tests can be run with this command:

```
$ vendor/bin/phpunit -c Tests/phpunit.xml --testsuite UnitTests
```

Integration tests can be run with this command:

```
$ vendor/bin/phpunit -c Tests/phpunit.xml --testsuite IntegrationTests
```

And you can run them all together by omitting the --testsuite flag:

```
$ vendor/bin/phpunit -c Tests/phpunit.xml
```

Integration tests take far more time to run because they test parts of the system as they are hooked up together, while unit tests only test small parts of the system in isolation. Integration tests also use the database, which slows them down considerably.
