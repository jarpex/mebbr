## Description

A monolithic, highly optimized, debloated (a part) WordPress theme written from scratch specifically for Asya's sites.

### Installation

- Install: python3, git
- Open your terminal:
- git clone https://github.com/jarpex/mebbr
- cd mebbr


## Usage

![MEBBR](https://github.com/jarpex/mebbr/raw/master/src/mebbr/mebbr.png)

### Configuration

Create a configuration file for your website like "/config/example.cfg". Configuration files should be placed at **/config/** directory. Each parameter should be placed for one line. To create a newline in your configuration file you should use a **&newline&** command. There is also available a **&tab&** command for better code legibility.

### Build

To build the project, use the command:

- python3 ./builder.py config.cfg

Where instead of **config.cfg** use your configuration file.

If no launch arguments are specified for the application, the theme will be built for the site [MEBBR](https://mebbr.ru/)

If the build is successful, you will get theme files in the **/build/** directory.

Also, you should manually place static files from **/src/css/** and **/src/js/** into you CDN.