# didbot-cmd
[![Build Status](https://travis-ci.org/didbot/didbot-cmd.svg?branch=master)](https://travis-ci.org/didbot/didbot-cmd)
A command line interface for [didbot.com](https://didbot.com) or a self hosted [didbot](https://github.com/didbot/didbot) application.

## Installation
1. Install with [composer](https://getcomposer.org/) package manager.
```
composer global require didbot/didbot-cmd
```
2. Generate an API token at either [didbot.com](https://didbot.com) or from your self hosted [didbot](https://github.com/didbot/didbot) application. Add the token to didbot-cmd by running the `didbot config:token` command.
```
didbot config:token eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImVkZjdmNTV...
```
3. By default didbot-cmd points to the didbot.com api located at https://didbot.com/api/1.0. If you wish to point didbot-cmd to your self hosted didbot install run the `didbot config:url` command.
```
didbot config:url http://example.com
```