# SlackBundle [![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/displayce/slackBundle/tree/master/LICENSE.md)

Symfony bundle that integrates the [Slack API client](https://github.com/displayce/slack) by providing easy-to-use services and configuration.

If you would like to access the Slack Web API from the command-line, consider installing the [slack-cli](https://github.com/cleentfaar/slack-cli) package.

[![Latest Version](https://img.shields.io/github/release/displayce/slackBundle.svg?style=flat-square)](https://github.com/displayce/slackBundle/releases)


## Quick example

Here is an example of how you can access the API's `chat.postMessage` method to send a message to one of your Slack channels:

```php
<?php
// Acme\DemoBundle\Controller\MySlackController

public function sendAction()
{
    $payload = new ChatPostMessagePayload();
    $payload->setChannel('#general');   // Channel names must begin with a hash-sign '#'
    $payload->setText('Hello world!');  // also supports Slack formatting
    $payload->setUsername('acme');      // can be anything you want
    $payload->setIconEmoji('birthday'); // check out emoji.list-payload for a list of available emojis

    $response = $this->get('cl_slack.api_client')->send($payload);

    // display the Slack channel ID on which the message was posted
    echo $response->getChannel(); // would return something like 'C01234567'

    // display the Slack timestamp on which the message was posted (note: NON-unix timestamp!)
    echo $response->getTimestamp(); // would return something like '1407190762.000000'
}

```

In Slack, that should give you something like this in the `#general` channel:
![Example of a message posted to Slack](https://github.com/displayce/slackBundle/blob/master/Resources/doc/img/api-method-chat-postMessage.png)

These and more examples can be found in the [usage](https://github.com/displayce/slackBundle/blob/master/Resources/doc/usage.md) documentation.


## Documentation

- [Installation](https://github.com/displayce/slackBundle/blob/master/Resources/doc/installation.md)
- [Configuration](https://github.com/displayce/slackBundle/blob/master/Resources/doc/configuration.md)
- [Usage](https://github.com/displayce/slackBundle/blob/master/Resources/doc/usage.md)
- [Usage during tests](https://github.com/displayce/slackBundle/blob/master/Resources/doc/usage-during-tests.md)
- [Contributing](https://github.com/displayce/slackBundle/blob/master/Resources/doc/contributing.md)

Detailed documentation on how to access each API method can be found in the documentation of the package that this bundle integrates: [Slack API library](https://github.com/displayce/slack)


## Thanks

- [@fieg](http://github.com/fieg), for initial ideas about integrating Slack with our projects.
- The guys at [Slack](https://slack.com/), for making an awesome product and clean documentation.


## Contributing

If you would like to contribute to this package, check out the contribution doc [here](https://github.com/displayce/slackBundle/blob/master/Resources/doc/contributing.md).
